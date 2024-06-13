<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About'], ['name' => 'Yanuar AlHisyami']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Kontak']);
});

Route::get('/sewa', function () {
    return view('sewa', ['title' => 'Sewa']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/mobil', [CarController::class, 'index'])->name('admin.mobil');
});

