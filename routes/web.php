<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
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
    Route::name('company.')->group(function () {
        Route::get('/companies', [CompanyController::class, 'index'])->name('list');
        Route::prefix('companies')->group(function () {
            Route::get('/new', [CompanyController::class, 'create_view'])->name('create');
            Route::get('/create', [CompanyController::class, 'create'])->name('custom.create');
            Route::get('/edit/{id}', [CompanyController::class, 'edit_view'])->name('edit');
            Route::post('/custom-edit', [CompanyController::class, 'edit'])->name('custom.edit');
            Route::get('delete/{id}', [CompanyController::class, 'delete'])->name('delete');
        });
    });

    Route::name('user.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('list');
        Route::get('/users/search', [UserController::class, 'search'])->name('search');
        Route::prefix('users')->group(function () {
            Route::get('/new', [UserController::class, 'create_view'])->name('create');
            Route::get('/create', [UserController::class, 'create'])->name('custom.create');
            Route::get('/edit/{id}', [UserController::class, 'edit_view'])->name('edit');;
            Route::post('/custom-edit', [UserController::class, 'edit'])->name('custom.edit');
            Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
        });
    });
    Route::name('categories.')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('list');
        Route::get('/categories/search', [CategoryController::class, 'search'])->name('search');
        Route::prefix('categories')->group(function () {
            Route::get('/new', [CategoryController::class, 'create_view'])->name('create');
            Route::get('/create', [CategoryController::class, 'create'])->name('custom.create');
            Route::get('/edit/{id}', [CategoryController::class, 'edit_view'])->name('edit');;
            Route::post('/custom-edit', [CategoryController::class, 'edit'])->name('custom.edit');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            Route::get('deleteconfirm/{id}', [CategoryController::class, 'deleteconfirm'])->name('deleteconfirm');
        });
    });
});
