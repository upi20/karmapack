<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LabController;
use App\Models\Artikel\Artikel;
use App\Models\KataAlumni;
use App\Models\Keanggotaan\Anggota;
use App\Models\Kepengurusan\Periode;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;
use Illuminate\Support\Facades\Schema;

// excel
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Anggota::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());

        $angkatans = Anggota::select(['angkatan'])
            ->orderBy('angkatan', 'desc')
            ->distinct()->get();
        $user_role = Role::all();

        $view = path_view('pages.admin.anggota');
        $data = compact('page_attr', 'user_role', 'angkatans', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tanggal_lahir' => ['required', 'date'],
            'angkatan' => ['required', 'int'],
            'active' => ['required', 'int', 'in:1,0'],
            'password' => ['required', 'string', new Password]
        ]);
        // buat username
        $username = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nama)) . date('YmdHis');

        DB::beginTransaction();
        // Simpan user
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $username;
        $user->active = $request->active;
        $user->password = Hash::make($request->password);
        $user->save();

        // simpan role
        $user->assignRole($request->roles);

        // simpan ke data anggota
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->angkatan = $request->angkatan;
        $anggota->user_id = $user->id;
        $anggota->save();
        DB::commit();

        Artikel::clearCache();
        Periode::clearCache();
        KataAlumni::clearCache();
        return response()->json();
    }

    public function update(Request $request)
    {
        $anggota = Anggota::findOrFail($request->id);
        $user = $anggota->user;
        $request->validate([
            'id' => ['required', 'int'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'tanggal_lahir' => ['required', 'date'],
            'angkatan' => ['required', 'int'],
            'active' => ['required', 'int', 'in:1,0'],
            'password' => $request->password ? ['required', 'string', new Password] : ''
        ]);

        DB::beginTransaction();
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // simpan ke data user
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->active = $request->active;
        $user->syncRoles($request->roles);
        $user->save();

        // simpan ke data anggota
        $anggota->nama = $request->nama;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->angkatan = $request->angkatan;
        $anggota->user_id = $user->id;
        $anggota->save();
        DB::commit();

        Artikel::clearCache();
        Periode::clearCache();
        KataAlumni::clearCache();
        return response()->json();
    }

    public function delete(Anggota $anggota)
    {
        $user = $anggota->user;
        DB::beginTransaction();
        // delete anggota
        $anggota->delete();

        // delete user
        $user->delete();
        DB::commit();

        Artikel::clearCache();
        Periode::clearCache();
        KataAlumni::clearCache();
        return response()->json();
    }

    public function change_password(Request $request)
    {
        $page_attr = [
            'title' => 'Ganti Password',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ],
        ];
        return view('admin.change_password', compact('page_attr'));
    }

    public function save_password(Request $request)
    {
        try {
            $request->validate([
                'current_password' => ['required', 'string', 'max:255'],
                'new_password' => ['required', 'string', new Password]
            ]);
            $user = User::find(auth()->user()->id);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            } else {
                throw new Exception("Password Lama Salah. Jika anda lupa silahkan hubungi administrator.");
            }
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function excel(Request $request)
    {
        $lab = new LabController();
        $lab->belumisi($request);
    }

    public function find(Request $request)
    {
        $anggota = Anggota::findOrFail($request->anggota_id);
        $user = $anggota->user()->with('roles', 'permissions')->first();
        $anggota->user = $user;
        return response()->json($anggota);
    }
}
