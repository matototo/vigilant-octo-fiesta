<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Student routes
Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::post('/create/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/edit/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

// Authentification routes
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

// Forgotten Password Routes
Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');

// These routes require authentification
Route::middleware('auth')->group(function () {
    // User routes
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/registration', [UserController::class, 'create'])->name('user.create');
    Route::post('/registration', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/edit/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/destroy/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    // Article routes
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/edit/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/create/article', [ArticleController::class, 'store'])->name('article.store');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/article-pdf/{article}', [ArticleController::class, 'pdf'])->name('article.pdf');
    // Category routes
    Route::get('/create/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');
});

// Locale
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

