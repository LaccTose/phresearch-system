<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmscController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login.form'); // root -> login
});

Route::get('/dashboard', function () {
    return view('dashboard'); // เรียก resources/views/dashboard.blade.php
})->middleware('auth'); // เพิ่ม middleware 'auth' เพื่อป้องกันการเข้าถึงโดยไม่ได้ล็อกอิน

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', fn() => redirect()->route('umsc.create'));

//Route::get('/umsc/create', [UmscController::class, 'create'])->name('umsc.create');
//Route::post('/umsc/store', [UmscController::class, 'store'])->name('umsc.store');

Route::get('/users', [UserController::class, 'index']);
Route::resource('items', ItemController::class);


Route::resource('umsc', UmscController::class);
//Route::get('/umsc', [UmscController::class, 'index'])->name('umsc.index');


// routes/web.php
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');





