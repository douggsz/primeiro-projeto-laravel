@extends('layout.app',["current" => "home"])

@section('body')

    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">

                        <h5 class="card-title">Cadastro Produtos</h5>
                        <p class="card-text">Formulário para cadastro de produtos</p>
                        <a href="/produtos" class="btn btn-primary">Cadastro</a>

                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">

                        <h5 class="card-title">Cadastro categorias</h5>
                        <p class="card-text">Formulário para cadastro de categorias</p>
                        <a href="/categoria" class="btn btn-primary">Cadastro</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
