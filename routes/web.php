<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmscController;

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return "<h1>ยินดีต้อนรับเข้าสู่เว็บไซต์</h1>";
});

Route::get('/about', function () {
    return "เกี่ยวกับเรา";
});

Route::get('/blog/{name}', function ($name) {
    return "บทความ {$name}";
});*/


Route::get('/', function () {
    return redirect()->route('login.form'); // root -> login
});

Route::get('/dashboard', function () {
    return view('dashboard'); // เรียก resources/views/dashboard.blade.php
})->middleware('auth'); // เพิ่ม middleware 'auth' เพื่อป้องกันการเข้าถึงโดยไม่ได้ล็อกอิน

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', fn() => redirect()->route('umsc.create'));

Route::get('/umsc/create', [UmscController::class, 'create'])->name('umsc.create');
Route::post('/umsc/store', [UmscController::class, 'store'])->name('umsc.store');




