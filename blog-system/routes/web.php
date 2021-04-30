<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', function () {
    return view('welcome');
}) -> name('home');

Auth::routes();

// Admin Route

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']) -> name('dashboard');
    Route::resource('tag', App\Http\Controllers\Admin\TagController::class);
});

// Author Route

Route::group(['as'=>'author.','prefix'=>'author','middleware'=>['auth','author']], function(){
    Route::get('dashboard', [App\Http\Controllers\Author\DashboardController::class, 'index']) -> name('dashboard');
});
