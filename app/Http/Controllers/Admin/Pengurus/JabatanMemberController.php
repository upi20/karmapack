<?php

namespace App\Http\Controllers\Admin\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Config\Exception\ValidationException;
use League\Flysystem\Exception;

// pengurus
use App\Models\Pengurus\PeriodeMember;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;

class JabatanMemberController extends Controller
{
    public function index(Request $request)
    {
        // model
        $tbl_jabatan = Jabatan::tableName;
        $parent = <<<SQL
            concat(
                (if(isnull($tbl_jabatan.parent_id),'', (select z.nama from $tbl_jabatan as z where $tbl_jabatan.parent_id = z.id))),
                (if(isnull($tbl_jabatan.parent_id),'', ' ->')),
                ' ',$tbl_jabatan.nama)
        SQL;
        $model = Jabatan::select([
            "$tbl_jabatan.id",
            "$tbl_jabatan.periode_id",
            DB::raw("$parent as nama")
        ])->where("$tbl_jabatan.id", '=', $request->id);
        $model = $model->first();

        if (!$model) abort(404);

        // member
        $tbl_name = JabatanMember::tableName;
        $members = JabatanMember::select([
            "$tbl_name.user_id as id",
            DB::raw("(concat(users.angkatan,' | ', users.name)) as nama"),
        ])->join('users', 'users.id', '=', "$tbl_name.user_id")
            ->where('jabatan_id', '=', $model->id)
            ->get();
        $navigation = 'admin.pengurus.periode';

        // page atribut
        $page_attr = [
            'title' => "Member " . $model->nama,
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Kepengurusan'],
                ['name' => 'Periode', 'url' => 'admin.pengurus.periode'],
                ['name' => 'Bidang', 'url' => ['admin.pengurus.jabatan', $model->periode_id]],
            ],
            'navigation' => $navigation,
        ];
        return view('admin.pengurus.jabatan.member', compact('page_attr', 'model', 'members'));
    }

    public function select2(Request $request)
    {
        try {
            $model = User::select(['id', DB::raw("concat(angkatan,' | ',name) as text")])
                ->whereRaw("(
                    `name` like '%$request->search%' or
                    `angkatan` like '%$request->search%' or
                    `email` like '%$request->search%' or
                    `id` like '%$request->search%'
                    )")
                ->limit(10);

            $result = $model->get()->toArray();
            return response()->json(['results' => $result]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function update(Request $request)
    {
        // Rencana =============================================================================
        // delete foto yang tidak dipakai
        // Foto icon belum wkwk
        // Rencana =============================================================================

        try {
            $request->validate([
                'members' => ['required'],
                'periode_id' => ['required', 'int'],
                'jabatan_id' => ['required', 'int'],
            ]);
            DB::beginTransaction();

            // get jabatan member terdahulu
            $collection = JabatanMember::where('jabatan_id', '=', $request->jabatan_id)->get(['user_id']);
            // delete di tabel pengurus_periode, pengurus_periode_jabatan
            foreach ($collection as  $c) {
                JabatanMember::where('jabatan_id', '=', $request->jabatan_id)
                    ->where('user_id', '=', $c->user_id)
                    ->delete();
                PeriodeMember::where('periode_id', '=', $request->periode_id)
                    ->where('user_id', '=', $c->user_id)
                    ->delete();
            }
            foreach ($request->members as $member) {
                $cek = $this->cekPeriodeMember($request->periode_id, $member);
                if ($cek) {
                    throw new Exception($this->getNamaUsersById($member) . " Sudah terdaftar di jabatan lain");
                } else {
                    // insert $request->member tabel pengurus_periode, pengurus_periode_jabatan
                    JabatanMember::create([
                        'user_id' => $member,
                        'jabatan_id' => $request->jabatan_id
                    ]);
                    PeriodeMember::create([
                        'user_id' => $member,
                        'periode_id' => $request->periode_id
                    ]);
                }
            }
            DB::commit();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    private function getNamaUsersById(int $id): string
    {
        $user = User::selectRaw("concat(angkatan,' | ',name) as text")->where('id', '=', $id)->first();
        if (!$user) return "";
        return $user->text;
    }

    private function cekPeriodeMember(int $periode_id, int $id): bool
    {
        $member = PeriodeMember::where('periode_id', '=', $periode_id)
            ->where('user_id', '=', $id)
            ->delete(['user_id']);

        return $member ? true : false;
    }
}
