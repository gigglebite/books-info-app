<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksInfoController;

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
Route::get('/booksinfo', [BooksInfoController::class, 'index']);
Route::get('/edit-book/{id}', [BooksInfoController::class, 'showEditForm']);
Route::post('/save-edit-book', [BooksInfoController::class, 'saveBookInfoChanges']);
Route::get('/add-book-form', [BooksInfoController::class, 'showNewForm']);
Route::post('/save-new-book', [BooksInfoController::class, 'saveNewBook']);
Route::get('/delete-book/{id}',[BooksInfoController::class, 'deleteBook']);
