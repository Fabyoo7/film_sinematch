<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route utama yang dapat diakses oleh semua user
Route::get('/', [FrontController::class, 'index'])->name('home');


// Prefix untuk halaman yang memerlukan autentikasi dan peran 'user'
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('home', [FrontController::class, 'index'])->name('user.home');
    Route::get('/profile', [FrontController::class, 'profile'])->name('user.profile');
    Route::get('/about', [FrontController::class, 'about'])->name('user.about');
    Route::get('/catalog', [FrontController::class, 'catalog'])->name('user.catalog');
    Route::post('/detail/{id}/review', [FrontController::class, 'storeReview'])->name('review.store');
    Route::get('/detail/{id}', [FrontController::class, 'show'])->name('detail.show');
});

Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/catalog', [FrontController::class, 'catalog'])->name('catalog');
Route::get('/detail/{id}', [FrontController::class, 'show'])->name('detail.show');




// Hanya untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');    
});


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('kategori', KategoriController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('film', FilmController::class);
    Route::resource('review', ReviewController::class);

});


