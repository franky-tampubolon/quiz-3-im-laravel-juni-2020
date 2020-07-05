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
Route::get('/article', 'ArticlesController@index'); // menampilkan tabel berisi artikel
Route::post('/article', 'ArticlesController@store'); // menampilkan tabel berisi artikel
Route::get('/article/create', 'ArticlesController@create'); //menampilkan form add article
Route::get('/article/{id}', 'ArticlesController@show'); //menampilkan detail article
Route::put('/article/{id}', 'ArticlesController@update'); //menampilkan detail article
Route::get('/article/{id}/edit', 'ArticlesController@edit'); //menampilkan form edit article
Route::put('/article/{id}', 'ArticlesController@delete'); //menghapus article