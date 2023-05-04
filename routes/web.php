<?php


// ====================================================================================================================
// utility ============================================================================================================
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// ====================================================================================================================
// Controller =========================================================================================================
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoaderController;
use App\Http\Controllers\SitemapController;

// ====================================================================================================================
// Frontend ===========================================================================================================
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\GaleriController;
use App\Http\Controllers\Frontend\PendaftaranController;
use App\Http\Controllers\Admin\Pendaftaran\GFormController;

// ====================================================================================================================
// Tentang Kami =======================================================================================================
use App\Http\Controllers\Frontend\About\Kepengurusan\StrukturController;
use App\Http\Controllers\Frontend\About\Kepengurusan\BidangController;
use App\Http\Controllers\Frontend\About\Kepengurusan\PeriodeController;
use App\Http\Controllers\Frontend\About\SejarahController;
use App\Http\Controllers\Frontend\AnggotaController;
use App\Http\Controllers\Frontend\ArtikelController;
use App\Http\Controllers\Frontend\Pendaftaran\SensusController;
use App\Http\Controllers\Frontend\AboutController;

// ====================================================================================================================
// ====================================================================================================================



// auth ===============================================================================================================
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name("login");
    Route::post('/login', 'check_login')->name("login.check_login");
    Route::get('/logout', 'logout')->name("login.logout");
});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/{provider}', 'redirectToProvider');
    Route::get('/auth/{provider}/callback', 'handleProvideCallback');
});
// ====================================================================================================================

// home default =======================================================================================================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name("home");
    Route::get('/periode/{periode:slug}', 'periode')->name("periode");
});

Route::get('/admin', fn () => Redirect::route('dashboard'));
// ====================================================================================================================

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

// Anggota ============================================================================================================
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
Route::controller(GaleriController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
    Route::get('/detail/{model:slug}', 'detail')->name("$name.detail");
});
// ====================================================================================================================

// Pendaftaran ========================================================================================================
$name = 'pendaftaran';
Route::prefix($name)->group(function () use ($name) {
    Route::controller(PendaftaranController::class)->group(function () use ($name) {
        Route::get('/', 'index')->name($name);
    });

    $prefix = 'sensus';
    Route::controller(SensusController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
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

// katalog ============================================================================================================
$prefix = 'katalog';
Route::controller(KatalogController::class)->prefix($prefix)->group(function () use ($prefix) {
    Route::get('/', 'index')->name($prefix);
    Route::get('/{model:slug}', 'detail')->name("$prefix.detail");
});
// ====================================================================================================================

// AboutUs ============================================================================================================
$name = 'about';
Route::controller(AboutController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
});
// ====================================================================================================================

// Marketplace ========================================================================================================
$name = 'marketplace';
Route::controller(MarketplaceController::class)->prefix($name)->group(function () use ($name) {
    Route::get('/', 'index')->name($name);
});
// ====================================================================================================================







// Utility ============================================================================================================
$prefix = 'loader';
Route::controller(LoaderController::class)->prefix($prefix)->group(function () {
    Route::prefix('js')->group(function () {
        Route::any('{path}', 'js')->where('path', '.*');
    });
    Route::prefix('css')->group(function () {
        Route::any('{path}', 'css')->where('path', '.*');
    });
});
// ====================================================================================================================

// laboartorium =======================================================================================================
$prefix = 'lab';
Route::controller(LabController::class)->prefix($prefix)->group(function () {
    Route::get('/phpspreadsheet', 'phpspreadsheet')->name("lab.phpspreadsheet");
    Route::get('/javascript', 'javascript')->name("lab.javascript");
    Route::get('/jstes', 'jstes')->name("lab.jstes");
    Route::get('/count', 'count')->name("lab.count");
    Route::get('/set_profile', 'set_profile')->name("lab.set_profile");
    Route::get('/belumisi', 'belumisi')->name("lab.belumisi");
    Route::get('/ip_detail', 'ip_detail')->name("lab.ip_detail");
});
// ====================================================================================================================

// frontend ===========================================================================================================
Route::get('/frontend', [HomeController::class, 'fronted2'])->name('frontend');

// sitmap =============================================================================================================
Route::get('/sitemap', [SitemapController::class, 'index']);

// Gform
Route::get('/f/{model:slug}', [GFormController::class, 'frontend_detail'])->name("frontend.gform.detail");

// profile username ===================================================================================================
Route::get('/{user:username}', [AnggotaController::class, 'user'])->name("anggota.username");
