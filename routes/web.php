<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternauteController;
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
|EXEMPLE
    Route::get('/', function () {
        return view('welcome');
    });
|
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::prefix('/dbadmin')->name('admin.')->group(static function () {
        Route::get('/', [AdminController::class, 'stat'])->name('stat');
        Route::post('/version/{version?}', [AdminController::class, 'version'])->name('version');
        Route::post('/cinema/{cinema?}', [AdminController::class, 'cinema'])->name('cinema');
        Route::post('/genre/{genre?}', [AdminController::class, 'genre'])->name('genre');
        Route::post('/theme/{theme?}', [AdminController::class, 'theme'])->name('theme');
        Route::post('/recompense/{recompense?}', [AdminController::class, 'recompense'])->name('recompense');
        Route::post('/lieu/{lieu?}', [AdminController::class, 'lieu'])->name('lieu');
        Route::post('/evenement/{evenement?}', [AdminController::class, 'evenement'])->name('evenement');
        Route::post('/acteur/{acteur?}', [AdminController::class, 'acteur'])->name('acteur');
        Route::post('/producteur/{producteur?}', [AdminController::class, 'producteur'])->name('producteur');
        Route::post('/realisateur/{realisateur?}', [AdminController::class, 'realisateur'])->name('realisateur');
        Route::post('/film/{film?}', [AdminController::class, 'film'])->name('film');
        Route::post('/jouer/{jouer?}', [AdminController::class, 'jouer'])->name('jouer');
        Route::post('/seance/{seance?}', [AdminController::class, 'seance'])->name('seance');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
    Route::prefix('/internaute')->name('internaute.')->group(static function () {
//        Route::get('/', [InternauteController::class, 'internauteboard'])->name('internauteboard');
        Route::get('/evenement/{evenement?}', [InternauteController::class, 'evenement'])->name('evenement');
        Route::get('/film/{film?}', [InternauteController::class, 'film'])->name('film');
        Route::get('/internauteboard', [InternauteController::class, 'internauteboard'])->name('internauteboard');
        Route::get('/text', [InternauteController::class, 'index'])->name('index');
//        Route::get('/', [InternauteController::class, 'edit'])->name('edit');
        Route::post('/filmvus', [InternauteController::class, 'ajoutFilmVue'])->name('filmvus');
        Route::post('/filmavoir', [InternauteController::class, 'ajoutFilmaVoir'])->name('filmavoir');
        Route::post('update', [InternauteController::class, 'update'])->name('update');
        Route::post('/ajoutcritique/{ajoutcritique?}', [InternauteController::class, 'ajoutcritique'])->name('ajoutcritique');
    });
});

Route::middleware(['web'])->group(function () {
    Route::prefix('auth')->name('auth.')->group(static function () {
        Route::prefix('register/')->name('register.')->group(static function () {
            Route::get('/', [RegisterController::class, 'index'])->name('index');
            Route::post('register/', [RegisterController::class, 'register'])->name('register');
        });
        Route::prefix('/login')->name('login.')->group(static function () {
            Route::get('/', [LoginController::class, 'index'])->name('index');
            Route::post('login/', [LoginController::class, 'login'])->name('login');
        });

    });

    Route::prefix('')->name('')->group(static function () {
        Route::get('', [HomeController::class, 'index'])->name('index');
        Route::get('/unfilm', [HomeController::class, 'unfilm'])->name('unfilm');
        Route::get('/evenement', [HomeController::class, 'evenement'])->name('evenement');
        Route::get('/text', [HomeController::class, 'index'])->name('index');

    });

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('logout/', [LoginController::class, 'logout'])->name('logout');
});






