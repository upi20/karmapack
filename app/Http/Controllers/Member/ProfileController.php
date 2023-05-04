<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Helpers\Summernote;
use App\Models\Address\Province;
use App\Models\Artikel\Artikel;
use App\Models\KataAlumni;
use App\Models\Keanggotaan\Anggota;
use App\Models\Keanggotaan\Hobi;
use App\Models\Keanggotaan\Kontak;
use App\Models\Keanggotaan\KontakJenis;
use App\Models\Keanggotaan\PendidikanJenis;
use App\Models\Keanggotaan\Pendidikan;
use App\Models\Keanggotaan\PengalamanLain;
use App\Models\Keanggotaan\PengalamanOrganisasi;
use App\Models\Kepengurusan\Periode;
use App\Models\SocialAccount;
use App\Models\UsernameValidation;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if (is_null($request->id)) {
            $anggota = auth()->user()->anggota;
        } else {
            $anggota = Anggota::findOrFail($request->id);
        }

        $user = $anggota->user;

        if (!$user) return abort(404);

        $page_attr = adminBreadcumb(h_prefix());

        $provinces = Province::all();
        $kontak_jenis = KontakJenis::where('status', '=', 1)->select(['id', 'nama'])->get();
        $pendidikan_jenis = PendidikanJenis::where('status', '=', 1)->select(['id', 'nama'])->get();
        $google_accounts = $user->socialAccounts()->where('provider_name', 'google')->get();
        $socials = $user->socialAccounts()->where('provider_name', 'google')->get();
        $data = compact(
            'page_attr',
            'anggota',
            'user',
            'provinces',
            'kontak_jenis',
            'pendidikan_jenis',
            'google_accounts',
        );

        $view = path_view('pages.admin.member.profile');
        $data = compact('page_attr', 'anggota', 'user', 'provinces', 'kontak_jenis', 'pendidikan_jenis', 'google_accounts', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    // tools =====================================================================================
    private function savePermission(Anggota $anggota): bool
    {
        // periksa role
        $user = auth()->user();

        if (auth_can('admin.profile.save_another')) {
            return true;
        } else {
            if ($user->id == $anggota->user->id) {
                return true;
            } else {
                return false;
            }
        }
    }

    // basic ======================================================================================
    public function save_basic(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'profesi' => ['nullable', 'string', 'max:255'],
                'jenis_kelamin' => ['nullable', 'string', 'max:255'],
                'bio' => ['nullable', 'string', 'max:255'],
                'angkatan' => ['required', 'int', 'max:9999', 'min:2003'],
            ]);
            $anggota = Anggota::findOrFail($request->id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            DB::beginTransaction();
            // foto handle
            $foto = '';
            if ($image = $request->file('profile')) {
                $foto = ($anggota->user->username ?? strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $anggota->nama))) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image_folder = $anggota->fotoFolder();

                $image->move(public_path($image_folder), $foto);

                // delete foto
                if ($anggota->foto) {
                    $path = public_path("$image_folder/$anggota->foto");
                    Summernote::deleteFile($path);
                }

                // save foto
                $anggota->foto = $foto;

                // save to users
                $user = $anggota->user;
                $user->foto = $anggota->foto;
                $user->save();
            }

            $anggota->profesi = $request->profesi;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->bio = $request->bio;
            $anggota->angkatan = $request->angkatan;
            $anggota->save();
            DB::commit();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function profesi_select2(Request $request)
    {
        try {
            $model = Anggota::selectRaw('profesi as text')
                ->whereRaw("(`profesi` like '%$request->search%')")
                ->distinct()
                ->limit(10);

            $results = $model->get()->toArray();

            $get = true;
            $filter = [];
            foreach ($results as $result) {
                if ($request->search == $result['text']) $get = false;
                $filter[] = [
                    'id' => $result['text'],
                    'text' => $result['text']
                ];
            }

            if ($get) {
                $results = array_merge([['id' => $request->search, 'text' => $request->search]], $filter);
            }

            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    // Address ====================================================================================
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

            $anggota = Anggota::findOrFail($request->id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $anggota->province_id = $request->province_id;
            $anggota->regency_id = $request->regency_id;
            $anggota->district_id = $request->district_id;
            $anggota->village_id = $request->village_id;
            $anggota->alamat_lengkap = $request->alamat_lengkap;
            $anggota->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    // detail =====================================================================================
    public function save_detail(Request $request)
    {
        try {
            $anggota = Anggota::findOrFail($request->id);
            $user = $anggota->user;
            $request->validate([
                'id' => ['required', 'int'],
                'nama' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email,' . $user->id],
                'telepon' => ['nullable', 'string', 'max:255'],
                'whatsapp' => ['nullable', 'string', 'max:255'],
                'username' => ['nullable', 'string', 'max:255', 'unique:users,username,' . $user->id],
            ]);

            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $username = $request->username;
            $check = UsernameValidation::where('rule', $username)->count();
            if ($check > 0) {
                // check username
                return response()->json([
                    'errors' => [
                        'username' => ["Nama Profil $username Tidak boldeh digunakan"]
                    ],
                    'message' => "Nama Profil $username Tidak boldeh digunakan, Ada yang salah, Mohon periksa kembali !",
                ], 422);
            }

            // simpan anggota
            $anggota->nama = $request->nama;
            $anggota->tanggal_lahir = $request->tanggal_lahir;
            $anggota->telepon = $request->telepon;
            $anggota->whatsapp = $request->whatsapp;
            $anggota->save();

            // simpan user
            $user->username = $request->username;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    // Kontak crud =======================================================
    public function kontak_insert(Request $request)
    {
        try {
            $request->validate([
                'anggota_id' => ['required', 'int'],
                'jenis' => ['required', 'int'],
                'nilai' => ['required', 'string'],
            ]);
            $kontak = new Kontak();
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $kontak->anggota_id = $request->anggota_id;
            $kontak->jenis_id = $request->jenis;
            $kontak->nilai = $request->nilai;
            $kontak->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
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
                'anggota_id' => ['required', 'int'],
                'jenis' => ['required', 'int'],
                'nilai' => ['required', 'string'],
            ]);
            $kontak = Kontak::findOrFail($request->id);
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $kontak->anggota_id = $request->anggota_id;
            $kontak->jenis_id = $request->jenis;
            $kontak->nilai = $request->nilai;
            $kontak->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function kontak(Request $request)
    {
        try {
            $anggota_id = $request->anggota_id;
            $a = Kontak::tableName;
            $b = KontakJenis::tableName;
            $kontak = Kontak::select([
                DB::raw("$a.id"),
                DB::raw("$a.nilai"),
                DB::raw("$b.id as kontak_id"),
                DB::raw("$b.nama as kontak"),
                DB::raw("$b.icon as icon"),
            ])
                ->where("$a.anggota_id", '=', $anggota_id)
                ->join($b, "$a.jenis_id", '=', "$b.id")
                ->get();

            return response()->json(['datas' => $kontak]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function kontak_delete(Kontak $kontak)
    {
        try {
            if (!$this->savePermission($kontak->anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $kontak->delete();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    // Hobi crud =================================================================================
    public function hobi_select2(Request $request)
    {
        try {
            $model = Hobi::selectRaw('nama as text')
                ->whereRaw("(`nama` like '%$request->search%')")
                ->distinct()
                ->orderBy('nama')
                ->limit(10);

            $results = $model->get()->toArray();

            $get = true;
            $filter = [];
            foreach ($results as $result) {
                if ($request->search == $result['text']) $get = false;
                $filter[] = [
                    'id' => $result['text'],
                    'text' => $result['text']
                ];
            }

            if ($get) {
                $results = array_merge([['id' => $request->search, 'text' => $request->search]], $filter);
            }

            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function hobi_save(Request $request)
    {
        try {
            $request->validate([
                'anggota_id' => ['required', 'int'],
                'hobis' => ['required'],
            ]);
            DB::beginTransaction();

            // cek hak akses
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            // delete hobis
            Hobi::where('anggota_id', '=', $request->anggota_id)->delete();

            // insert hobis
            $hobis = [];
            foreach ($request->hobis as $hobby) {
                $hobis[] = ['nama' => $hobby, 'anggota_id' => $request->anggota_id];
            }

            Hobi::insert($hobis);

            foreach ($anggota->hobis ?? [] as $model) {
                Hobi::logToDb($model, 'create');
            }

            DB::commit();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    // Pendidikan crud ============================================================================
    public function pendidikan_insert(Request $request)
    {
        try {
            $request->validate([
                'anggota_id' => ['required', 'int'],
                'jenis_id' => ['required', 'int'],
                'instansi' => ['required', 'string'],
                'dari' => ['required', 'int'],
                'sampai' => ['nullable', 'int'],
                'jurusan' => ['nullable', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $pendidikan = new Pendidikan();
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $pendidikan->anggota_id = $request->anggota_id;
            $pendidikan->jenis_id = $request->jenis_id;
            $pendidikan->instansi = $request->instansi;
            $pendidikan->dari = $request->dari;
            $pendidikan->sampai = $request->sampai;
            $pendidikan->jurusan = $request->jurusan;
            $pendidikan->keterangan = $request->keterangan;
            $pendidikan->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pendidikan_update(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'anggota_id' => ['required', 'int'],
                'jenis_id' => ['required', 'int'],
                'instansi' => ['required', 'string'],
                'dari' => ['required', 'int'],
                'sampai' => ['nullable', 'int'],
                'jurusan' => ['nullable', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $pendidikan = Pendidikan::find($request->id);
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $pendidikan->anggota_id = $request->anggota_id;
            $pendidikan->jenis_id = $request->jenis_id;
            $pendidikan->instansi = $request->instansi;
            $pendidikan->dari = $request->dari;
            $pendidikan->sampai = $request->sampai;
            $pendidikan->jurusan = $request->jurusan;
            $pendidikan->keterangan = $request->keterangan;
            $pendidikan->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pendidikan(Request $request)
    {
        $anggota = Anggota::findOrFail($request->anggota_id);

        $a = Pendidikan::tableName;
        $b = PendidikanJenis::tableName;
        $kontak = Pendidikan::select([
            DB::raw("$a.id"),
            DB::raw("$a.instansi"),
            DB::raw("$a.dari"),
            DB::raw("$a.sampai"),
            DB::raw("$a.jurusan"),
            DB::raw("$a.keterangan"),
            DB::raw("$b.id as jenis_id"),
            DB::raw("$b.nama as jenis_nama"),
        ])
            ->where("$a.anggota_id", '=', $anggota->id)
            ->join($b, "$a.jenis_id", '=', "$b.id")
            ->orderBy("$a.dari", 'desc')
            ->get();

        Artikel::clearCache();
        Periode::clearCache();
        return response()->json(['datas' => $kontak]);
    }

    public function pendidikan_delete(Pendidikan $pendidikan)
    {
        try {
            if (!$this->savePermission($pendidikan->anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $pendidikan->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pendidikan_select2(Request $request)
    {
        try {
            $model = Pendidikan::selectRaw('instansi as text')
                ->whereRaw("(`instansi` like '%$request->search%')")
                ->distinct()
                ->orderBy('instansi')
                ->limit(10);

            if ($request->jenis_id) {
                $model->where('jenis_id', '=', $request->jenis_id);
            }

            $results = $model->get()->toArray();

            $get = true;
            $filter = [];
            foreach ($results as $result) {
                if ($request->search == $result['text']) $get = false;
                $filter[] = [
                    'id' => $result['text'],
                    'text' => $result['text']
                ];
            }

            if ($get) {
                $results = array_merge([['id' => $request->search, 'text' => $request->search]], $filter);
            }

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    // Pengalaman Organisasi ======================================================================
    public function pengalaman_organisasi_insert(Request $request)
    {
        try {
            $request->validate([
                'anggota_id' => ['required', 'int'],
                'nama' => ['required', 'string'],
                'dari' => ['required', 'int'],
                'sampai' => ['nullable', 'int'],
                'jabatan' => ['required', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $model = new PengalamanOrganisasi();
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $model->anggota_id = $request->anggota_id;
            $model->nama = $request->nama;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->jabatan = $request->jabatan;
            $model->keterangan = $request->keterangan;
            $model->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pengalaman_organisasi_update(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'anggota_id' => ['required', 'int'],
                'nama' => ['required', 'string'],
                'dari' => ['required', 'int'],
                'sampai' => ['nullable', 'int'],
                'jabatan' => ['required', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $model = PengalamanOrganisasi::find($request->id);
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $model->anggota_id = $request->anggota_id;
            $model->nama = $request->nama;
            $model->dari = $request->dari;
            $model->sampai = $request->sampai;
            $model->jabatan = $request->jabatan;
            $model->keterangan = $request->keterangan;
            $model->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pengalaman_organisasi(Request $request)
    {
        $anggota = Anggota::findOrFail($request->anggota_id);
        $datas = PengalamanOrganisasi::select([
            'id',
            'nama',
            'dari',
            'sampai',
            'jabatan',
            'keterangan',
        ])
            ->where("anggota_id", '=', $anggota->id)
            ->orderBy("dari", 'desc')
            ->get();
        return response()->json(['datas' => $datas]);
    }


    public function pengalaman_organisasi_delete(PengalamanOrganisasi $model)
    {
        try {
            if (!$this->savePermission($model->anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $model->delete();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pengalaman_organisasi_select2(Request $request)
    {
        try {
            $model = PengalamanOrganisasi::selectRaw('nama as text')
                ->whereRaw("(`nama` like '%$request->search%')")
                ->distinct()
                ->orderBy('nama')
                ->limit(10);

            $results = $model->get()->toArray();

            $get = true;
            $filter = [];
            foreach ($results as $result) {
                if ($request->search == $result['text']) $get = false;
                $filter[] = [
                    'id' => $result['text'],
                    'text' => $result['text']
                ];
            }

            if ($get) {
                $results = array_merge([['id' => $request->search, 'text' => $request->search]], $filter);
            }

            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }

    // Pengalaman lain ============================================================================
    public function pengalaman_lain_insert(Request $request)
    {
        try {
            $request->validate([
                'anggota_id' => ['required', 'int'],
                'pengalaman' => ['required', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $model = new PengalamanLain();
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $model->anggota_id = $request->anggota_id;
            $model->pengalaman = $request->pengalaman;
            $model->keterangan = $request->keterangan;
            $model->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pengalaman_lain_update(Request $request)
    {
        try {
            $request->validate([
                'id' => ['required', 'int'],
                'anggota_id' => ['required', 'int'],
                'pengalaman' => ['required', 'string'],
                'keterangan' => ['nullable', 'string'],
            ]);
            $model = PengalamanLain::find($request->id);
            $anggota = Anggota::findOrFail($request->anggota_id);
            if (!$this->savePermission($anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);

            $model->anggota_id = $request->anggota_id;
            $model->pengalaman = $request->pengalaman;
            $model->keterangan = $request->keterangan;
            $model->save();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json([]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function pengalaman_lain(Request $request)
    {
        $anggota = Anggota::findOrFail($request->anggota_id);
        $datas = PengalamanLain::select([
            'id',
            'pengalaman',
            'keterangan',
        ])
            ->where("anggota_id", '=', $anggota->id)
            ->orderBy("created_at", 'desc')
            ->get();
        return response()->json(['datas' => $datas]);
    }

    public function pengalaman_lain_delete(PengalamanLain $model)
    {
        try {
            if (!$this->savePermission($model->anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $model->delete();

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function google_delete(SocialAccount $account)
    {
        try {
            $user = $account->user;
            if (!$this->savePermission($user->anggota)) return response()->json(['message' => 'Maaf. Anda tidak memiliki akses'], 401);
            $account->delete();
            $socials = $user->socialAccounts()->where('provider_name', 'google')->get();
            $results = [];
            foreach ($socials ?? [] as $s) {
                $s->detail = $s->getProviderData();
                $results[] = $s;
            }

            Artikel::clearCache();
            Periode::clearCache();
            KataAlumni::clearCache();
            return response()->json($results);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
