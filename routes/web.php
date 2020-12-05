<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class,'login'])->name('admin.login.submit');

    Route::get('questions',[\App\Http\Controllers\AdminController::class,'index'])->middleware('auth:admin')->name('admin.questions');
    Route::post('addQuiz',[\App\Http\Controllers\AdminController::class,'addQuiz'])->middleware('auth:admin')->name('admin.addQuiz');
    Route::get('questions/{quiz}',[\App\Http\Controllers\AdminController::class,'questions'])->middleware('auth:admin')->name('admin.quests');
    Route::get('questions/{quiz}/create',[\App\Http\Controllers\AdminController::class,'addQuestionList'])->middleware('auth:admin')->name('admin.quests');
    Route::post('questions/create/{quiz}',[\App\Http\Controllers\AdminController::class,'addQuestion'])->middleware('auth:admin')->name('admin.quests.store');
});
