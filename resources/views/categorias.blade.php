@extends('layout.app',["current" => "categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            @isset($buscaCategorias)
                <h5 class="card-title">Cadastro de categorias</h5>
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buscaCategorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nome }}</td>
                            <td>
                                <a href="/categorias/editar/{{ $categoria->id }}" class="btn btn-sm btn-primary">Edtar</a>
                                <a href="/categorias/excluir/{{ $categoria->id }}"class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                    <h2>Não há categorias</h2>
                @endif

            </table>
            <a href="/categorias/novo" class="btn btn-sm btn-primary">Novo</a>
        </div>
    </div>

@endsection
