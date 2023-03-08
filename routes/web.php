<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\HobiController;
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

// Praktikum 2
// Route::get('/', [DashboardController::class, 'index']);

// Route::get('/profile', [ProfileController::class, 'profile']);

// Route::get('/kuliah', [KuliahController::class, 'kuliah']);

// Pertemuan 4
// Praktikum 
// Route::get('/kendaraan', [KendaraanController::class, 'index']);

// Tugas
Route::get('/hobi', [HobiController::class, 'index']);