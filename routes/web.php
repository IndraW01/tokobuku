<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\User;
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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Book
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/{book:slug}', [BookController::class, 'detail'])->name('book.show');

// Chart
Route::get('/charts', [ChartController::class, 'index'])->name('chart.index')->middleware('auth');
Route::post('/charts/add', [ChartController::class, 'store'])->name('chart.store')->middleware('auth');


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');

// tes
Route::get('/tesRelasi', function () {
    $user = User::find(1);

    dump($user->books);
});
