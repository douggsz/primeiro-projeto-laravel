@extends('layout.app', ["current" => "categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/categorias/{{$categoria->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" value="{{$categoria->nome}}"
                           id="nomeCategoria" placeholder="Categoria">
                </div>
                <button type="submit" class="btn-sm btn-primary btn">Enviar</button>
                <button type="reset" class="btn-sm btn-danger btn">Limpar</button>
            </form>
        </div>
    </div>

@endsection
