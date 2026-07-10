<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\UserController;

// Rota para registrar um empréstimo
Route::post('/books/{book}/borrow', [BorrowingController::class, 'store'])->name('books.borrow');

// Rota para listar o histórico de empréstimos de um usuário
Route::get('/users/{user}/borrowings', [BorrowingController::class, 'userBorrowings'])->name('users.borrowings');

// Rota para registrar a devolução
Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');

Route::get('/books/create-id-number', [BookController::class, 'createWithId'])
    ->middleware('role:admin,bibliotecario')
    ->name('books.create.id');

Route::post('/books/create-id-number', [BookController::class, 'storeWithId'])
    ->middleware('role:admin,bibliotecario')
    ->name('books.store.id');

Route::get('/books/create-select', [BookController::class, 'createWithSelect'])
    ->middleware('role:admin,bibliotecario')
    ->name('books.create.select');

Route::post('/books/create-select', [BookController::class, 'storeWithSelect'])
    ->middleware('role:admin,bibliotecario')
    ->name('books.store.select');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::resource('users', UserController::class)
    ->middleware('role:admin')
    ->except(['create', 'store', 'destroy']);




Route::resource('books', BookController::class)
    ->middleware('role:admin,bibliotecario')
    ->except(['create', 'store']);

Route::resource('authors', AuthorController::class)
    ->middleware('role:admin,bibliotecario');

Route::resource('categories', CategoryController::class)
    ->middleware('role:admin,bibliotecario');

Route::resource('publishers', PublisherController::class)
    ->middleware('role:admin,bibliotecario');

Route::get('/users/debits', [UserController::class, 'debits'])
    ->middleware('role:admin,bibliotecario')
    ->name('users.debits');

Route::patch('/users/{user}/clear-debit', [UserController::class, 'clearDebit'])
    ->middleware('role:admin,bibliotecario')
    ->name('users.clearDebit');

Route::get('/users/debits', [UserController::class, 'debits'])
    ->middleware('role:admin,bibliotecario')
    ->name('users.debits');

Route::patch('/users/{user}/clear-debit', [UserController::class, 'clearDebit'])
    ->middleware('role:admin,bibliotecario')
    ->name('users.clearDebit');