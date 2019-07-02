<?php

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

Route::get('/home', function () {
    return view('dashboard');
})->name("home");
Route::get('/creditos', function () {
    return view('creditos');
})->name("creditos");

Route::get('/curriculum', function () {
    $file= public_path(). "/Franklyn _curriculum.pdf";

    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::download($file, 'Franklyn_curriculum.pdf', $headers);
    //return \Response::download($file);
    //return view('creditos');
})->name("curriculum");

Route::get('/bodega','BodegaController@index')->name("bodega");
Route::get('/','CocinaController@index')->name("cocina");
Route::get('/crear_orden','CocinaController@crear_orden')->name("crear_orden");