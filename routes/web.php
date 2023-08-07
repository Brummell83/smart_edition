<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\HomeController;
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

Route::prefix('admin')->name('admin.')->controller(BookController::class)->group(function(){
    Route::resource('book',BookController::class)->except('show');
    Route::resource('author',AuthorController::class)->except('show');
    Route::resource('category',CategoryController::class)->except('show');
    Route::resource('genre',GenreController::class)->except('show');
});
Route::prefix('smart-edition')->name('home.')->controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('livres/{slug}/{book}','show')
            ->name('show');
    Route::get('catalogue','catalog')->name('catalog');
});

