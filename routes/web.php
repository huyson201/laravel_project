<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrainerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::name('user.')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('registerView');
    Route::post('/custom-register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'index'])->name('loginView');
    Route::post('/custom-login', [LoginController::class, 'login'])->name('login');

    Route::get('/sign-out', [LoginController::class, 'sign_out'])->name('sign-out');
});

Route::middleware('check.login')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::name('trainer.')->group(function () {
        Route::get('/trainers', [TrainerController::class, 'index'])->name('list');
        Route::get('/trainers/search', [TrainerController::class, 'search'])->name('search');
        Route::prefix('trainer')->group(function () {
            Route::get('/edit/{id}', [TrainerController::class, 'edit_view'])->name('edit')->where('id', '[0-9]+');
            Route::post('/custom-edit', [TrainerController::class, 'edit'])->name('custom.edit');
            Route::get('/new', [TrainerController::class, 'create_view'])->name('create');
            Route::get('/create', [TrainerController::class, 'create'])->name('custom.create');
            Route::get('delete/{id}', [TrainerController::class, 'delete'])->name('delete')->where('id', '[0-9]+');
        });
    });
});
