<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.mainheader');
});

Route::get('/admin-profile', function () {
    return view('admin-profile');
});
Route::get('/admin-berita', function () {
    return view('admin-berita');
});
Route::get('/admin-beritaEdit', function () {
    return view('admin-beritaUpdateAdd');
});Route::get('/admin-finance', [Controller::class, 'finance']);


Route::post('/admin-berita_edit', [NewsController::class, 'news_edit']);
Route::post('/admin-berita_add', [NewsController::class, 'news_add']);


Route::get('/admin-beranda', function () {
    return view('admin-beranda');
});
Route::get('/admin-tentang_kami', function () {
    return view('admin-tentang_kami');
});
Route::get('/admin-silabus', function () {
    return view('admin-silabus');
});

Route::get('/admin-finance', [Controller::class, 'finance']);
Route::post('/admin-finance_add', [Controller::class, 'finance_add']);
Route::post('/admin-finance_edit', [Controller::class, 'finance_edit']);
Route::post('/admin-finance_delete', [Controller::class, 'finance_delete']);





Route::get('/berita', function () {
    return view('berita');
});

Route::get('/berita-detail', function () {
    return view('berita-detail');
});

Route::get('/masuk', function () {
    return view('auth.login');
});

Route::get('/daftar', function () {
    return view('auth.register');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/silabus', function () {
    return view('silabus');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
