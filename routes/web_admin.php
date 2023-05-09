<?php
// ====================================================================================================================
// utility ============================================================================================================
use Illuminate\Support\Facades\Route;

// ====================================================================================================================
// Admin ==============================================================================================================
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FooterInstagramController;
use App\Http\Controllers\Admin\UsernameValidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KataAlumniController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VistorController;

// Address ============================================================================================================
use App\Http\Controllers\Admin\Address\ProvinceController;
use App\Http\Controllers\Admin\Address\RegencieController;
use App\Http\Controllers\Admin\Address\DistrictController;
use App\Http\Controllers\Admin\Address\VillageController;
use App\Http\Controllers\Admin\AnggotaController as AdminAnggotaController;

// Artikel ============================================================================================================
use App\Http\Controllers\Admin\Artikel\ArtikelController;
use App\Http\Controllers\Admin\Artikel\KategoriController;
use App\Http\Controllers\Admin\Artikel\TagController;
use App\Http\Controllers\Admin\Laporan\AnggotaController;

// Contact ============================================================================================================
use App\Http\Controllers\Admin\Contact\FAQController;
use App\Http\Controllers\Admin\Contact\ListContactController;
use App\Http\Controllers\Admin\Contact\MessageController;

// Pengurus ===========================================================================================================
use App\Http\Controllers\Admin\Kepengurusan\JabatanController;
use App\Http\Controllers\Admin\Kepengurusan\JabatanMemberController;
use App\Http\Controllers\Admin\Kepengurusan\PeriodeController;

// Profile ============================================================================================================
use App\Http\Controllers\Admin\Profile\KontakTipeController;
use App\Http\Controllers\Admin\Profile\PendidikanJenisController;

// Pendaftaran ========================================================================================================
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\Pendaftaran\SensusController;

// User Access ========================================================================================================
use App\Http\Controllers\Admin\UserAccess\PermissionController;
use App\Http\Controllers\Admin\UserAccess\RoleController;

// Menu ===============================================================================================================
use App\Http\Controllers\Admin\Menu\AdminController as MenuAdminController;
use App\Http\Controllers\Admin\Menu\FrontendController as MenuFrontendController;

// Pendaftaran ========================================================================================================
use App\Http\Controllers\Admin\Pendaftaran\GFormController;

// Setting ============================================================================================================
use App\Http\Controllers\Admin\Setting\AdminController;
use App\Http\Controllers\Admin\Setting\FrontController;
use App\Http\Controllers\Admin\Setting\HomeController;
use App\Http\Controllers\Admin\Setting\SejarahController;
use App\Http\Controllers\Admin\Setting\HomeSliderController;
use App\Http\Controllers\Admin\Setting\VisiMisiController;
use App\Http\Controllers\Admin\Setting\AboutController;

// Utility ============================================================================================================
use App\Http\Controllers\Admin\Utility\HariBesarNasionalController;
use App\Http\Controllers\Admin\Utility\NotifAdminAtasController;
use App\Http\Controllers\Admin\Utility\NotifDepanAtasController;

// Home ===============================================================================================================
use App\Http\Controllers\Admin\Home\KataKataController;
use App\Http\Controllers\Admin\Home\PengurusController;
use App\Http\Controllers\Admin\Home\ProgramPembelajaranController;
use App\Http\Controllers\Admin\Home\TestimonialController;

// SPK ================================================================================================================
use App\Http\Controllers\Admin\SPK\AHP\AlternatifController as SPK_AHP_AlternatifController;
use App\Http\Controllers\Admin\SPK\AHP\JenisController as SPK_AHP_JenisController;
use App\Http\Controllers\Admin\SPK\AHP\KriteriaController as SPK_AHP_KriteriaController;
use App\Http\Controllers\Admin\SPK\AHP\PerhitunganController as SPK_AHP_PerhitunganController;

// Lainnya ============================================================================================================

$name = 'admin';
$prefix = 'dashboard';
Route::group(
    [
        'prefix' => $prefix,
        'middleware' => "permission:$name.$prefix",
        'controller' => DashboardController::class
    ],
    function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.dashboard
        Route::get('/', 'index')->name($name);
        Route::get('/ulang_tahun', 'ulang_tahun')->name("$name.ulang_tahun");
        Route::get('/hbn', 'hbn')->name("$name.hbn");
        Route::get('/vistor_counter', 'vistor_counter')->name("$name.vistor_counter");
    }
);

$prefix = 'anggota';
Route::controller(AdminAnggotaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.anggota
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");

    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::delete('/{anggota}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'address'; //
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
        $name = "$name.$prefix"; // admin.artikel.data
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

$prefix = 'kepengurusan';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.kepengurusan

    $prefix = 'periode';
    Route::controller(PeriodeController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kepengurusan.periode
        Route::get('/', 'index')->name($name)->middleware("permission:$name");

        Route::get('/add', 'add')->name("$name.add")->middleware("permission:$name.insert");
        Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.update");

        Route::get('/active/{model}', 'setActive')->name("$name.active")->middleware("permission:$name.active");
        Route::get('/detail/{periode}', 'detail')->name("$name.detail")->middleware("permission:$name");

        Route::post('/insert', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

        // set role by jabatan
        Route::post('/set_role', 'set_pengurus_role')->name("$name.set_role")->middleware("permission:$name.set_role");
    });

    $prefix = 'jabatan';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kepengurusan.jabatan

        Route::controller(JabatanController::class)->group(function () use ($name) {
            Route::get('/get_parent', 'parent')->name("$name.parent")->middleware("permission:$name");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");

            Route::get('/{periode}', 'index')->name($name)->middleware("permission:$name");
            Route::post('/{periode}', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::delete('/{jabatan}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        });

        $prefix = 'member';
        Route::controller(JabatanMemberController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.kepengurusan.jabatan.member
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
            Route::post('/save', 'save')->name("$name.save")->middleware("permission:$name.save");
            Route::get('/{jabatan:id}', 'index')->name($name)->middleware("permission:$name");
        });
    });
});

$prefix = 'galeri';
Route::controller(GaleriController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.galeri
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
});

$prefix = 'social_media';
Route::controller(SocialMediaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.social_media
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
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
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'kontak_tipe';
    Route::controller(KontakTipeController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.profile.kontak_tipe
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
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

    $prefix = 'gform';
    Route::controller(GFormController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pendaftaran.gform
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/member', 'member_select2')->name("$name.member")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'sensus';
    Route::controller(SensusController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pendaftaran.sensus
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");
        Route::post('/status', 'status')->name("$name.status")->middleware("permission:$name.status");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'santri';
    Route::controller(PendaftaranController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.pendaftaran.santri
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/set_status/{model}', 'set_status')->name("$name.set_status")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

$prefix = 'utility';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.utility
    $prefix = 'notif_depan_atas';
    Route::controller(NotifDepanAtasController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.notif_depan_atas
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'notif_admin_atas';
    Route::controller(NotifAdminAtasController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.notif_admin_atas
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'hari_besar_nasional';
    Route::controller(HariBesarNasionalController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.utility.hari_besar_nasional
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::get('/list_error', 'list_error')->name("$name.list_error")->middleware("permission:$name");
    });
});

$prefix = 'user_access';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.user_access

    $prefix = 'permission';
    Route::controller(PermissionController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user_access.permission
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'role';
    Route::controller(RoleController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.user_access.role
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/create', 'create')->name("$name.create")->middleware("permission:$name.insert");
        Route::get('/edit/{model}', 'edit')->name("$name.edit")->middleware("permission:$name.update");
        Route::post('/', 'store')->name("$name.store")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{id}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

$prefix = 'menu';
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.menu

    $prefix = 'admin';
    Route::controller(MenuAdminController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.menu.admin
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::put('/save', 'save')->name("$name.save")->middleware("permission:$name.save");

        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

        Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::get('/parent_list', 'parent_list')->name("$name.parent_list")->middleware("permission:$name");
    });

    $prefix = 'frontend';
    Route::controller(MenuFrontendController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.menu.frontend
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::put('/save', 'save')->name("$name.save")->middleware("permission:$name.save");

        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

        Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::get('/parent_list', 'parent_list')->name("$name.parent_list")->middleware("permission:$name");
    });
});

$prefix = 'kata_alumni';
Route::controller(KataAlumniController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.kata_alumni
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/member', 'member_select2')->name("$name.member")->middleware("permission:$name");
    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    Route::get('/list', 'list')->name("$name.list")->middleware("permission:$name.update|$name.insert|$name.update|$name.delete");
    Route::post('/list_save', 'list_save')->name("$name.list_save")->middleware("permission:$name.update|$name.insert|$name.update|$name.delete");
});

$prefix = 'instagram';
Route::controller(InstagramController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.instagram
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
    Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
    Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
});

$prefix = "setting";
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.setting

    $prefix = 'admin';
    $name_ = "$name.$prefix"; // admin.setting.admin
    Route::group([
        'controller' => AdminController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);
        Route::post('/save/app', 'save_app')->name("$name_.save.app");
        Route::post('/save/meta', 'save_meta')->name("$name_.save.meta");

        Route::get('/meta', 'meta_list')->name("$name_.meta");
        Route::post('/meta/insert', 'meta_insert')->name("$name_.meta.insert");
        Route::post('/meta/update', 'meta_update')->name("$name_.meta.update");
        Route::delete('/meta/delete', 'meta_delete')->name("$name_.meta.delete");
    });

    $prefix = 'front';
    $name_ = "$name.$prefix"; // admin.setting.front
    Route::group([
        'controller' => FrontController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);
        Route::post('/save/app', 'save_app')->name("$name_.save.app");
        Route::post('/save/meta', 'save_meta')->name("$name_.save.meta");

        Route::get('/meta', 'meta_list')->name("$name_.meta");
        Route::post('/meta/insert', 'meta_insert')->name("$name_.meta.insert");
        Route::post('/meta/update', 'meta_update')->name("$name_.meta.update");
        Route::delete('/meta/delete', 'meta_delete')->name("$name_.meta.delete");
    });

    $prefix = 'home';
    $name_ = "$name.$prefix"; // admin.setting.home
    Route::group([
        'controller' => HomeController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);

        // save
        $method = 'hero';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'poesaka';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'visi_misi';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'struktur_anggota';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'kata_alumni';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'galeri_kegiatan';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'artikel';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'sensus';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'instagram';
        Route::post("/$method", $method)->name("$name_.$method");

        $method = 'galeri';
        Route::post("/$method", $method)->name("$name_.$method");
    });

    $prefix = 'sejarah';
    $name_ = "$name.$prefix"; // admin.setting.sejarah
    Route::group([
        'controller' => SejarahController::class,
        'prefix' => $prefix,
        'middleware' => "permission:$name_"
    ], function () use ($name_) {
        Route::get('/', 'index')->name($name_);
        Route::post('/save', 'save')->name("$name_.save");
    });

    $prefix = 'home_slider';
    Route::controller(HomeSliderController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.setting.home_slider
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'visi_misi';
    Route::controller(VisiMisiController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.setting.visi_misi
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });

    $prefix = 'about';
    Route::controller(AboutController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.setting.about
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
    });
});

$prefix = "lapooran";
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.laporan

    $prefix = 'anggota';
    Route::controller(AnggotaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.laporan.anggota
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/excel', 'excel')->name("$name.excel")->middleware("permission:$name.excel");
    });
});


$prefix = 'kontak';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.kontak
    $prefix = 'faq';
    Route::controller(FAQController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.faq
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'list';
    Route::controller(ListContactController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.list
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
    });

    $prefix = 'message';
    Route::controller(MessageController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.kontak.message
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

$prefix = 'home';
Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.home

    $prefix = 'kata_kata';
    Route::controller(KataKataController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.home.kata_kata
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'program_pembelajaran';
    Route::controller(ProgramPembelajaranController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.home.program_pembelajaran
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'pengurus';
    Route::controller(PengurusController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.home.pengurus
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });

    $prefix = 'testimonial';
    Route::controller(TestimonialController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.home.testimonial
        Route::get('/', 'index')->name($name)->middleware("permission:$name");
        Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name.update");
        Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
        Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
        Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
    });
});

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

$prefix = "profile";
Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.profile
    Route::get('/', 'profile')->name($name)->middleware("permission:$name");
    Route::post('/save', 'save_profile')->name("$name.save")->middleware("permission:$name.save");
    Route::post('/save/password', 'save_password')->name("$name.password.save")->middleware("permission:$name.password.save");
});

$prefix = 'vistor';
Route::prefix($prefix)->controller(VistorController::class)->group(function () use ($prefix, $name) {
    $name = "$name.$prefix"; // admin.vistor
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
    Route::get('/refresh_detail_ip', 'refresh_detail_ip')->name("$name.refresh_detail_ip")->middleware("permission:$name");
});

$prefix = "password";
Route::controller(UserController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.password
    Route::get('/', 'change_password')->name($name)->middleware("permission:$name");
    Route::post('/save', 'save_password')->name("$name.save")->middleware("permission:$name.save");
});

$prefix = 'spk';
Route::prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // admin.spk

    $prefix = 'ahp';
    Route::prefix($prefix)->group(function () use ($name, $prefix) {
        $name = "$name.$prefix"; // admin.spk.ahp

        $prefix = 'kriteria';
        Route::controller(SPK_AHP_KriteriaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.spk.ahp.kriteria
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
            Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");

            $prefix = 'bobot';
            Route::prefix($prefix)->group(function () use ($name, $prefix) {
                $name = "$name.$prefix"; // admin.spk.ahp.bobot
                Route::get('/', 'bobot_all')->name($name)->middleware("permission:$name");
                Route::get('/matrix', 'bobot_matrix')->name("$name.matrix")->middleware("permission:$name");
                Route::get('/normalisasi', 'bobot_normalisasi')->name("$name.normalisasi")->middleware("permission:$name");
                Route::post('/update', 'bobot_update')->name("$name.update")->middleware("permission:$name");
            });

            $prefix = 'jenis';
            Route::controller(SPK_AHP_JenisController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
                $name = "$name.$prefix"; // admin.spk.ahp.kriteria.jenis
                Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");
                Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
                Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");

                $prefix = 'bobot';
                Route::prefix($prefix)->group(function () use ($name, $prefix) {
                    $name = "$name.$prefix"; // admin.spk.ahp.kriteria.jenis.bobot
                    Route::get('/', 'bobot_all')->name($name)->middleware("permission:$name");
                    Route::get('/matrix', 'bobot_matrix')->name("$name.matrix")->middleware("permission:$name");
                    Route::get('/normalisasi', 'bobot_normalisasi')->name("$name.normalisasi")->middleware("permission:$name");
                    Route::post('/update', 'bobot_update')->name("$name.update")->middleware("permission:$name");
                });

                Route::get('/{kriteria:slug}', 'index')->name($name)->middleware("permission:$name");
                Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
            });
        });

        $prefix = 'alternatif';
        Route::controller(SPK_AHP_AlternatifController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.spk.ahp.alternatif
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::post('/', 'insert')->name("$name.insert")->middleware("permission:$name.insert");

            Route::get('/table', 'table')->name("$name.table")->middleware("permission:$name");
            Route::get('/option', 'option')->name("$name.option")->middleware("permission:$name");
            Route::get('/select2', 'select2')->name("$name.select2")->middleware("permission:$name");

            Route::get('/find', 'find')->name("$name.find")->middleware("permission:$name");
            Route::post('/update', 'update')->name("$name.update")->middleware("permission:$name.update");
            Route::delete('/{model}', 'delete')->name("$name.delete")->middleware("permission:$name.delete");
        });

        $prefix = 'perhitungan';
        Route::controller(SPK_AHP_PerhitunganController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // admin.spk.ahp.perhitungan
            Route::get('/', 'index')->name($name)->middleware("permission:$name");
            Route::get('/hasil', 'hasil')->name("$name.hasil")->middleware("permission:$name");
            Route::post('/setting', 'setting')->name("$name.setting")->middleware("permission:$name.setting");
        });
    });
});
