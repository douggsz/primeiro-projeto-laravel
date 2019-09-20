<?php

namespace App\Http\Controllers;

use App\categoria;
use App\produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class controller_produto extends Controller
{
    public function indexView()
    {
        $produtos = new produto();
        $buscaProdutos = $produtos::all();
        $cat = new categoria();
        $categorias = $cat::all();

        return view('produtos', compact('buscaProdutos', 'categorias'));
    }

    public function index()
    {
        $produtos = new produto();
        $buscaProdutos = $produtos::all();

        return $buscaProdutos->toJson();
    }

    public function create()
    {
        $cat = new categoria();
        $categorias = $cat::all();
        return view('novoProduto', compact('categorias'));
    }

    public function store(Request $request)
    {
        $produto = new produto();
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->estoque = $request->input('estoque');
        $produto->id_categoria = $request->input('id_categoria');
        $produto->save();
        return json_encode($produto);
    }

    public function show($id)
    {
        $produtos = produto::all();
        $produto = $produtos->find($id);

        if (isset($produto)) {
            return json_encode($produto);
        } else {
            return response("Não encontrado", 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $produtos = produto::all();
        $produto = $produtos->find($id);

        if (isset($produto)) {
            $produto->nome = $request->input('nome');
            $produto->preco = $request->input('preco');
            $produto->estoque = $request->input('estoque');
            $produto->id_categoria = $request->input('id_categoria');
            $produto->save();
            return json_encode($produto);
        } else {
            return response("Não encontrado", 404);
        }

    }

    public function destroy($id)
    {
        $produtos = produto::all();
        $produto = $produtos->find($id);

        if (isset($produto)) {
            $produto->delete();
            return response("OK", 200);
        } else {
            return response("Não encontrado", 404);
        }
    }
}
