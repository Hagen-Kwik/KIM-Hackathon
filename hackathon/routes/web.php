<?php

use App\Http\Controllers\podcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LearningController;
use App\Models\AboutUs;
use App\Models\School;


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

Route::resource('beranda', BerandaController::class);
Route::get('/', [BerandaController::class, 'index']);
Route::get('berandasekolah/{id}',  [BerandaController::class, 'show']);


Route::get('/podcast', [PodcastController::class, 'getAll']);


Route::get('/admin-profile', function () {
    return view('admin-profile');
});

Route::get('/admin-berita', [NewsController::class, 'getAll']);
Route::get('/admin-tambah-berita', [NewsController::class, 'dropzoneNews']);
Route::get('/admin-ubah-berita', [NewsController::class, 'dropzoneNews']);
Route::post('dropzone/store-news', [NewsController::class, 'dropzoneStoreNews'])->name('dropzone.storenews');
Route::get('dropzone/delete-news', [NewsController::class, 'dropzoneDeleteNews'])->name('dropzone.deletenews');

Route::patch('/admin-berita', [NewsController::class, 'update']);
Route::post('/admin-berita', [NewsController::class, 'store']);
Route::delete('/admin-berita', [NewsController::class, 'destroy']);
// Route::delete('/admin-berita/{id}', [NewsController::class, 'news_delete']);


Route::get('/admin-beranda', function () {
    return view('admin-beranda');
});
Route::get('/admin-tentang_kami', function () {
    return view('admin-tentang_kami', [
        'aboutus' => AboutUs::all()
    ]);
});
Route::get('/admin-silabus', function () {
    return view('admin-silabus');
});

Route::get('/admin-sekolah', [SchoolController::class, 'index']);
Route::post('/admin-sekolah', [SchoolController::class, 'store']);
Route::patch('/admin-sekolah', [SchoolController::class, 'update']);
Route::delete('/admin-sekolah', [SchoolController::class, 'destroy']);

Route::get('/admin-siswa', [StudentController::class, 'index']);
Route::post('/admin-siswa', [StudentController::class, 'store']);
Route::patch('/admin-siswa', [StudentController::class, 'update']);
Route::delete('/admin-siswa', [StudentController::class, 'destroy']);

Route::get('/admin-podcast', [PodcastController::class, 'podcast']);
Route::post('/admin-podcast_add', [PodcastController::class, 'podcast_add']);
Route::post('/admin-podcast_edit', [PodcastController::class, 'podcast_edit']);
Route::post('/admin-podcast_delete', [PodcastController::class, 'podcast_delete']);

Route::get('/admin-finance', [Controller::class, 'finance']);
Route::post('/admin-finance_add', [Controller::class, 'finance_add']);
Route::post('/admin-finance_edit', [Controller::class, 'finance_edit']);
Route::post('/admin-finance_delete', [Controller::class, 'finance_delete']);

Route::post('/admin-tentang_kami_edit', [Controller::class, 'aboutus_edit']);

Route::get('/admin-quiz', [Controller::class, 'quiz']);
Route::post('/admin-quiz_add', [Controller::class, 'quiz_add']);
// Route::post('/admin-finance_edit', [Controller::class, 'finance_edit']);
Route::post('/admin-quiz_delete', [Controller::class, 'quiz_delete']);

Route::get('/admin-quiz_form', function () {
    return view('admin-quizUpdateAdd');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/donasi', function () {
    return view('donasi');
});

Route::get('/berita-detail', function () {
    return view('berita-detail');
});

Route::get('/masuk', function () {
    return view('auth.login');
});

Route::get('/daftar', function () {
    return view('auth.register', [
        'schools' => School::all()
    ]);
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami', [
        'aboutus' => AboutUs::all()
    ]);
});

Route::get('/silabus', [LearningController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
