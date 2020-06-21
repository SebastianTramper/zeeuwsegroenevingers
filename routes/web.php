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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/create', 'PostsControllers@create')->name('create');
Route::post('/create', 'PostsControllers@store')->name('store');

Route::get('/categorie', 'CategoriesController@index')->name('categorie');

Route::get('/categorie/new', 'CategoriesController@create')->name('categorie-create');
Route::post('/categorie', 'CategoriesController@store')->name('categorie-store');


Route::get('/categorie/edit', 'CategoriesController@edit')->name('categorie-edit');
Route::put('/categorie/edit/{categories}', 'CategoriesController@update')->name('categorie-update');
Route::delete('/categorie/delete/{categories}', 'CategoriesController@destroy')->name('categorie-delete');
Route::get('/categorie/{categories}', 'CategoriesController@show')->name('categorie-show');

Route::get('/{categories}', 'CategoriesController@index')->name('categorie');
Route::get('/{seizoen}', 'SeizoenController@index')->name('seizoen');

Route::get('/{categories}/{posts}', 'PostsControllers@show')->name('post');
