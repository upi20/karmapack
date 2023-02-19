<?php

// ====================================================================================================================

use App\Http\Controllers\Admin\Pendaftaran\GFormController;
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
use App\Http\Controllers\Frontend\About\Kepengurusan\PeriodeController;
use App\Http\Controllers\Frontend\About\SejarahController;
use App\Http\Controllers\Frontend\AnggotaController;
use App\Http\Controllers\Frontend\ArtikelController;
use App\Http\Controllers\Frontend\Pendaftaran\SensusController as SensusControllerFrontend;
use App\Models\Pendaftaran\GForm;

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
});

// artikel ============================================================================================================
$prefix = 'artikel';
Route::controller(ArtikelController::class)->prefix($prefix)->group(function () use ($prefix) {
    Route::get('/', 'index')->name($prefix);
    Route::get('/{model:slug}', 'detail')->name("$prefix.detail");
});
// ====================================================================================================================




// Periode Kepengurusan ===============================================================================================
$name = 'tentang';
Route::group(['prefix' => $name], function () use ($name) {
    $prefix = 'kepengurusan';
    Route::group(['prefix' => $prefix], function () use ($name, $prefix) {
        $name = "$name.$prefix"; // tentang.kepengurusan

        // struktur
        $prefix = 'struktur';
        Route::controller(StrukturController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // tentang.kepengurusan.struktur
            Route::get('/', 'index')->name($name);
            Route::get('/{periode:slug}', 'periode')->name("$name.periode");
        });

        // periode
        $prefix = 'periode';
        Route::controller(PeriodeController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
            $name = "$name.$prefix"; // tentang.kepengurusan.periode
            Route::get('/', 'index')->name($name);
        });

        // bidang
        Route::get('/bidang/{jabatan:slug}', [BidangController::class, 'index'])->name("$name.bidang");
    });

    // sejarah
    Route::get('/sejarah', [SejarahController::class, 'index'])->name("$name.sejarah");
});
// ====================================================================================================================




// Anggota =============================================================================================================
$name = 'anggota';
Route::controller(AnggotaController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
    Route::get('/{anggota:id}', 'anggota')->name("$name.id");
});
// ====================================================================================================================




// Kontak =============================================================================================================
$name = 'kontak';
Route::controller(KontakController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
    Route::post('/send', 'insert')->name("$name.send");
    Route::get('/faq', 'faq')->name("$name.faq");
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
    if (!auth()->user()) return Redirect::route('login');
    if (auth_has_role(config('app.super_admin_role'))) {
        return Redirect::route('admin.dashboard');
    } else {
        return Redirect::route('member.dashboard');
    }
})->name("dashboard");
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
    Route::get('/migrate', 'migrate');
    Route::get('/phpspreadsheet', 'phpspreadsheet')->name("lab.phpspreadsheet");
    Route::get('/javascript', 'javascript')->name("lab.javascript");
    Route::get('/jstes', 'jstes')->name("lab.jstes");
});
// ====================================================================================================================


// frontend2 ==========================================================================================================
Route::get('/frontend2', [HomeController::class, 'fronted2'])->name('frontend2');


// profile username ===================================================================================================
Route::get('/{user:username}', [AnggotaController::class, 'user'])->name("anggota.username");

// Gform
Route::get('/f/{model:slug}', [GFormController::class, 'frontend_detail'])->name("frontend.gform.detail");
