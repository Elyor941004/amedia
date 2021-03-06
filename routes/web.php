<?php

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


Auth::routes();
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('users/create');
    });
    Route::resource('users', App\Http\Controllers\UsersController::class)->middleware('is_user');
});
Route::resource('admin', App\Http\Controllers\adminController::class)->middleware('is_admin');

