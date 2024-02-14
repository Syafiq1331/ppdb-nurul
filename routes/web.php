<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ExamController;
use App\Http\Controllers\admin\JawabanController;
use App\Http\Controllers\admin\JenjangController;
use App\Http\Controllers\admin\KategoriPertanyaanController;
use App\Http\Controllers\admin\KelebihanPondokController;
use App\Http\Controllers\admin\PDFController;
use App\Http\Controllers\admin\PemberitahuanSiswaController;
use App\Http\Controllers\admin\PertanyaanController;
use App\Http\Controllers\admin\SantriController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\master\DashboardController;
use App\Http\Controllers\admin\ProfileGuruController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\user\AdministrasiController;
use App\Http\Controllers\user\ProfileSantriController;
use App\Http\Controllers\user\ProfileWaliSantriController;
use App\Http\Controllers\admin\VisiMisiController;
use App\Http\Controllers\user\ExamUserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::fallback(function () {
    return view('ErrorPage');
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('home')->middleware('auth');
// Admin Zone
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('jenjang', JenjangController::class);
    // Route::resource('user', UserController::class);
    Route::get('list-santri', [SantriController::class, 'index']);
    Route::get('list-santri/generate-report', [SantriController::class, 'generatePDF']);
    Route::resource('administrasi', AdministrasiController::class);
    Route::resource('visi-misi', VisiMisiController::class);
    Route::resource('list-guru', ProfileGuruController::class);
    Route::resource('kategori-pertanyaan', KategoriPertanyaanController::class);
    Route::resource('pertanyaan', PertanyaanController::class);
    Route::resource('jawaban', JawabanController::class);
    Route::put('pemberitahuan/{id}/ubahStatus', [PemberitahuanSiswaController::class, 'updateStatus'])->name('pemberitahuan.updateStatus');
    Route::resource('pemberitahuan', PemberitahuanSiswaController::class);
    Route::resource('kelebihan-yayasan', KelebihanPondokController::class);
    Route::resource('contact', ContactController::class);
});

Route::get('/show-result/{resultId}', [ExamUserController::class, 'showResult'])->name('show-result');

Route::fallback(function () {
    return view('testing');
});


// Route untuk menampilkan daftar ujian
Route::get('/exams', [ExamController::class, 'index']);

// Route untuk menampilkan detail ujian beserta pertanyaan dan jawabannya
Route::get('/exams/{id}', [ExamController::class, 'show'])->name('exams.show');

// Route untuk menampilkan form tambah pertanyaan dan jawaban
Route::get('/questions/create', [QuestionController::class, 'create']);

// Route untuk menyimpan pertanyaan dan jawaban baru
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

// Guest Zone
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::resource('profile-santri', ProfileSantriController::class);
    Route::get('/pembayaran', [SantriController::class, 'pembayaranIndex']);
    Route::post('/pembayaran', [SantriController::class, 'pembayaranProses']);
    Route::resource('profile-wali-santri', ProfileWaliSantriController::class);
    Route::resource('administrasi', AdministrasiController::class);
    Route::get('/exams', [ExamController::class, 'index']);
    Route::get('/exams/{exam}/start', [ExamUserController::class, 'startExam'])->name('exams.start');
    Route::post('/exams/{exam}/submit', [ExamUserController::class, 'submitExam'])->name('exams.submit');
    Route::get('/exams/result/{result}', [ExamUserController::class, 'showResult'])->name('exams.result');
});
