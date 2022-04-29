<?php
// utility
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// model
use App\Models\User;

// controller
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;

// Address
use App\Http\Controllers\Admin\Address\ProvinceController;
use App\Http\Controllers\Admin\Address\RegencieController;
use App\Http\Controllers\Admin\Address\DistrictController;
use App\Http\Controllers\Admin\Address\VillageController;

// artikel
use App\Http\Controllers\Admin\Artikel\ArtikelController;
use App\Http\Controllers\Admin\Artikel\KategoriController;
use App\Http\Controllers\Admin\Artikel\TagController;

// pengurus
use App\Http\Controllers\Admin\Pengurus\PeriodeController;
use App\Http\Controllers\Admin\Pengurus\JabatanController;
use App\Http\Controllers\Admin\Pengurus\JabatanMemberController;

// Galeri
use App\Http\Controllers\Admin\GaleriController;

// profile addon
use App\Http\Controllers\Admin\Profile\KontakTipeController;
use App\Http\Controllers\Admin\Profile\PendidikanJenisController;

// social medie
use App\Http\Controllers\Admin\SocialMediaController;

// contact
use App\Http\Controllers\Admin\ContactController;

// Footer Instagram
use App\Http\Controllers\Admin\FooterInstagramController;
use App\Http\Controllers\Admin\UsernameValidateController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoaderController;
use App\Http\Controllers\Member\ProfileController;

// Frontend ===========================================================================================================

// Tentang Kami =======================================================================================================
use App\Http\Controllers\Frontend\About\Kepengurusan\StrukturController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\GaleriController as GaleriControllerFrontend;

// ====================================================================================================================
// ====================================================================================================================




// auth ===============================================================================================================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'check_login'])->name('login.check_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
// ====================================================================================================================




// home default =======================================================================================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/periode/{model:slug}', [HomeController::class, 'periode'])->name('periode');
Route::get('/artikel/{model:slug}', [HomeController::class, 'artikel'])->name('artikel');
// ====================================================================================================================




// Periode Kepengurusan ===============================================================================================
Route::group(['prefix' => 'about'], function () {
    Route::group(['prefix' => 'kepengurusan'], function () {
        Route::group(['prefix' => 'struktur'], function () {
            Route::get('/', [StrukturController::class, 'index'])->name('about.kepengurusan.struktur');
            Route::get('/{model:slug}', [StrukturController::class, 'periode'])->name('about.kepengurusan.struktur.periode');
        });
    });
});
// ====================================================================================================================




// Periode Kepengurusan ===============================================================================================
Route::group(['prefix' => 'anggota'], function () {
    Route::get('/', [MemberController::class, 'index'])->name('anggota');
    Route::get('/{model:id}', [MemberController::class, 'member'])->name('anggota.id');
});
// ====================================================================================================================




// Bidang =============================================================================================================
Route::get('/bidang/{model:slug}', [HomeController::class, 'bidang'])->name('bidang');
// ====================================================================================================================




// Kontak =============================================================================================================
Route::group(['prefix' => 'kontak'], function () {
    Route::get('/', [KontakController::class, 'index'])->name('kontak'); // page
});
// ====================================================================================================================




// Galeri =============================================================================================================
Route::group(['prefix' => 'galeri'], function () {
    Route::get('/', [GaleriControllerFrontend::class, 'index'])->name('galeri'); // page
    Route::get('/detail/{model:slug}', [GaleriControllerFrontend::class, 'detail'])->name('galeri.detail');
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
    Route::get('/', function () {
        return view('admin.dashboard', ['page_attr' => ['title' => 'Dashboard']]);
    })->name('admin.dashboard');

    // user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/update', [UserController::class, 'update'])->name('admin.user.update');
    });

    // address
    Route::group(['prefix' => 'address'], function () {

        // Province
        Route::group(['prefix' => 'province'], function () {
            Route::get('/', [ProvinceController::class, 'index'])->name('admin.address.province');
            Route::get('/select2', [ProvinceController::class, 'select2'])->name('admin.address.province.select2');
            Route::post('/', [ProvinceController::class, 'store'])->name('admin.address.province.store');
            Route::delete('/{id}', [ProvinceController::class, 'delete'])->name('admin.address.province.delete');
            Route::post('/update', [ProvinceController::class, 'update'])->name('admin.address.province.update');
        });

        // Regencie
        Route::group(['prefix' => 'regencie'], function () {
            Route::get('/', [RegencieController::class, 'index'])->name('admin.address.regencie');
            Route::get('/select2', [RegencieController::class, 'select2'])->name('admin.address.regencie.select2');
            Route::post('/', [RegencieController::class, 'store'])->name('admin.address.regencie.store');
            Route::delete('/{id}', [RegencieController::class, 'delete'])->name('admin.address.regencie.delete');
            Route::post('/update', [RegencieController::class, 'update'])->name('admin.address.regencie.update');
        });

        // District
        Route::group(['prefix' => 'district'], function () {
            Route::get('/', [DistrictController::class, 'index'])->name('admin.address.district');
            Route::get('/select2', [DistrictController::class, 'select2'])->name('admin.address.district.select2');
            Route::post('/', [DistrictController::class, 'store'])->name('admin.address.district.store');
            Route::delete('/{id}', [DistrictController::class, 'delete'])->name('admin.address.district.delete');
            Route::post('/update', [DistrictController::class, 'update'])->name('admin.address.district.update');
        });

        // Village
        Route::group(['prefix' => 'village'], function () {
            Route::get('/', [VillageController::class, 'index'])->name('admin.address.village');
            Route::get('/select2', [VillageController::class, 'select2'])->name('admin.address.village.select2');
            Route::post('/', [VillageController::class, 'store'])->name('admin.address.village.store');
            Route::delete('/{id}', [VillageController::class, 'delete'])->name('admin.address.village.delete');
            Route::post('/update', [VillageController::class, 'update'])->name('admin.address.village.update');
        });
    });

    // Artikel
    Route::group(['prefix' => 'artikel'], function () {

        // Data
        Route::group(['prefix' => 'data'], function () {
            Route::get('/', [ArtikelController::class, 'index'])->name('admin.artikel.data'); // page
            Route::get('/add', [ArtikelController::class, 'add'])->name('admin.artikel.data.add'); // page
            Route::get('/edit/{artikel}', [ArtikelController::class, 'edit'])->name('admin.artikel.data.edit'); // page

            Route::delete('/{artikel}', [ArtikelController::class, 'delete'])->name('admin.artikel.data.delete');
            Route::post('/insert', [ArtikelController::class, 'insert'])->name('admin.artikel.data.insert');
            Route::post('/update', [ArtikelController::class, 'update'])->name('admin.artikel.data.update');
        });

        // Kategori
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index'])->name('admin.artikel.kategori');
            Route::get('/select2', [KategoriController::class, 'select2'])->name('admin.artikel.kategori.select2');
            Route::post('/', [KategoriController::class, 'insert'])->name('admin.artikel.kategori.insert');
            Route::delete('/{model}', [KategoriController::class, 'delete'])->name('admin.artikel.kategori.delete');
            Route::post('/update', [KategoriController::class, 'update'])->name('admin.artikel.kategori.update');
        });

        // Tag
        Route::group(['prefix' => 'tag'], function () {
            Route::get('/', [TagController::class, 'index'])->name('admin.artikel.tag');
            Route::get('/select2', [TagController::class, 'select2'])->name('admin.artikel.tag.select2');
            Route::post('/', [TagController::class, 'insert'])->name('admin.artikel.tag.insert');
            Route::delete('/{model}', [TagController::class, 'delete'])->name('admin.artikel.tag.delete');
            Route::post('/update', [TagController::class, 'update'])->name('admin.artikel.tag.update');
        });
    });

    // Pengurus
    Route::group(['prefix' => 'pengurus'], function () {

        // Data
        Route::group(['prefix' => 'periode'], function () {
            Route::get('/', [PeriodeController::class, 'index'])->name('admin.pengurus.periode'); // page
            Route::get('/add', [PeriodeController::class, 'add'])->name('admin.pengurus.periode.add'); // page
            Route::get('/edit/{model}', [PeriodeController::class, 'edit'])->name('admin.pengurus.periode.edit'); // page
            Route::get('/active/{model}', [PeriodeController::class, 'setActive'])->name('admin.pengurus.periode.active');
            Route::post('/member', [PeriodeController::class, 'member'])->name('admin.pengurus.periode.member'); // member json
            Route::post('/detail/{model}', [PeriodeController::class, 'detail'])->name('admin.pengurus.periode.detail'); // detail json

            Route::delete('/{model}', [PeriodeController::class, 'delete'])->name('admin.pengurus.periode.delete');
            Route::post('/insert', [PeriodeController::class, 'insert'])->name('admin.pengurus.periode.insert');
            Route::post('/update', [PeriodeController::class, 'update'])->name('admin.pengurus.periode.update');
        });

        // Jabatan
        Route::group(['prefix' => 'jabatan'], function () {
            // suffix
            Route::get('/get_parent', [JabatanController::class, 'parent'])->name('admin.pengurus.jabatan.parent'); // list option element
            Route::get('/select2', [JabatanController::class, 'select2'])->name('admin.pengurus.jabatan.select2'); // select2
            Route::post('/update', [JabatanController::class, 'update'])->name('admin.pengurus.jabatan.update'); // update

            // base
            Route::get('/{periode_id}', [JabatanController::class, 'index'])->name('admin.pengurus.jabatan'); // page
            Route::post('/{periode_id}', [JabatanController::class, 'insert'])->name('admin.pengurus.jabatan.insert'); // insert
            Route::delete('/{model}', [JabatanController::class, 'delete'])->name('admin.pengurus.jabatan.delete'); // delete

            // Member
            Route::group(['prefix' => 'member'], function () {
                Route::get('/select2', [JabatanMemberController::class, 'select2'])->name('admin.pengurus.jabatan.member.select2'); // select2
                Route::get('/{id}', [JabatanMemberController::class, 'index'])->name('admin.pengurus.jabatan.member'); // page
                Route::post('/update', [JabatanMemberController::class, 'update'])->name('admin.pengurus.jabatan.member.update'); // update
            });
        });
    });

    // Galeri
    Route::group(['prefix' => 'galeri'], function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri');
        Route::get('/select2', [GaleriController::class, 'select2'])->name('admin.galeri.select2');
        Route::post('/', [GaleriController::class, 'insert'])->name('admin.galeri.insert');
        Route::delete('/{model}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        Route::post('/update', [GaleriController::class, 'update'])->name('admin.galeri.update');
    });

    // Sosial media
    Route::group(['prefix' => 'social_media'], function () {
        Route::get('/', [SocialMediaController::class, 'index'])->name('admin.social_media'); // page
        Route::post('/', [SocialMediaController::class, 'insert'])->name('admin.social_media.insert');
        Route::delete('/{id}', [SocialMediaController::class, 'delete'])->name('admin.social_media.delete');
        Route::post('/update', [SocialMediaController::class, 'update'])->name('admin.social_media.update');
    });

    // contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact'); // page
        Route::post('/', [ContactController::class, 'insert'])->name('admin.contact.insert');
        Route::delete('/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
        Route::post('/update', [ContactController::class, 'update'])->name('admin.contact.update');
    });

    // Footer instagram
    Route::group(['prefix' => 'footer_instagram'], function () {
        Route::get('/', [FooterInstagramController::class, 'index'])->name('admin.footer_instagram'); // page
        Route::post('/', [FooterInstagramController::class, 'insert'])->name('admin.footer_instagram.insert');
        Route::delete('/{model}', [FooterInstagramController::class, 'delete'])->name('admin.footer_instagram.delete');
        Route::post('/update', [FooterInstagramController::class, 'update'])->name('admin.footer_instagram.update');
    });

    // jenis pendidikan
    Route::group(['prefix' => 'pendidikan_jenis'], function () {
        Route::get('/', [PendidikanJenisController::class, 'index'])->name('admin.profile.pendidikan_jenis'); // page
        Route::post('/', [PendidikanJenisController::class, 'insert'])->name('admin.profile.pendidikan_jenis.insert');
        Route::delete('/{id}', [PendidikanJenisController::class, 'delete'])->name('admin.profile.pendidikan_jenis.delete');
        Route::post('/update', [PendidikanJenisController::class, 'update'])->name('admin.profile.pendidikan_jenis.update');
    });

    // kontak tipe
    Route::group(['prefix' => 'kontak_tipe'], function () {
        Route::get('/', [KontakTipeController::class, 'index'])->name('admin.profile.kontak_tipe'); // page
        Route::post('/', [KontakTipeController::class, 'insert'])->name('admin.profile.kontak_tipe.insert');
        Route::delete('/{id}', [KontakTipeController::class, 'delete'])->name('admin.profile.kontak_tipe.delete');
        Route::post('/update', [KontakTipeController::class, 'update'])->name('admin.profile.kontak_tipe.update');
    });

    // kontak tipe
    Route::group(['prefix' => 'username_validation'], function () {
        Route::get('/', [UsernameValidateController::class, 'index'])->name('admin.username_validation'); // page
        Route::get('/update', [UsernameValidateController::class, 'select2'])->name('admin.username_validation.select2');
        Route::post('/save', [UsernameValidateController::class, 'save'])->name('admin.username_validation.save');
    });
});
// ====================================================================================================================




// Member Panel Admin =================================================================================================
Route::group(['prefix' => 'member', 'middleware' => ['auth:sanctum', 'verified', 'member']], function () {
    Route::get('/', function () {
        return view('member.dashborard', ['page_attr' => ['title' => 'Dashboard']]);
    })->name('member.dashboard');

    // profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('member.profile'); // page
        Route::post('/save_basic', [ProfileController::class, 'save_basic'])->name('member.profile.save_basic');
        Route::post('/save_address', [ProfileController::class, 'save_address'])->name('member.profile.save_address');
        Route::post('/save_detail', [ProfileController::class, 'save_detail'])->name('member.profile.save_detail');

        // other information ==========================================================================================
        // kontak
        Route::get('/kontak', [ProfileController::class, 'kontak'])->name('member.profile.kontak');
        Route::post('/kontak_insert', [ProfileController::class, 'kontak_insert'])->name('member.profile.kontak_insert');
        Route::post('/kontak_update', [ProfileController::class, 'kontak_update'])->name('member.profile.kontak_update');
        Route::delete('/kontak_delete/{model}', [ProfileController::class, 'kontak_delete'])->name('member.profile.kontak_delete');

        // hobi
        Route::get('/hobby_select2', [ProfileController::class, 'hobby_select2'])->name('member.profile.hobby_select2');
        Route::post('/hobby_save', [ProfileController::class, 'hobby_save'])->name('member.profile.hobby_save');

        // profesi
        Route::get('/profesi_select2', [ProfileController::class, 'profesi_select2'])->name('member.profile.profesi_select2');

        // pendidikan
        Route::get('/pendidikan', [ProfileController::class, 'pendidikan'])->name('member.profile.pendidikan');
        Route::get('/pendidikan_select2', [ProfileController::class, 'pendidikan_select2'])->name('member.profile.pendidikan_select2');
        Route::post('/pendidikan_insert', [ProfileController::class, 'pendidikan_insert'])->name('member.profile.pendidikan_insert');
        Route::post('/pendidikan_update', [ProfileController::class, 'pendidikan_update'])->name('member.profile.pendidikan_update');
        Route::delete('/pendidikan_delete/{model}', [ProfileController::class, 'pendidikan_delete'])->name('member.profile.pendidikan_delete');

        // pengalaman_organisasi
        Route::get('/pengalaman_organisasi', [ProfileController::class, 'pengalaman_organisasi'])->name('member.profile.pengalaman_organisasi');
        Route::get('/pengalaman_organisasi_select2', [ProfileController::class, 'pengalaman_organisasi_select2'])->name('member.profile.pengalaman_organisasi_select2');
        Route::post('/pengalaman_organisasi_insert', [ProfileController::class, 'pengalaman_organisasi_insert'])->name('member.profile.pengalaman_organisasi_insert');
        Route::post('/pengalaman_organisasi_update', [ProfileController::class, 'pengalaman_organisasi_update'])->name('member.profile.pengalaman_organisasi_update');
        Route::delete('/pengalaman_organisasi_delete/{model}', [ProfileController::class, 'pengalaman_organisasi_delete'])->name('member.profile.pengalaman_organisasi_delete');

        // pengalaman_lain
        Route::get('/pengalaman_lain', [ProfileController::class, 'pengalaman_lain'])->name('member.profile.pengalaman_lain');
        Route::post('/pengalaman_lain_insert', [ProfileController::class, 'pengalaman_lain_insert'])->name('member.profile.pengalaman_lain_insert');
        Route::post('/pengalaman_lain_update', [ProfileController::class, 'pengalaman_lain_update'])->name('member.profile.pengalaman_lain_update');
        Route::delete('/pengalaman_lain_delete/{model}', [ProfileController::class, 'pengalaman_lain_delete'])->name('member.profile.pengalaman_lain_delete');
    });

    // change password
    Route::group(['prefix' => 'password'], function () {
        Route::get('/', [UserController::class, 'change_password'])->name('member.password'); // page
        Route::post('/save', [UserController::class, 'save_password'])->name('member.password.save');
    });
});
// ====================================================================================================================




// Utility ============================================================================================================
Route::group(['prefix' => 'loader'], function () {
    Route::get('/js/{file}', [LoaderController::class, 'javascript'])->name('lab.phpspreadsheet');
});
// ====================================================================================================================




// laboartorium =======================================================================================================
Route::group(['prefix' => 'lab'], function () {
    Route::get('/phpspreadsheet', [LabController::class, 'phpspreadsheet'])->name('lab.phpspreadsheet');
    Route::get('/javascript', [LabController::class, 'javascript'])->name('lab.javascript');
    Route::get('/jstes', [LabController::class, 'jstes'])->name('lab.jstes');
});
// ====================================================================================================================




// profile username ===================================================================================================
Route::get('/{model:username}', [MemberController::class, 'member'])->name('anggota.username');
