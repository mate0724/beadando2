<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/', function(){
//     return view('index');
// });

// Route::get('/books', function(){
//     return view('books');
// });

// Route::get('/login', function(){
//     return view('login');
// });

// Route::get('/rentBook', function(){
//     return view('rentBook');
// });

// Route::get('/rentedBook', function(){
//     return view('rentedBook');
// });


Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::resource('books', BookController::class);

Route::delete('/books/{book}/copy', [BookController::class, 'destroyCopy'])->name('books.destroyCopy');

Route::resource('members', MemberController::class);

