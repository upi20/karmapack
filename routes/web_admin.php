<?php
// ====================================================================================================================
// utility ============================================================================================================
use Illuminate\Support\Facades\Route;

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

// Menu ===============================================================================================================
use App\Http\Controllers\Admin\MenuController;

$name = 'admin';
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name("$name.dashboard")->middleware("permission:$name.dashboard");

$prefix = 'user';
Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.user
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");

    Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
    Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'address';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.address
    $addreses = [
        ['prefix' => 'province', 'class' => ProvinceController::class],
        ['prefix' => 'regencie', 'class' => RegencieController::class],
        ['prefix' => 'district', 'class' => DistrictController::class],
        ['prefix' => 'village', 'class' => VillageController::class],
    ];
    foreach ($addreses as $r) {
        $prefix = $r['prefix'];
        Route::controller($r['class'])->prefix($prefix)->group(function () use ($name, $prefix, $addreses) {
            $name = "$name.$prefix"; // admin.address. ...
            // generate perrmision for select2
            $p = implode('|', array_map(function ($a) use ($name) {
                return $name . '.' . $a['prefix'];
            }, $addreses));

            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$p|member.profile");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
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
        Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.insert");
        Route::get('/edit/{artikel}', 'edit')->name("$name.edit")->middleware("permission:$name.update");

        Route::delete('/{artikel}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'kategori';
    Route::controller(KategoriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; //admin.artikel.kategori
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'tag';
    Route::controller(TagController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.artikel.tag
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
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

        Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.insert");
        Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.update");

        Route::get('/active/{model}', 'setActive')->name("$name.active")->middleware("permission:$name.active");
        Route::post('/member', 'member')->name("$name.member")->middleware("permission:$name.member");
        Route::post('/detail/{model}', 'detail')->name("$name.detail")->middleware("permission:$name.detail");

        Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'jabatan';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pengurus.jabatan

        Route::controller(JabatanController::class)->group(function () use ($name) {
            Route::get('/get_parent', 'parent')->name("$name.parent")->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");

            // base
            Route::get('/{periode_id}', 'index')->name($name)->middleware("permission:$name");
            Route::post('/{periode_id}', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        });


        $prefix = 'member';
        Route::controller(JabatanMemberController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.pengurus.jabatan.member
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
            Route::get('/{id}', 'index')->name($name)->middleware("permission:$name");
            Route::post('/save', 'save')->name("$name.save")->middleware("permission:$name.save");
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

$prefix = 'menu';
Route::controller(MenuController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.menu
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::put('/save', 'save')->name("$name.save")->middleware("permission:$name.save");

    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

    Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name.list");
    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.find");
    Route::get('/parent_list', 'parent_list')->name("$name.parent_list")->middleware("permission:$name.list");
});
