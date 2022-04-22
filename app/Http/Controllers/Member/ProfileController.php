<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\Regencie;
use App\Models\Address\Village;
use App\Models\Pengurus\Jabatan;
use App\Models\Pengurus\JabatanMember;
use App\Models\Pengurus\Periode;
use App\Models\Profile\Kontak;
use App\Models\Profile\KontakTipe;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private $image_folder = 'assets/pengurus/profile';
    public function index(Request $request)
    {
        $user_id = $request->id ?? auth()->user()->id;
        if (!$user_id) abort(404);

        $user = $this->getUser($user_id);
        if (!$user) abort(404);
        $page_attr = [
            'title' => 'Profile',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $image_folder = $this->image_folder;

        $kepengurusan = $this->getRiwayatKepengurusan($user->id);
        $provinces = Province::all();
        $kontak_tipe = KontakTipe::where('status', '=', 1)->select(['id', 'nama'])->get();
        return view('member.profile', compact('page_attr', 'user', 'image_folder', 'kepengurusan', 'provinces', 'kontak_tipe'));
    }

    public function save_basic(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'profesi' => ['nullable', 'string', 'max:255'],
                'jenis_kelamin' => ['nullable', 'string', 'max:255'],
                'bio' => ['nullable', 'string', 'max:255'],
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

    public function save_address(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'province_id' => ['nullable', 'string', 'max:255'],
                'regency_id' => ['nullable', 'string', 'max:255'],
                'district_id' => ['nullable', 'string', 'max:255'],
                'village_id' => ['nullable', 'string', 'max:255'],
                'alamat_lengkap' => ['nullable', 'string', 'max:255'],
            ]);
            $model = User::find($request->id);
            if (!$this->savePermission($request->id)) abort(401);

            $model->province_id = $request->province_id;
            $model->regency_id = $request->regency_id;
            $model->district_id = $request->district_id;
            $model->village_id = $request->village_id;
            $model->alamat_lengkap = $request->alamat_lengkap;
            $model->save();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function save_detail(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'name' => ['required', 'string', 'max:255'],
                'date_of_birth' => ['required', 'date'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email,' . $request->id],
                'telepon' => ['nullable', 'string', 'max:255'],
                'whatsapp' => ['nullable', 'string', 'max:255'],
                'username' => ['nullable', 'string', 'max:255', 'unique:users,username,' . $request->id],
            ]);
            $model = User::find($request->id);
            if (!$this->savePermission($request->id)) abort(401);

            $model->username = $request->username;
            $model->name = $request->name;
            $model->date_of_birth = $request->date_of_birth;
            $model->email = $request->email;
            $model->telepon = $request->telepon;
            $model->whatsapp = $request->whatsapp;
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

    private function getUser(int $id): mixed
    {
        $a = User::tableName;
        $b = Province::tableName;
        $c = Regencie::tableName;
        $d = District::tableName;
        $e = Village::tableName;

        return User::selectRaw("$a.*,
        $b.name as province,
        $c.name as regencie,
        $d.name as district,
        $e.name as village
        ")
            ->leftJoin($b, "$b.id", '=', "$a.province_id")
            ->leftJoin($c, "$c.id", '=', "$a.regency_id")
            ->leftJoin($d, "$d.id", '=', "$a.district_id")
            ->leftJoin($e, "$e.id", '=', "$a.village_id")
            ->where("$a.id", '=', $id)->first();
    }

    // Kontak crud =======================================================
    public function kontak_insert(Request $request)
    {
        try {
            $request->validate([
                'user_id' => ['required', 'int'],
                'tipe' => ['required', 'int'],
                'kontak' => ['required', 'string'],
            ]);
            $model = new Kontak();
            if (!$this->savePermission($request->user_id)) abort(401);

            $model->user_id = $request->user_id;
            $model->kontak_tipe_id = $request->tipe;
            $model->value = $request->kontak;
            $model->save();

            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function kontak_update(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'user_id' => ['required', 'int'],
                'tipe' => ['required', 'int'],
                'kontak' => ['required', 'string'],
            ]);
            $model = Kontak::find($request->id);
            if (!$this->savePermission($request->user_id)) abort(401);

            $model->user_id = $request->user_id;
            $model->kontak_tipe_id = $request->tipe;
            $model->value = $request->kontak;
            $model->save();

            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function kontak(Request $request)
    {
        return response()->json(['datas' => $this->getListKontak($request->user_id)]);
    }

    private function getListKontak(?int $user_id): mixed
    {
        if (!$user_id) return [];
        $a = Kontak::tableName;
        $b = KontakTipe::tableName;
        $kontak = Kontak::select([
            DB::raw("$a.id"),
            DB::raw("$a.value"),
            DB::raw("$b.id as kontak_id"),
            DB::raw("$b.nama as kontak"),
            DB::raw("$b.icon as icon"),
        ])
            ->where("$a.user_id", '=', $user_id)
            ->join($b, "$a.kontak_tipe_id", '=', "$b.id")
            ->get();

        return $kontak;
    }

    public function kontak_delete(Kontak $model)
    {
        try {
            $model->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
