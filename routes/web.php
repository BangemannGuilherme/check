<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetoController;
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

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'auth'])->name('auth');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('registros/{username}', 'RegistersController@index')->name('registros');
});

// Admin Routes
Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\\AdminController@index')->name('admin');

        Route::get('login', 'Admin\\AuthController@index')->name('admin.login');
        Route::post('login', 'Admin\\AuthController@auth')->name('admin.auth');
        Route::get('logout', 'Admin\\AuthController@logout')->name('admin.logout');

        Route::get('users', 'Admin\\UsuarioController@index')->name('usuario');
        Route::get('users/create', 'Admin\\UsuarioController@create')->name('usuario.create');
        Route::post('users/create', 'Admin\\UsuarioController@store')->name('usuario.store');
        Route::get('users/edit/{id}', 'Admin\\UsuarioController@edit')->name('usuario.edit');
        Route::post('users/edit/{id}', 'Admin\\UsuarioController@update')->name('usuario.update');
        Route::get('users/destroy/{id}', 'Admin\\UsuarioController@destroy')->name('usuario.destroy');
    });
});