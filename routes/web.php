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

//Get  object(s)
Route::get('/favorites', 'FavoritesController@listFavorites')->name('favorites.index');

//Detail favorite:
Route::get('/detailFavorite/{id}', 'FavoritesController@show')->name('favorites.show');

//Create
Route::get('/createFavorite', 'FavoritesController@create')->name('favorites.create');

//Update
Route::get('/EditFavorite', 'FavoritesController@edit')->name('favorites.edit');

Route::patch('/detailFavorite', 'FavoritesController@update')->name('favorites.update');

Route::delete('FavoritesController@destroy')->name('favorites.destroy');


// Creating route for the update
Route::resource('favorites', 'FavoritesController');
Route::resource('users', 'UsersController');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/createUser', 'UsersController@create')->name('users.create');
Route::get('/EditUser/{id}', 'UsersController@edit')->name('users.edit');
Route::patch('/detailsUser/{id}', 'UsersController@update')->name('users.update');
Route::delete('/detailsUser/{id}','UsersController@destroy')->name('users.destroy');
Route::get('/detailsUser/{id}', 'UsersController@detailsUser')->name('users.view');

//Section for Feedbacks
Route::resource('feedbacks', 'FeedbacksController');


Route::get('/feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
Route::get('/feedbacks/create', 'FeedbacksController@create')->name('feedbacks.create');
Route::get('/feedbacks/{id}', 'FeedbacksController@edit')->name('feedbacks.edit');
Route::patch('/feedbacks/{id}', 'FeedbacksController@update')->name('feedbacks.update');
Route::delete('/feedbacks/{id}','FeedbacksController@destroy')->name('feedbacks.destroy');
Route::get('/feedbacks/{id}', 'FeedbacksController@show')->name('feedbacks.show');
Route::post('/feedbacks', 'FeedbacksController@store')->name('feedbacks.store');

//Categories
Route::resource('categories', 'CategoriesController');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'CategoriesController@update')->name('categories.update');
Route::delete('/categories/{id}', 'CategoriesController@destroy')->name('categories.destroy');

//imagem upload
Route::get('/image', 'UploadController@index')->name('image.upload.profile');
Route::post('/image', 'UploadController@imageUploadProfile')->name('image.upload.profile');

//image upload2
//Route::get('principal', function(){
  //  return view ('layouts/cruds/images/principal');
//});

Route:: get('principal', 'imagemControler@index')->name('principal');

Route::get('detalhe/{id}','imagemControler@show')->name('show');

Route::get('cadastro-imagem', 'imagemControler@create')->name('create');
Route::post('cadastro-imagem', 'imagemControler@store')->name('store');

Route::get('editar-imagem/{id}', 'imagemControler@edit')->name('edit');
Route::post('editar-imagem/{id})','imagemControler@update')->name('update');





