<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\{
    DashboardController,
    MateriController,
    QuizController,
    SunnahController,
    SurahController,
};
use App\Http\Controllers\{
    LoginController,
};
use App\Http\Controllers\web\{
    IndexController,
    WebSurahController,
    WebSunnahController,
    WebMateriController,
    QuizWebController,
};



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

Route::get('/run-admin', function () {
    Artisan::call('db:seed', [
        '--class' => 'SuperAdminSeeder'
    ]);

    return "AdminSeeder has been create successfully!";
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dasboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('master-materi', MateriController::class);
    Route::resource('master-quiz', QuizController::class);
    Route::resource('master-sunnah', SunnahController::class);
    Route::get('/surah/fetch', [SurahController::class, 'fetchAndSaveSurah'])->name('admin.surah.fetch');
    Route::resource('master-surah', SurahController::class);
});


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/surah', [WebSurahController::class, 'index'])->name('surah.index');
Route::get('/surah/{nama}', [WebSurahController::class, 'detail'])->name('surah.detail');
Route::get('/sunnah', [WebSunnahController::class, 'index'])->name('sunnah.index');
Route::get('/sunnah/{judul}', [WebSunnahController::class, 'detail'])->name('sunnah.detail');
Route::get('/materi', [WebMateriController::class, 'index'])->name('materi.index');
Route::get('/materi/{judul}', [WebMateriController::class, 'detail'])->name('materi.detail');
Route::get('/quiz', [QuizWebController::class, 'index'])->name('quiz.index');
