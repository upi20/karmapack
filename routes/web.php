<?php

// ====================================================================================================================
use App\Models\User;

// ====================================================================================================================
// utility ============================================================================================================
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// Controller =========================================================================================================
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoaderController;

// ====================================================================================================================
// Admin ==============================================================================================================
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FooterInstagramController;
use App\Http\Controllers\Admin\UsernameValidateController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Address ============================================================================================================
use App\Http\Controllers\Admin\Address\ProvinceController;
use App\Http\Controllers\Admin\Address\RegencieController;
use App\Http\Controllers\Admin\Address\DistrictController;
use App\Http\Controllers\Admin\Address\VillageController;

// Artikel ============================================================================================================
use App\Http\Controllers\Admin\Artikel\ArtikelController;
use App\Http\Controllers\Admin\Artikel\KategoriController;
use App\Http\Controllers\Admin\Artikel\TagController;

// Pengurus ============================================================================================================
use App\Http\Controllers\Admin\Pengurus\PeriodeController;
use App\Http\Controllers\Admin\Pengurus\JabatanController;
use App\Http\Controllers\Admin\Pengurus\JabatanMemberController;

// Profile ============================================================================================================
use App\Http\Controllers\Admin\Profile\KontakTipeController;
use App\Http\Controllers\Admin\Profile\PendidikanJenisController;

// Pendaftaran ========================================================================================================
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\Pendaftaran\SensusController as SensusControllerAdmin;

// User Access ========================================================================================================
use App\Http\Controllers\Admin\UserAccess\PermissionController;
use App\Http\Controllers\Admin\UserAccess\RoleController;

// ====================================================================================================================
// Member =============================================================================================================
use App\Http\Controllers\Member\ProfileController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;


// ====================================================================================================================
// Frontend ===========================================================================================================
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\GaleriController as GaleriControllerFrontend;
use App\Http\Controllers\Frontend\PendaftaranController as PendaftaranControllerFrontend;

// Tentang Kami =======================================================================================================
use App\Http\Controllers\Frontend\About\Kepengurusan\StrukturController;
use App\Http\Controllers\Frontend\About\Kepengurusan\BidangController;
use App\Http\Controllers\Frontend\Pendaftaran\SensusController as SensusControllerFrontend;

// ====================================================================================================================
// ====================================================================================================================




// auth ===============================================================================================================
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name("login");
    Route::post('/login', 'check_login')->name("login.check_login");
    Route::get('/logout', 'logout')->name("login.logout");
});
// ====================================================================================================================




// home default =======================================================================================================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name("home");
    Route::get('/periode/{model:slug}', 'periode')->name("periode");
    Route::get('/artikel/{model:slug}', 'artikel')->name("artikel");
});
// ====================================================================================================================




// Periode Kepengurusan ===============================================================================================
$name = 'about';
Route::group(['prefix' => $name], function () use ($name) {
    $prefix = 'kepengurusan';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // about.kepengurusan

        $prefix = 'struktur';
        Route::controller(StrukturController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // about.kepengurusan.struktur
            Route::get('/', 'index')->name($name);
            Route::get('/{model:slug}', 'periode')->name("$name.periode");
        });

        // bidang
        Route::get('/bidang/{model:slug}', [BidangController::class, 'index'])->name("$name.bidang");
    });

    // sejarah

});
// ====================================================================================================================




// Member =============================================================================================================
$name = 'anggota';
Route::controller(MemberController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
    Route::get('/{model:id}', 'member')->name("$name.id");
});
// ====================================================================================================================




// Kontak =============================================================================================================
$name = 'kontak';
Route::controller(KontakController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
});
// ====================================================================================================================




// Galeri =============================================================================================================
$name = 'galeri';
Route::controller(GaleriControllerFrontend::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
    Route::get('/detail/{model:slug}', 'detail')->name("$name.detail");
});
// ====================================================================================================================




// Pendaftaran ========================================================================================================
$name = 'pendaftaran';
Route::prefix($name)->group(function () use ($name) {
    Route::controller(PendaftaranControllerFrontend::class)->group(function () use ($name) {
        Route::get('/', 'index')->name($name);
    });

    $prefix = 'sensus';
    Route::controller(SensusControllerFrontend::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix";
        Route::get('/', 'index')->name($name);
        Route::post('/insert', 'insert')->name("$name.insert");
    });
});
// ====================================================================================================================




// dashboard ==========================================================================================================
Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = isset($user->role) ? $user->role : null;
    switch ($role) {
        case User::ROLE_ADMIN:
            return Redirect::route('admin.dashboard');
            break;

        case User::ROLE_MEMBER:
            return Redirect::route('member.dashboard');
            break;

        default:
            return view('auth.login');
            break;
    }
})->name("dashboard");
// ====================================================================================================================





// Admin route ========================================================================================================
$name = 'admin';
Route::group(['prefix' => $name, 'middleware' => ['auth:sanctum']], function () use ($name) {
    Route::get('/', [AdminDashboardController::class, 'index'])->name("$name.dashboard")->middleware("permission:$name.dashboard");

    $prefix = 'user';
    Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.find");
        Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.store");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'address';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.address
        foreach ([
            ['prefix' => 'province', 'class' => ProvinceController::class],
            ['prefix' => 'regencie', 'class' => RegencieController::class],
            ['prefix' => 'district', 'class' => DistrictController::class],
            ['prefix' => 'village', 'class' => VillageController::class],
        ] as $r) {
            $prefix = $r['prefix'];
            Route::controller($r['class'])->prefix($prefix)->group(function () use ($name, $prefix) {
                $name = "$name.$prefix"; // admin.address. ...
                Route::get('/', 'index')->name($name)->middleware("permission:$name");
                Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
                Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.store");
                Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
                Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
            });
        }
    });

    $prefix = 'artikel';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.artikel

        $prefix = 'data';
        Route::controller(ArtikelController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.data
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.add");
            Route::get('/edit/{artikel}', 'edit')->name("$name.edit")->middleware("permission:$name.edit");

            Route::delete('/{artikel}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'kategori';
        Route::controller(KategoriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; //admin.artikel.kategori
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'tag';
        Route::controller(TagController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.artikel.tag
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });
    });

    $prefix = 'pengurus';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pengurus

        $prefix = 'periode';
        Route::controller(PeriodeController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.pengurus.periode
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.add");
            Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.edit");
            Route::get('/active/{model}', 'setActive')->name("$name.active")->middleware("permission:$name.active");
            Route::post('/member', 'member')->name("$name.member")->middleware("permission:$name.member");
            Route::post('/detail/{model}', 'detail')->name("$name.detail")->middleware("permission:$name.detail");

            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'jabatan';
        Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.pengurus.jabatan

            Route::controller(JabatanController::class)->group(function () use ($name) {
                Route::get('/get_parent', 'parent')->name("$name.parent")->middleware("permission:$name.parent");
                Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
                Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
                // base
                Route::get('/{periode_id}', 'index')->name($name)->middleware("permission:$name");
                Route::post('/{periode_id}', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
                Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            });


            $prefix = 'member';
            Route::controller(JabatanMemberController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
                $name = "$name.$prefix"; // admin.pengurus.jabatan.member
                Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
                Route::get('/{id}', 'index')->name($name)->middleware("permission:$name");
                Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
            });
        });
    });

    $prefix = 'galeri';
    Route::controller(GaleriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.galeri
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'social_media';
    Route::controller(SocialMediaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.social_media
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'contact';
    Route::controller(ContactController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.contact
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'footer_instagram';
    Route::controller(FooterInstagramController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.footer_instagram
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'profile'; // profile addon
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.profile

        $prefix = 'pendidikan_jenis';
        Route::controller(PendidikanJenisController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.profile.pendidikan_jenis
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'kontak_tipe';
        Route::controller(KontakTipeController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.profile.kontak_tipe
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });
    });

    $prefix = 'username_validation';
    Route::controller(UsernameValidateController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.username_validation
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/update', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
        Route::post('/save', 'save')->name("$name.save")->middleware("permission:$name.save");
    });

    $prefix = 'pendaftaran';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pendaftaran

        Route::controller(PendaftaranController::class)->group(function () use ($name) {
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/get_one/{model}', 'getOne')->name("$name.get_one")->middleware("permission:$name.get_one");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'sensus';
        Route::controller(SensusControllerAdmin::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.pendaftaran.sensus
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");
            Route::post('/status', 'status')->name("$name.status")->middleware("permission:$name.status");
        });
    });

    $prefix = 'user_access';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user_access

        $prefix = 'permission';
        Route::controller(PermissionController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.user_access.permission
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
            Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.store");
            Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        });

        $prefix = 'role';
        Route::controller(RoleController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.user_access.role
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/create', 'create')->name("$name.create")->middleware("permission:$name.create");
            Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.edit");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name.select2");
            Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.store");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
            Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        });
    });
});
// ====================================================================================================================




// Member Panel Admin =================================================================================================
$name = 'member';
Route::group(['prefix' => $name, 'middleware' => ['auth:sanctum', 'verified', 'member']], function () use ($name) {
    Route::get('/', [MemberDashboardController::class, 'index'])->name("$name.dashboard")->middleware("permission:$name.dashboard");

    $prefix = 'profile';
    Route::controller(ProfileController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // member.profile
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/save_basic', 'save_basic')->name("$name.save_basic")->middleware("permission:$name.save_basic");
        Route::post('/save_address', 'save_address')->name("$name.save_address")->middleware("permission:$name.save_address");
        Route::post('/save_detail', 'save_detail')->name("$name.save_detail")->middleware("permission:$name.save_detail");

        // other information ==========================================================================================
        $n = 'kontak';
        $name_c = "$name.$n"; // member.profile.kontak
        Route::get("/{$n}", "{$n}")->name($name_c)->middleware("permission:$name_c");
        Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert")->middleware("permission:{$name_c}_insert");
        Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update")->middleware("permission:{$name_c}_update");
        Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete")->middleware("permission:{$name_c}_delete");

        $n = 'hobby';
        $name_c = "$name.$n"; // member.profile.hobby
        Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2")->middleware("permission:{$name_c}_select2");
        Route::post("/{$n}_save", "{$n}_save")->name("{$name_c}_save")->middleware("permission:{$name_c}_save");

        $n = 'profesi';
        $name_c = "$name.$n"; // member.profile.profesi
        Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2")->middleware("permission:{$name_c}_select2");

        $n = 'pendidikan';
        $name_c = "$name.$n"; // member.profile.pendidikan
        Route::get("/{$n}", "{$n}")->name($name_c)->middleware("permission:$name_c");
        Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2")->middleware("permission:{$name_c}_select2");
        Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert")->middleware("permission:{$name_c}_insert");
        Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update")->middleware("permission:{$name_c}_update");
        Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete")->middleware("permission:{$name_c}_delete");

        $n = 'pengalaman_organisasi';
        $name_c = "$name.$n"; // member.profile.pengalaman_organisasi
        Route::get("/{$n}", "{$n}")->name($name_c)->middleware("permission:$name_c");
        Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2")->middleware("permission:{$name_c}_select2");
        Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert")->middleware("permission:{$name_c}_insert");
        Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update")->middleware("permission:{$name_c}_update");
        Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete")->middleware("permission:{$name_c}_delete");

        $n = 'pengalaman_lain';
        $name_c = "$name.$n"; // member.profile.pengalaman_lain
        Route::get("/{$n}", "{$n}")->name($name_c)->middleware("permission:$name_c");
        Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2")->middleware("permission:{$name_c}_select2");
        Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert")->middleware("permission:{$name_c}_insert");
        Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update")->middleware("permission:{$name_c}_update");
        Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete")->middleware("permission:{$name_c}_delete");
    });

    $prefix = "password";
    Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // member.password
        Route::get('/', 'change_password')->name($name)->middleware("permission:$name");
        Route::post('/save', 'save_password')->name("$name.save")->middleware("permission:$name.save");
    });
});
// ====================================================================================================================




// Utility ============================================================================================================
$prefix = 'loader';
Route::controller(LoaderController::class)->prefix($prefix)->group(function () {
    Route::prefix('js')->group(function () {
        Route::get('/{file}.js', 'js')->name("load_js");
        Route::get('/{f}/{file}.js', 'js_f')->name("load_js_a");
        Route::get('/{f}/{f_a}/{file}.js', 'js_a')->name("load_js_b");
        Route::get('/{f}/{f_a}/{f_b}/{file}.js', 'js_b')->name("load_js_b");
        Route::get('/{f}/{f_a}/{f_b}/{f_c}/{file}.js', 'js_c')->name("load_js_c");
        Route::get('/{f}/{f_a}/{f_b}/{f_c}/{f_d}/{file}.js', 'js_d')->name("load_js_d");
    });
});
// ====================================================================================================================




// laboartorium =======================================================================================================
$prefix = 'lab';
Route::controller(LabController::class)->prefix($prefix)->group(function () {
    Route::get('/phpspreadsheet', 'phpspreadsheet')->name("lab.phpspreadsheet");
    Route::get('/javascript', 'javascript')->name("lab.javascript");
    Route::get('/jstes', 'jstes')->name("lab.jstes");
});
// ====================================================================================================================




// profile username ===================================================================================================
Route::get('/{model:username}', [MemberController::class, 'member'])->name("anggota.username");
