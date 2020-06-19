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

//Route::get('/', function () {
//    return view('welcome');
//});


// vizinhoonline
Route::get('/', function () {
    return view('layouts/main/Home');
});

Route::get('/Feed', function () {
    return view('layouts/main/Feed');
});

Route::get('/CadastroItem', function () {
    return view('layouts/items/CadastroItem');
});

Route::get('/PerfilUsuario', function () {
    return view('layouts/users/PerfilUsuario');
});


Route::get('/PerfilVizinho', function () {
    return view('layouts/users/PerfilVizinho');
});


Route::get('/CadastroUsuario', function () {
    return view('layouts/users/CadastroUsuario');
});


// Provisional Routes for the CRUD operations - Backend

//This will provide CRUD for favorites as example for others entities
Route::get('/favorites', 'FavoritesController@listFavorites')->name('favorites.index');
Route::get('/createFavorite', 'FavoritesController@create')->name('favorites.create');
Route::get('/EditFavorite', 'FavoritesController@edit')->name('favorites.edit');
Route::patch('/detailFavorite/', 'FavoritesController@update')->name('favorites.update');
Route::delete('FavoritesController@destroy')->name('favorites.destroy');

//Detail favorite:
Route::get('/detailFavorite/{id}', 'FavoritesController@detailFavorite');

// Creating route for the update
Route::resource('favorites', 'FavoritesController');

//Section for Users
Route::resource('users', 'UsersController');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/createUser', 'UsersController@create')->name('users.create');
Route::get('/EditUser/{id}', 'UsersController@edit')->name('users.edit');
Route::patch('/detailsUser/{id}', 'UsersController@update')->name('users.update');
Route::delete('/detailsUser/{id}','UsersController@destroy')->name('users.destroy');
Route::get('/detailsUser/{id}', 'UsersController@detailsUser');


Route::get('/feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
Route::get('/createFeedbacks', 'FeedbacksController@create')->name('feedbacks.create');
Route::get('/EditFeedbacks/{id}', 'FeedbacksController@edit')->name('feedbacks.edit');
Route::patch('/detailsFeedbacks/{id}', 'FeedbacksController@update')->name('feedbacks.update');
Route::delete('/detailsFeedbacks/{id}','FeedbacksController@destroy')->name('feedbacks.destroy');
Route::get('/detailsFeedbacks/{id}', 'FeedbacksController@detailsUser');