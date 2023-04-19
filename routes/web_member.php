<?php

use App\Http\Controllers\Admin\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\KataAlumniController;
use App\Http\Controllers\Member\ProfileController;

$name = 'member';
Route::get('/dashboard', [DashboardController::class, 'index'])->name("$name.dashboard")->middleware("permission:$name.dashboard");

$prefix = 'profile';
Route::controller(ProfileController::class)->prefix($prefix)->middleware("permission:$name.$prefix")->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // member.profile
    Route::get('/', 'index')->name($name);
    Route::post('/save_basic', 'save_basic')->name("$name.save_basic");
    Route::post('/save_address', 'save_address')->name("$name.save_address");
    Route::post('/save_detail', 'save_detail')->name("$name.save_detail");

    // other information ==========================================================================================
    $n = 'kontak';
    $name_c = "$name.$n"; // member.profile.kontak
    Route::get("/{$n}", "{$n}")->name($name_c);
    Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert");
    Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update");
    Route::delete("/{$n}_delete/{kontak}", "{$n}_delete")->name("{$name_c}_delete");

    $n = 'hobi';
    $name_c = "$name.$n"; // member.profile.hobi
    Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2");
    Route::post("/{$n}_save", "{$n}_save")->name("{$name_c}_save");

    $n = 'profesi';
    $name_c = "$name.$n"; // member.profile.profesi
    Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2");

    $n = 'pendidikan';
    $name_c = "$name.$n"; // member.profile.pendidikan
    Route::get("/{$n}", "{$n}")->name($name_c);
    Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2");
    Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert");
    Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update");
    Route::delete("/{$n}_delete/{pendidikan}", "{$n}_delete")->name("{$name_c}_delete");

    $n = 'pengalaman_organisasi';
    $name_c = "$name.$n"; // member.profile.pengalaman_organisasi
    Route::get("/{$n}", "{$n}")->name($name_c);
    Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2");
    Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert");
    Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update");
    Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete");

    $n = 'pengalaman_lain';
    $name_c = "$name.$n"; // member.profile.pengalaman_lain
    Route::get("/{$n}", "{$n}")->name($name_c);
    Route::get("/{$n}_select2", "{$n}_select2")->name("{$name_c}_select2");
    Route::post("/{$n}_insert", "{$n}_insert")->name("{$name_c}_insert");
    Route::post("/{$n}_update", "{$n}_update")->name("{$name_c}_update");
    Route::delete("/{$n}_delete/{model}", "{$n}_delete")->name("{$name_c}_delete");

    $n = 'google';
    $name_c = "$name.$n"; // member.profile.google
    Route::delete("/{$n}_delete/{account}", "{$n}_delete")->name("{$name_c}_delete");
});

$prefix = "password";
Route::controller(AnggotaController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // member.password
    Route::get('/', 'change_password')->name($name)->middleware("permission:$name");
    Route::post('/save', 'save_password')->name("$name.save")->middleware("permission:$name.save");
});

$prefix = 'kata_alumni';
Route::controller(KataAlumniController::class)->prefix($prefix)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // member.kata_alumni
    Route::get('/', 'index')->name($name)->middleware("permission:$name");
    Route::post('/save', 'save')->name("$name.save")->middleware("permission:$name");
    Route::post('/reset', 'reset')->name("$name.reset")->middleware("permission:$name");
});
