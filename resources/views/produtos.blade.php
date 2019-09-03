@extends('layout.app',["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
                <h5 class="card-title">Cadastro de Produtos</h5>
                <table class="table table-bordered table-hover" id="tabelaProdutos">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo</button>
        </div>
    </div>

    <div class="modal"tabindex="-1" id="divProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="form-group" id="formProdutos">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" id="estoqueProduto" placeholder="Estoque">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto" placeholder="Preço">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" id="categoriaProduto">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn-primary btn">Salvar</button>
                        <button type="button" class="btn-secondary btn" data-dismiss="modal" >Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
@endsection
@section('javascript')
    <script type="text/javascript">
        function novoProduto() {
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#estoqueProduto').val('');
            $('#precoProduto').val('');
            $('#divProdutos').modal();
        }
        function carregarCategorias() {
            $.getJSON('/api/categorias', function (categoria){
                for (i = 0; i < categoria.length; i++){
                    opcao = '<option value="' + categoria[i].id + '">' + categoria[i].nome + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            });
        }
        function carregaProdutos(){
            $.getJSON('/api/produtos', function (produto){
                for (i = 0; i < produto.length; i++){

                    prod = montaLinha(produto[i]);

                    $('#tabelaProdutos>tbody').append(prod);
                }
            });
        }
        function montaLinha(p){
            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.id_categoria + "</td>" +
                "<td>" +
                "<button class='btn btn-primary btn-sm'>Editar</button>" +
                "<button class='btn btn-danger btn-sm'>Excluir</button>" +
                "</td>" +
                "</tr>";
            return linha;
        }
        $(function () {
            carregarCategorias();
            carregaProdutos();
        })
    </script>
@endsection
