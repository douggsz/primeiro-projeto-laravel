<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoria;

class controller_categoria extends Controller
{

    public function index()
    {
        $categorias = new categoria();
        $buscaCategorias = $categorias::all();
        return view('categorias', compact('buscaCategorias'));
    }

    public function create()
    {
        return view('novaCategoria');
    }
    public function store(Request $request)
    {
        $categoria = new categoria();
        $categoria->nome = $request->input('nomeCategoria');
        $categoria->save();
        $buscaCategorias = $categoria::all();
        return view('categorias', compact('buscaCategorias'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $categorias = new categoria();
        $buscaCategorias = $categorias::all();
        $categoria = $buscaCategorias->find($id);
        if(isset($categoria)){
            return view('editarCategoria',compact('categoria'));
        }
        return redirect('/categorias');
    }
    public function update(Request $request, $id)
    {
        $categorias = new categoria();
        $buscaCategorias = $categorias::all();
        $categoria = $buscaCategorias->find($id);
        if(isset($categoria)){
            $categoria->nome = $request->input('nomeCategoria');
            $categoria->save();
        }
        return redirect('/categorias');
    }
    public function destroy($id)
    {
        $categorias = new categoria();
        $buscaCategorias = $categorias::all();
        $categoria = $buscaCategorias->find($id);
        if (isset($categoria)){
            $categoria->delete();
        }

        return redirect('/categorias');
    }
    public function indexJson()
    {
        $categorias = new categoria();
        $buscaCategorias = $categorias::all();

        return json_decode($buscaCategorias);

    }
}
