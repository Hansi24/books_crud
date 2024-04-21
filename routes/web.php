<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Book CRUD Routes
Route::resource('books', BookController::class);
Route::resource('categories', BookCategoryController::class);


// User Management Routes
Route::resource('users', 'UserController');

// Book Borrowal/Return Routes
Route::post('/borrow/{book}', 'BookController@borrow')->name('books.borrow');
Route::post('/return/{book}', 'BookController@return')->name('books.return');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');















