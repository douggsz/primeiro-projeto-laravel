@extends('layout.app', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do novo produto</label>
                    <input type="text" class="form-control" name="nomeProduto"
                           id="nomeProduto" placeholder="Produto">

                    <label for="precoProduto">Preço</label>
                    <input type="number" class="form-control" name="precoProduto"
                           id="precoProduto" min=1 step=0.01>

                    <label for="estoqueProduto">Estoque</label>
                    <input type="number" class="form-control" name="estoqueProduto"
                           id="estoqueProduto" placeholder="Estoque">

                    <label for="categoriaProduto">Categoria</label>

                    <select name="categoriaProduto" id=categoriaProduto class="form-control">
                        @foreach($categorias as $categoria)
                                 <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn-sm btn-primary btn">Enviar</button>
                <button type="reset" class="btn-sm btn-danger btn">Limpar</button>
            </form>
        </div>
    </div>

@endsection
