<?php



Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'controller_produto@indexView');
Route::get('/categorias', 'controller_categoria@index');
Route::get('/categorias/novo', 'controller_categoria@create');
Route::get('/categorias/excluir/{id}','controller_categoria@destroy');
Route::get('/produtos/excluir/{id}','controller_produtos@destroy');
Route::get('/categorias/editar/{id}','controller_categoria@edit');
Route::post('/categorias', 'controller_categoria@store');
Route::post('/categorias/{id}', 'controller_categoria@update');
Route::post('/produtos','controller_produto@store');
Route::get('/produtos/novo','controller_produto@create');
