<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\MyFirstMiddleware;

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

Route::fallback(function () {
    dd("404");
});

Route::get('/', function () {
    return 'welcome';
});

Route::get('/movies', MoviesController::class);

Route::prefix('users')
    ->middleware(MyFirstMiddleware::class)
    ->name('user.')
    ->controller(UsersController::class)
    ->group( function() {    
        Route::get('/', 'index')->name('index');
        Route::get('/create/', 'create')->name('create');
        Route::post('/create/', 'store')->name('store');
        Route::get('/{user}', 'show')->withTrashed()->missing( function() {
            return redirect()->route('user.index');
        })->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

// Route::resource('/users', UsersController::class)->names([
//     'create' => 'users.create',
//     'store' => 'users.store'
// ]);

