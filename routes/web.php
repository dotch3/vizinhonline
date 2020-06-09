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