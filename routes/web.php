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
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'check_login')->name('login.check_login');
    Route::get('/logout', 'logout')->name('login.logout');
});
// ====================================================================================================================




// home default =======================================================================================================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/periode/{model:slug}', 'periode')->name('periode');
    Route::get('/artikel/{model:slug}', 'artikel')->name('artikel');
});
// ====================================================================================================================




// Periode Kepengurusan ===============================================================================================
Route::group(['prefix' => 'about'], function () {
    Route::group(['prefix' => 'kepengurusan'], function () {

        // struktur
        Route::controller(StrukturController::class)->prefix('struktur')->group(function () {
            Route::get('/',  'index')->name('about.kepengurusan.struktur');
            Route::get('/{model:slug}',  'periode')->name('about.kepengurusan.struktur.periode');
        });

        // bidang
        Route::get('/bidang/{model:slug}', [BidangController::class, 'index'])->name('about.kepengurusan.bidang');
    });

    // sejarah


});
// ====================================================================================================================




// Member =============================================================================================================
Route::controller(MemberController::class)->prefix('anggota')->group(function () {
    Route::get('/', 'index')->name('anggota');
    Route::get('/{model:id}', 'member')->name('anggota.id');
});
// ====================================================================================================================




// Kontak =============================================================================================================
Route::controller(KontakController::class)->prefix('kontak')->group(function () {
    Route::get('/', 'index')->name('kontak'); // page
});
// ====================================================================================================================




// Galeri =============================================================================================================
Route::controller(GaleriControllerFrontend::class)->prefix('galeri')->group(function () {
    Route::get('/', 'index')->name('galeri'); // page
    Route::get('/detail/{model:slug}', 'detail')->name('galeri.detail');
});
// ====================================================================================================================




// Pendaftaran ========================================================================================================
Route::prefix('pendaftaran')->group(function () {
    Route::controller(PendaftaranControllerFrontend::class)->group(function () {
        Route::get('/', 'index')->name('pendaftaran'); // page
    });

    Route::controller(SensusControllerFrontend::class)->prefix('sensus')->group(function () {
        Route::get('/', 'index')->name('pendaftaran.sensus'); // page
        Route::post('/insert', 'insert')->name('pendaftaran.sensus.insert'); // insert
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
})->name('dashboard');
// ====================================================================================================================





// Admin route ========================================================================================================
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified', 'admin']], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // user
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index')->name('admin.user');
        Route::get('/excel', 'excel')->name('admin.user.excel');
        Route::post('/', 'store')->name('admin.user.store');
        Route::delete('/{id}', 'delete')->name('admin.user.delete');
        Route::post('/update', 'update')->name('admin.user.update');
    });

    // address
    Route::group(['prefix' => 'address'], function () {

        // Province
        Route::controller(ProvinceController::class)->prefix('province')->group(function () {
            Route::get('/',  'index')->name('admin.address.province');
            Route::get('/select2',  'select2')->name('admin.address.province.select2');
            Route::post('/',  'store')->name('admin.address.province.store');
            Route::delete('/{id}',  'delete')->name('admin.address.province.delete');
            Route::post('/update',  'update')->name('admin.address.province.update');
        });

        Route::controller(RegencieController::class)->prefix('regencie')->group(function () {
            Route::get('/',  'index')->name('admin.address.regencie');
            Route::get('/select2',  'select2')->name('admin.address.regencie.select2');
            Route::post('/',  'store')->name('admin.address.regencie.store');
            Route::delete('/{id}',  'delete')->name('admin.address.regencie.delete');
            Route::post('/update',  'update')->name('admin.address.regencie.update');
        });

        // District
        Route::controller(DistrictController::class)->prefix('district')->group(function () {
            Route::get('/', 'index')->name('admin.address.district');
            Route::get('/select2', 'select2')->name('admin.address.district.select2');
            Route::post('/', 'store')->name('admin.address.district.store');
            Route::delete('/{id}', 'delete')->name('admin.address.district.delete');
            Route::post('/update', 'update')->name('admin.address.district.update');
        });

        // Village
        Route::controller(VillageController::class)->prefix('village')->group(function () {
            Route::get('/',  'index')->name('admin.address.village');
            Route::get('/select2',  'select2')->name('admin.address.village.select2');
            Route::post('/',  'store')->name('admin.address.village.store');
            Route::delete('/{id}',  'delete')->name('admin.address.village.delete');
            Route::post('/update',  'update')->name('admin.address.village.update');
        });
    });

    // Artikel
    Route::group(['prefix' => 'artikel'], function () {

        // Data
        Route::controller(ArtikelController::class)->prefix('data')->group(function () {
            Route::get('/',  'index')->name('admin.artikel.data'); // page
            Route::get('/add',  'add')->name('admin.artikel.data.add'); // page
            Route::get('/edit/{artikel}',  'edit')->name('admin.artikel.data.edit'); // page

            Route::delete('/{artikel}',  'delete')->name('admin.artikel.data.delete');
            Route::post('/insert',  'insert')->name('admin.artikel.data.insert');
            Route::post('/update',  'update')->name('admin.artikel.data.update');
        });

        // Kategori
        Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
            Route::get('/',  'index')->name('admin.artikel.kategori');
            Route::get('/select2',  'select2')->name('admin.artikel.kategori.select2');
            Route::post('/',  'insert')->name('admin.artikel.kategori.insert');
            Route::delete('/{model}',  'delete')->name('admin.artikel.kategori.delete');
            Route::post('/update',  'update')->name('admin.artikel.kategori.update');
        });

        // Tag
        Route::controller(TagController::class)->prefix('tag')->group(function () {
            Route::get('/', 'index')->name('admin.artikel.tag');
            Route::get('/select2', 'select2')->name('admin.artikel.tag.select2');
            Route::post('/', 'insert')->name('admin.artikel.tag.insert');
            Route::delete('/{model}', 'delete')->name('admin.artikel.tag.delete');
            Route::post('/update', 'update')->name('admin.artikel.tag.update');
        });
    });

    // Pengurus
    Route::group(['prefix' => 'pengurus'], function () {

        // Data
        Route::controller(PeriodeController::class)->prefix('periode')->group(function () {
            Route::get('/',  'index')->name('admin.pengurus.periode'); // page
            Route::get('/add',  'add')->name('admin.pengurus.periode.add'); // page
            Route::get('/edit/{model}',  'edit')->name('admin.pengurus.periode.edit'); // page
            Route::get('/active/{model}',  'setActive')->name('admin.pengurus.periode.active');
            Route::post('/member',  'member')->name('admin.pengurus.periode.member'); // member json
            Route::post('/detail/{model}',  'detail')->name('admin.pengurus.periode.detail'); // detail json

            Route::delete('/{model}',  'delete')->name('admin.pengurus.periode.delete');
            Route::post('/insert',  'insert')->name('admin.pengurus.periode.insert');
            Route::post('/update',  'update')->name('admin.pengurus.periode.update');
        });

        // Jabatan
        Route::group(['prefix' => 'jabatan'], function () {
            // suffix
            Route::controller(JabatanController::class)->group(function () {
                Route::get('/get_parent',  'parent')->name('admin.pengurus.jabatan.parent'); // list option element
                Route::get('/select2',  'select2')->name('admin.pengurus.jabatan.select2'); // select2
                Route::post('/update',  'update')->name('admin.pengurus.jabatan.update'); // update

                // base
                Route::get('/{periode_id}',  'index')->name('admin.pengurus.jabatan'); // page
                Route::post('/{periode_id}',  'insert')->name('admin.pengurus.jabatan.insert'); // insert
                Route::delete('/{model}',  'delete')->name('admin.pengurus.jabatan.delete'); // delete
            });
            // Member
            Route::controller(JabatanMemberController::class)->prefix('member')->group(function () {
                Route::get('/select2', 'select2')->name('admin.pengurus.jabatan.member.select2'); // select2
                Route::get('/{id}', 'index')->name('admin.pengurus.jabatan.member'); // page
                Route::post('/update', 'update')->name('admin.pengurus.jabatan.member.update'); // update
            });
        });
    });

    // Galeri
    Route::controller(GaleriController::class)->prefix('galeri')->group(function () {
        Route::get('/',  'index')->name('admin.galeri');
        Route::get('/select2',  'select2')->name('admin.galeri.select2');
        Route::post('/',  'insert')->name('admin.galeri.insert');
        Route::delete('/{model}',  'delete')->name('admin.galeri.delete');
        Route::post('/update',  'update')->name('admin.galeri.update');
    });

    // Sosial media
    Route::controller(SocialMediaController::class)->prefix('social_media')->group(function () {
        Route::get('/',  'index')->name('admin.social_media'); // page
        Route::post('/',  'insert')->name('admin.social_media.insert');
        Route::delete('/{id}',  'delete')->name('admin.social_media.delete');
        Route::post('/update',  'update')->name('admin.social_media.update');
    });

    // contact
    Route::controller(ContactController::class)->prefix('contact')->group(function () {
        Route::get('/', 'index')->name('admin.contact'); // page
        Route::post('/', 'insert')->name('admin.contact.insert');
        Route::delete('/{id}', 'delete')->name('admin.contact.delete');
        Route::post('/update', 'update')->name('admin.contact.update');
    });

    // Footer instagram
    Route::controller(FooterInstagramController::class)->prefix('footer_instagram')->group(function () {
        Route::get('/',  'index')->name('admin.footer_instagram'); // page
        Route::post('/',  'insert')->name('admin.footer_instagram.insert');
        Route::delete('/{model}',  'delete')->name('admin.footer_instagram.delete');
        Route::post('/update',  'update')->name('admin.footer_instagram.update');
    });

    // jenis pendidikan
    Route::controller(PendidikanJenisController::class)->prefix('pendidikan_jenis')->group(function () {
        Route::get('/',  'index')->name('admin.profile.pendidikan_jenis'); // page
        Route::post('/',  'insert')->name('admin.profile.pendidikan_jenis.insert');
        Route::delete('/{id}',  'delete')->name('admin.profile.pendidikan_jenis.delete');
        Route::post('/update',  'update')->name('admin.profile.pendidikan_jenis.update');
    });

    // kontak tipe
    Route::controller(KontakTipeController::class)->prefix('kontak_tipe')->group(function () {
        Route::get('/', 'index')->name('admin.profile.kontak_tipe'); // page
        Route::post('/', 'insert')->name('admin.profile.kontak_tipe.insert');
        Route::delete('/{id}', 'delete')->name('admin.profile.kontak_tipe.delete');
        Route::post('/update', 'update')->name('admin.profile.kontak_tipe.update');
    });

    // kontak tipe
    Route::controller(UsernameValidateController::class)->prefix('username_validation')->group(function () {
        Route::get('/', 'index')->name('admin.username_validation'); // page
        Route::get('/update', 'select2')->name('admin.username_validation.select2');
        Route::post('/save', 'save')->name('admin.username_validation.save');
    });

    // Footer instagram
    Route::prefix('pendaftaran')->group(function () {
        Route::controller(PendaftaranController::class)->group(function () {
            Route::get('/',  'index')->name('admin.pendaftaran'); // page
            Route::get('/get_one/{model}',  'getOne')->name('admin.pendaftaran.get_one'); // page
            Route::post('/',  'insert')->name('admin.pendaftaran.insert');
            Route::delete('/{model}',  'delete')->name('admin.pendaftaran.delete');
            Route::post('/update',  'update')->name('admin.pendaftaran.update');
        });

        Route::controller(SensusControllerAdmin::class)->prefix('sensus')->group(function () {
            Route::get('/',  'index')->name('admin.pendaftaran.sensus'); // page
            Route::get('/excel',  'excel')->name('admin.pendaftaran.sensus.excel'); // export excel
            Route::post('/status',  'status')->name('admin.pendaftaran.sensus.status'); // set status
        });
    });
});
// ====================================================================================================================




// Member Panel Admin =================================================================================================
Route::group(['prefix' => 'member', 'middleware' => ['auth:sanctum', 'verified', 'member']], function () {
    Route::get('/', [MemberDashboardController::class, 'index'])->name('member.dashboard');

    // profile
    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/', 'index')->name('member.profile'); // page
        Route::post('/save_basic', 'save_basic')->name('member.profile.save_basic');
        Route::post('/save_address', 'save_address')->name('member.profile.save_address');
        Route::post('/save_detail', 'save_detail')->name('member.profile.save_detail');

        // other information ==========================================================================================
        // kontak
        Route::get('/kontak', 'kontak')->name('member.profile.kontak');
        Route::post('/kontak_insert', 'kontak_insert')->name('member.profile.kontak_insert');
        Route::post('/kontak_update', 'kontak_update')->name('member.profile.kontak_update');
        Route::delete('/kontak_delete/{model}', 'kontak_delete')->name('member.profile.kontak_delete');

        // hobi
        Route::get('/hobby_select2', 'hobby_select2')->name('member.profile.hobby_select2');
        Route::post('/hobby_save', 'hobby_save')->name('member.profile.hobby_save');

        // profesi
        Route::get('/profesi_select2', 'profesi_select2')->name('member.profile.profesi_select2');

        // pendidikan
        Route::get('/pendidikan', 'pendidikan')->name('member.profile.pendidikan');
        Route::get('/pendidikan_select2', 'pendidikan_select2')->name('member.profile.pendidikan_select2');
        Route::post('/pendidikan_insert', 'pendidikan_insert')->name('member.profile.pendidikan_insert');
        Route::post('/pendidikan_update', 'pendidikan_update')->name('member.profile.pendidikan_update');
        Route::delete('/pendidikan_delete/{model}', 'pendidikan_delete')->name('member.profile.pendidikan_delete');

        // pengalaman_organisasi
        Route::get('/pengalaman_organisasi', 'pengalaman_organisasi')->name('member.profile.pengalaman_organisasi');
        Route::get('/pengalaman_organisasi_select2', 'pengalaman_organisasi_select2')->name('member.profile.pengalaman_organisasi_select2');
        Route::post('/pengalaman_organisasi_insert', 'pengalaman_organisasi_insert')->name('member.profile.pengalaman_organisasi_insert');
        Route::post('/pengalaman_organisasi_update', 'pengalaman_organisasi_update')->name('member.profile.pengalaman_organisasi_update');
        Route::delete('/pengalaman_organisasi_delete/{model}', 'pengalaman_organisasi_delete')->name('member.profile.pengalaman_organisasi_delete');

        // pengalaman_lain
        Route::get('/pengalaman_lain', 'pengalaman_lain')->name('member.profile.pengalaman_lain');
        Route::post('/pengalaman_lain_insert', 'pengalaman_lain_insert')->name('member.profile.pengalaman_lain_insert');
        Route::post('/pengalaman_lain_update', 'pengalaman_lain_update')->name('member.profile.pengalaman_lain_update');
        Route::delete('/pengalaman_lain_delete/{model}', 'pengalaman_lain_delete')->name('member.profile.pengalaman_lain_delete');
    });

    // change password
    Route::controller(UserController::class)->prefix('password')->group(function () {
        Route::get('/',  'change_password')->name('member.password'); // page
        Route::post('/save',  'save_password')->name('member.password.save');
    });
});
// ====================================================================================================================




// Utility ============================================================================================================
Route::controller(LoaderController::class)->prefix('loader')->group(function () {
    Route::prefix('js')->group(function () {
        Route::get('/{file}.js', 'js')->name('load_js');
        Route::get('/{f}/{file}.js', 'js_f')->name('load_js_a');
        Route::get('/{f}/{f_a}/{file}.js', 'js_a')->name('load_js_b');
        Route::get('/{f}/{f_a}/{f_b}/{file}.js', 'js_b')->name('load_js_b');
        Route::get('/{f}/{f_a}/{f_b}/{f_c}/{file}.js', 'js_c')->name('load_js_c');
        Route::get('/{f}/{f_a}/{f_b}/{f_c}/{f_d}/{file}.js', 'js_d')->name('load_js_d');
    });
});
// ====================================================================================================================




// laboartorium =======================================================================================================
Route::controller(LabController::class)->prefix('lab')->group(function () {
    Route::get('/phpspreadsheet', 'phpspreadsheet')->name('lab.phpspreadsheet');
    Route::get('/javascript', 'javascript')->name('lab.javascript');
    Route::get('/jstes', 'jstes')->name('lab.jstes');
});
// ====================================================================================================================




// profile username ===================================================================================================
Route::get('/{model:username}', [MemberController::class, 'member'])->name('anggota.username');
