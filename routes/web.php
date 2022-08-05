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
