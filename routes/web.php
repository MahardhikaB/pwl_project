<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // Route::get('/', [HomeController::class, 'index']);

    // Route::get('/about', [AboutController::class, 'about']);

    // Route::get('/articles/{id}', [ArticleController::class, 'articles']);

    // Route::get('/home', [PageController::class, 'home']);

    // Route::prefix('product')->group(function () {
    //     Route::get('/list', [PageController::class, 'product']);
    // });

    // Route::get ('/berita/{param}', [PageController::class, 'berita']);

    // Route::prefix('program')->group(function () {
    //     Route::get('/list', [PageController::class, 'program']);
    // });

    // Route::get ('/about', [PageController::class, 'about']);

    // Route::resource('contact', PageController::class);

    // Pertemuan 3
    // Praktikum 1
    // Route::get('/', function () {
    //     return view('pertemuan3.praktikum1.home');
    // });

    // Route::prefix('product')->group(function () {
    //     Route::get('/list', function () {
    //         return view('pertemuan3.praktikum1.product');
    //     });
    // });

    // Route::get ('/news/{param}', function ($param) {
    //     return view('pertemuan3.praktikum1.news', ['param' => $param]);
    // });

    // Route::prefix('program')->group(function () {
    //     Route::get('/list', function () {
    //         return view('pertemuan3.praktikum1.program');
    //     });
    // });

    // Route::get ('/about', function () {
    //     return view('pertemuan3.praktikum1.about');
    // });

    // Route::resource('contact', HomeController::class);


Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    // Praktikum 2
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'profile']);

    Route::get('/kuliah', [KuliahController::class, 'kuliah']);

    // Pertemuan 4
    // Praktikum 
    Route::get('/kendaraan', [KendaraanController::class, 'index']);

    // Tugas
    Route::get('/hobi', [HobiController::class, 'index']);
    Route::get('/keluarga', [KeluargaController::class, 'index']);
    Route::get('/matkul', [MataKuliahController::class, 'index']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Pertemuan 7
    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');

    // Pertemuan 10
    Route::resource('article', ArticleController::class);

    Route::get('/articlepdf', [ArticleController::class, 'cetak_pdf']);
});


