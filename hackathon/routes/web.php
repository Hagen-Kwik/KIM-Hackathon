<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\podcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryaPilihanController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\QuizController;
use App\Models\AboutUs;
use App\Models\karya_pilihan;
use App\Models\Learning;
use App\Models\Question;
use App\Models\Quiz;
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

Route::get('/quiz/{id}', [QuizController::class, 'show'])->middleware(['auth', 'quiz']);
Route::post('/quiz', [QuizController::class, 'submit'])->middleware(['auth', 'quiz']);

Route::get('/admin-profile', function () {
    return view('admin-profile');
})->middleware(['auth', 'admin']);

Route::get('/admin-berita', [NewsController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin-tambah-berita', [NewsController::class, 'dropzoneNews'])->middleware(['auth', 'admin']);
Route::get('/admin-ubah-berita/{id}', [NewsController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('dropzone/store-news', [NewsController::class, 'dropzoneStoreNews'])->middleware(['auth', 'admin'])->name('dropzone.storenews');
Route::get('dropzone/delete-news', [NewsController::class, 'dropzoneDeleteNews'])->middleware(['auth', 'admin'])->name('dropzone.deletenews');
Route::post('/store-image', [NewsController::class, 'storeImage'])->middleware(['auth', 'admin'])->name('news-storeImage');

Route::patch('/admin-berita', [NewsController::class, 'update'])->middleware(['auth', 'admin']);
Route::post('/admin-berita', [NewsController::class, 'store'])->middleware(['auth', 'admin']);
Route::delete('/admin-berita', [NewsController::class, 'destroy'])->middleware(['auth', 'admin']);


Route::get('/admin-beranda', function () {
    return view('admin-beranda');
})->middleware(['auth', 'admin']);

Route::get('/admin-tentang-kami', function () {
    return view('admin-tentang-kami', [
        'aboutus' => AboutUs::all()->first()
    ]);
})->middleware(['auth', 'admin']);

Route::get('/admin-silabus', function () {
    return view('admin-silabus', [
        'learning' => Learning::all()->first()
    ]);
})->middleware(['auth', 'admin']);

Route::post('/admin-silabus_edit', [LearningController::class, 'edit'])->middleware(['auth', 'admin']);

Route::get('/admin-sekolah', [SchoolController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/admin-sekolah', [SchoolController::class, 'store'])->middleware(['auth', 'admin']);
Route::patch('/admin-sekolah', [SchoolController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('/admin-sekolah', [SchoolController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/admin-siswa', [StudentController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/admin-siswa', [StudentController::class, 'store'])->middleware(['auth', 'admin']);
Route::patch('/admin-siswa', [StudentController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('/admin-siswa', [StudentController::class, 'destroy'])->middleware(['auth', 'admin']);

Route::get('/admin-podcast', [PodcastController::class, 'podcast'])->middleware(['auth', 'admin']);
Route::post('/admin-podcast_add', [PodcastController::class, 'podcast_add'])->middleware(['auth', 'admin']);
Route::post('/admin-podcast_edit', [PodcastController::class, 'podcast_edit'])->middleware(['auth', 'admin']);
Route::post('/admin-podcast_delete', [PodcastController::class, 'podcast_delete'])->middleware(['auth', 'admin']);

Route::get('/admin-finance', [Controller::class, 'finance'])->middleware(['auth', 'admin']);
Route::post('/admin-finance_add', [Controller::class, 'finance_add'])->middleware(['auth', 'admin']);
Route::post('/admin-finance_edit', [Controller::class, 'finance_edit'])->middleware(['auth', 'admin']);
Route::post('/admin-finance_delete', [Controller::class, 'finance_delete'])->middleware(['auth', 'admin']);

Route::post('/admin-tentang_kami_edit', [Controller::class, 'aboutus_edit'])->middleware(['auth', 'admin']);

Route::get('/admin-quiz', [Controller::class, 'quiz'])->middleware(['auth', 'admin']);
Route::post('/admin-quiz_add', [Controller::class, 'quiz_add'])->middleware(['auth', 'admin']);
Route::post('/admin-quiz_edit', [Controller::class, 'quiz_edit'])->middleware(['auth', 'admin']);
Route::post('/admin-quiz_delete', [Controller::class, 'quiz_delete'])->middleware(['auth', 'admin']);

Route::get('/admin-quiz_formAdd', function () {
    return view('admin-quizAdd');
})->middleware(['auth', 'admin']);

Route::get('/admin-quiz_formUpdate', function () {
    return view('admin-quizUpdate', [
        'quizzes' => Quiz::all()
    ]);
})->middleware(['auth', 'admin']);


Route::get('/admin-question', function () {
    return view('admin-question', [
        'questions' => Question::all()->where('quiz_id', $_GET['quizID'])->all()
    ]);
})->middleware(['auth', 'admin']);

Route::post('/admin-question_add', [Controller::class, 'question_add'])->middleware(['auth', 'admin']);
Route::post('/admin-question_edit', [Controller::class, 'question_edit'])->middleware(['auth', 'admin']);
Route::post('/admin-question_delete', [Controller::class, 'question_delete'])->middleware(['auth', 'admin']);

Route::get('/admin-question_formAdd', function () {
    return view('admin-questionAdd', [
        'quizID' => $_GET['quizID']
    ]);
})->middleware(['auth', 'admin']);

Route::get('/admin-question_formUpdate', function () {
    return view('admin-questionUpdate', [
        'questions' => Question::all()
    ]);
})->middleware(['auth', 'admin']);

Route::get('/berita', function () {
    return view('berita');
});
Route::get('/berita-detail/{id}', [NewsController::class, 'show']);

Route::get('/voting', [KaryaPilihanController::class, 'voting']);
Route::get('/admin-voting', [KaryaPilihanController::class, 'voting_admin'])->middleware(['auth', 'admin']);
Route::post('/admin-voting_add', [KaryaPilihanController::class, 'voting_add'])->middleware(['auth', 'admin']);
Route::post('/admin-voting_edit', [KaryaPilihanController::class, 'voting_edit'])->middleware(['auth', 'admin']);
Route::post('/admin-voting_delete', [KaryaPilihanController::class, 'voting_delete'])->middleware(['auth', 'admin']);
Route::post('/voted', [KaryaPilihanController::class, 'voted']);
Route::post('/admin-vote_reset', [KaryaPilihanController::class, 'reset']);

// Route::get('/voting', function () {
//     return view('voting');
// });

Route::get('/donasi', function () {
    return view('donasi');
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

Route::post('/silabus', [UserModulSuccessController::class, 'store'])->middleware(['auth']);
Route::get('/silabus', [LearningController::class, 'index'])->middleware(['auth']);
Route::post('/admin-silabus_add', [LearningController::class, 'create'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
