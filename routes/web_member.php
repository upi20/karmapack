<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\ProfileController;

$name = 'member';
Route::get('/dashboard', [DashboardController::class, 'index'])->name("$name.dashboard")->middleware("permission:$name.dashboard");

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