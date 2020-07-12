<?php

use App\Http\Controllers\ItemsController;
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


// VIZINHONLINE MAIN ROUTES

Route::get('/', 'PagesController@home')->name('home');
Route::get('/CadastroItem', 'PagesController@cadastroItem');
Route::get('/PerfilUsuario', 'PagesController@perfilUsuario')->name('perfilUsuario');
Route::get('/PerfilVizinho', 'PagesController@perfilVizinho');
Route::get('/CadastroUsuario', 'PagesController@cadastroUsuario');

//Posts
Route::get('/PostsUsuario/{id}', 'PagesController@postsUsuario')->name('posts');
Route::delete('/PostsUsuario/{id}','PostsController@destroy')->name('postsUser.destroy');



//Favorites
Route::get('/FavoritosUsuario/{id}', 'PagesController@favoritesUsuario')->name('favorites');
Route::delete('/FavoritosUsuario/{id}', 'FavoriteUserController@destroyPost')->name('favorites');


// Resources that user favorites
Route::post('/FavoritesUsuario/{id}', 'FavoriteUserController@response')->name('favoritesUser.create');
Route::get('/CreatePostFavorite/{id?}','FavoriteUserController@createPost')->name('favoriteUser.createPost');
Route::post('/CreatePostFavorite','FavoriteUserController@storePost')->name('favoriteUser.storePost');

Route::get('/EditPostFavorite/{id}','FavoriteUserController@editPost')->name('favoriteUser.editPost');
Route::patch('/EditPostFavorite/{id}','FavoriteUserController@udpatePost')->name('favoriteUser.updatePost');
//Route::delete('/FavoritosUsuario/{id}','FavoritesUserController@destroyPost')->name('favoritesUser.destroy'); //TODO Working on this

//
Route::delete('/post/{id}', 'PostsController@destroy')->name('posts.destroy');


//User
Route::post('/CadastroUsuario', 'UsersController@new')->name('users.new');
Route::get('/EditarUsuario/{id}', 'UsersController@profile')->name('users.profile');
Route::post('/EditarUsuario/{id}', 'UsersController@register')->name('users.register');

//User-Post-Response
Route::post('/PostsUsuario/{id}', 'UsersResponsesController@response')->name('PostResponse.create');



//  SECTION RESOURCES
Route::resource('favorites', 'FavoritesController');

Route::get('/favorites', 'FavoritesController@index')->name('favorites.index');
Route::get('/detailFavorite/{id}', 'FavoritesController@show')->name('favorites.show');
//Create
Route::get('/createFavorite', 'FavoritesController@create')->name('favorites.create');
Route::get('/EditFavorite/{id}', 'FavoritesController@edit')->name('favorites.edit');

Route::patch('/detailFavorite', 'FavoritesController@update')->name('favorites.update');
Route::delete('FavoritesController@destroy')->name('favorites.destroy');






// Section for User
Route::resource('users', 'UsersController');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/createUser', 'UsersController@create')->name('users.create');
Route::get('/detailsUser/{id}', 'UsersController@show')->name('users.show');
Route::get('/EditUser/{id}', 'UsersController@edit')->name('users.edit');
Route::patch('/EditUser/{id}', 'UsersController@update')->name('users.update');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::delete('/detailsUser/{id}', 'UsersController@destroy')->name('users.destroy');



//Section for Feedbacks
Route::resource('feedbacks', 'FeedbacksController');

Route::get('/feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
Route::get('/createFeedback', 'FeedbacksController@create')->name('feedbacks.create');
Route::get('/feedbacks/{id}', 'FeedbacksController@show')->name('feedbacks.show');
Route::get('/editFeedback/{id}', 'FeedbacksController@edit')->name('feedbacks.edit');
Route::patch('/editFeedback/{id}', 'FeedbacksController@update')->name('feedbacks.update');
Route::post('/createFeedback', 'FeedbacksController@store')->name('feedbacks.store');
Route::delete('/deleteFeedback/{id}', 'FeedbacksController@destroy')->name('feedbacks.destroy');


//Categories
Route::resource('categories', 'CategoriesController');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'CategoriesController@update')->name('categories.update');
Route::delete('/categories/{id}', 'CategoriesController@destroy')->name('categories.destroy');


//Items
Route::resource('items', 'ItemsController');

Route::get('/items', 'ItemsController@index')->name('items.index');


//Imagem upload
//Route::get('/images', 'UploadController@index')->name('image.upload.profile');
Route::post('/images', 'UploadController@store')->name('upload.store');
Route::get('/editarImagem/{id}', 'UploadController@edit')->name('upload.edit');
Route::post('/editarImagem/{id})', 'UploadController@update')->name('upload.update');
Route::delete('/images/{id}', 'UploadController@destroy')->name('images.destroy');

Route:: get('/images', 'ImagemControler@index')->name('images.index');
Route::get('/detalheImagem/{id}', 'ImagemControler@show')->name('images.show');

// Routes to review ??cintia?
Route::get('/cadastroImagem', 'ImagemControler@create')->name('images.create');
Route::post('/cadastroImagem', 'ImagemControler@store')->name('images.store');

//Routes for Locations
Route::get('/locations', 'LocationController@index')->name('locations.index');
Route::get('/createLocation', 'LocationController@create')->name('locations.create');
Route::post('/createLocation', 'LocationController@store')->name('locations.store');

Route::get('/editarLocation/{id}', 'LocationController@edit')->name('locations.edit');
Route::patch('/editarLocation/{id})', 'LocationController@update')->name('locations.update');
Route::delete('/location/{id}', 'LocationController@destroy')->name('locations.destroy');


//Posts
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/createPost', 'PostsController@create')->name('posts.create');
Route::post('/createPost', 'PostsController@store')->name('posts.store');

Route::get('/detalhePost/{id}', 'PostsController@show')->name('posts.show');
Route::get('/editPost/{id}', 'PostsController@edit')->name('posts.edit');
Route::post('/editPost/{id})', 'PostsController@update')->name('posts.update');
Route::delete('/post/{id}', 'PostsController@destroy')->name('posts.destroy');

//AUTH ROUTES
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

