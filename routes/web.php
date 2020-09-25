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
Route::get('/province', 'Pro@search');
Route::get('/kab', 'Kab@search');
Route::get('/kec', 'Kec@search');
Route::get('/des', 'Des@search');
Route::get('/baru', 'Baru@search');
Route::get('/dis', 'Baru@searchdis');

Route::get('/zipcode', 'Zipcode@search');
Route::get('/zipcode1', 'Zipcode@search1');
Route::get('/zipcode2', 'Zipcode@search2');
Route::get('/zipcode3', 'Zipcode@search3');
Route::get('/zipcode4', 'Zipcode@search4');
Route::get('/zipcode5', 'Zipcode@search5');
Route::get('/zipcode6', 'Zipcode@search6');
Route::get('/zipcode7', 'Zipcode@search7');
Route::get('/zipcode8', 'Zipcode@search8');

Route::get('/district', 'District@search');
Route::get('/district1', 'District@search1');
Route::get('/district2', 'District@search2');
Route::get('/district3', 'District@search3');
Route::get('/district4', 'District@search4');
Route::get('/district5', 'District@search5');
Route::get('/district6', 'District@search6');
Route::get('/district7', 'District@search7');
Route::get('/district8', 'District@search8');
