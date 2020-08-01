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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});


Route::resource("usuarios", "UsuarioController");
Route::resource("ciudades", "CiudadController");
Route::resource("categorias", "CategoriaController");
Route::resource("entradas", "EntradaController");
Route::resource("perfiles", "PerfilController");

Route::get('/registro','RegistroController@create');
Route::post('registro','RegistroController@store');

Route::get('/login','LoginController@login');
Route::post('login','LoginController@login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

