<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private $image_folder = 'assets/pengurus/profile';
    public function index(Request $request)
    {
        $user = ($request->id) ? User::find($request->id) : auth()->user();
        if (!$user) abort(404);
        $page_attr = [
            'title' => 'Profile',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $image_folder = $this->image_folder;

        $kepengurusan = $this->getRiwayatKepengurusan($user->id);
        return view('member.profile', compact('page_attr', 'user', 'image_folder', 'kepengurusan'));
    }

    public function save_basic(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'profesi' => ['nullable', 'string'],
                'jenis_kelamin' => ['nullable', 'string'],
                'bio' => ['nullable', 'string'],
            ]);
            $model = User::find($request->id);
            if (!$this->savePermission($request->id)) abort(401);

            // foto handle
            $foto = '';
            if ($image = $request->file('profile')) {
                $foto =   ($model->username ?? strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $model->name))) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($this->image_folder, $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $model->foto = $foto;
            }

            $model->profesi = $request->profesi;
            $model->gender = $request->jenis_kelamin;
            $model->bio = $request->bio;
            $model->save();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    private function savePermission(int $id): bool
    {
        // periksa role
        $user = auth()->user();

        if ($user->role == User::ROLE_ADMIN) {
            return true;
        } else {
            if ($user->id == $id) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function getRiwayatKepengurusan(int $user_id): array
    {
        $a = JabatanMember::tableName;
        $b = Jabatan::tableName;
        $c = Periode::tableName;
        $dari = <<<SQL
            select dari from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sampai = <<<SQL
            select sampai from $c where $c.id = $b.periode_id limit 1
        SQL;

        $sub_bdang = <<<SQL
            if($b.parent_id is null, '', concat(' -> ',(
                select nama from $b as z where $b.parent_id = z.id limit 1
            )))
        SQL;

        $user = JabatanMember::select([
            DB::raw("concat(($dari), '-', ($sampai), ' | ',$b.nama, $sub_bdang) as jabatan")
        ])->where('user_id', '=', $user_id)
            ->join($b, "$a.jabatan_id", '=', "$b.id")
            ->orderBy('jabatan', 'desc')
            ->get();
        return $user->toArray() ?? [];
    }
}
