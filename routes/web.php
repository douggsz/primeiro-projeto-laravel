<?php



Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'controller_produto@index');
Route::get('/categorias', 'controller_categoria@index');

