@extends('layout.app',["current" => "home"])

@section('body')

    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">

                        <h3 class="card-title">Cadastro Produtos</h3>
                        <p class="card-text">Formulário para cadastro de produtos</p>
                        <a href="/produtos" class="btn btn-primary">Cadastro</a>

                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">

                        <h3 class="card-title">Cadastro categorias</h3>
                        <p class="card-text">Formulário para cadastro de categorias</p>
                        <a href="/categorias" class="btn btn-primary">Cadastro</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
