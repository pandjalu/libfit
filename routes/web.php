<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'AuthController@index');
Route::post('/', 'AuthController@login');
Route::get('/logout', "AuthController@logout");

Route::prefix('admin')->middleware("role:admin")->name('admin.')->group(function() {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    Route::prefix('book')->name('book.')->group(function () {
        Route::get('/', "Admin\BookController@index")->name('index');
        Route::get('/create', "Admin\BookController@create")->name('create');
        Route::get('/{id}', "Admin\BookController@show")->name('show');
        Route::post('/store', "Admin\BookController@store");
        Route::get('/edit/{id}', "Admin\BookController@edit")->name('edit');
        Route::patch('/update/{id}', "Admin\BookController@update");
        Route::get('/delete/{id}', "Admin\BookController@destroy");
    });

    Route::prefix('member')->name('member.')->group(function() {
        Route::get('/', "Admin\MemberController@index")->name('index');
        Route::get('/create', "Admin\MemberController@create")->name('create');
        Route::post('/store', "Admin\MemberController@store");
        Route::get('/edit/{id}', "Admin\MemberController@edit")->name('edit');
        Route::patch('/update/{id}', "Admin\MemberController@update");
        Route::get('/delete/{id}', "Admin\MemberController@destroy");
    });

    Route::prefix('category')->name('category.')->group(function() {
        Route::get('/', "Admin\CategoryController@index")->name('index');
        Route::get('/create', "Admin\CategoryController@create")->name('create');
        Route::post('/store', "Admin\CategoryController@store");
        Route::get('/edit/{id}', "Admin\CategoryController@edit")->name('edit');
        Route::patch('/update/{id}', "Admin\CategoryController@update");
        Route::get('/delete/{id}', "Admin\CategoryController@destroy");
    });

    Route::prefix('borrowing')->name('borrowing.')->group(function() {
        Route::get('/', "Admin\BorrowingController@index")->name('index');
        Route::get('/{id}', "Admin\BorrowingController@returnBack")->name('return');
    });
});

Route::prefix('user')->middleware("role:user")->name('user.')->group(function () {
    Route::get('/', function() {
        return view('layouts/adminlte/page-blank');
    })->name('dashboard');
    Route::prefix('book')->name('book.')->group(function () {
        Route::get('/', "BookController@index")->name('index');
        Route::get('/{id}', "BookController@show")->name('show');
        ROute::get('/borrow/{id}', "BookController@borrow")->name('borrow');
    });

    Route::prefix('borrowing')->name('borrowing.')->group(function() {
        Route::get('/', "BorrowingController@index")->name('index');
        Route::get('/{id}', "BorrowingController@returnBack")->name('return');
    });
});