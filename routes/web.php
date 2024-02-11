<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;


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


Route::controller(ArticleController::class)->group(function () {

    Route::get('articles','index')->name('articles.index');
    Route::get('articles/data','getData')->name('articles.data');
    Route::get('articles/create','create')->name('articles.create');
    Route::post('articles','store')->name('articles.store');
    Route::get('articles/{id}/edit','edit')->name('articles.edit');
    Route::put('articles/{id}','update')->name('articles.update');
    Route::delete('articles/{id}','destroy')->name('articles.destroy');      
        

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
