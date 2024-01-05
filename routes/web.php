<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/book_insert', [BookController::class, 'insert_books'])->middleware(['auth', 'verified'])->name('book_insert');
Route::post('/book_is_read', [BookController::class, 'book_is_read'])->middleware(['auth', 'verified'])->name('book_is_read');


Route::post('/comment_save', [CommentController::class, 'comment_save'])->middleware(['auth', 'verified'])->name('comment_save');
Route::post('/comment_approve', [CommentController::class, 'approve'])->middleware(['auth', 'verified'])->name('comment_approve');

require __DIR__.'/auth.php';
