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

    <div class="modal" tabindex="-1" id="divProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-group" id="formProdutos">
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
                        <button type="button" class="btn-secondary btn" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function novoProduto() {
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#estoqueProduto').val('');
            $('#precoProduto').val('');
            $('#categoriaProduto').val('');
            $('#divProdutos').modal();
        }

        function carregarCategorias() {
            $.getJSON('/api/categorias', function (categoria) {
                for (i = 0; i < categoria.length; i++) {
                    opcao = '<option value="' + categoria[i].id + '">' + categoria[i].nome + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            })
        }

        function carregaProdutos() {
            $.getJSON('/api/produtos', function (produto) {
                for (i = 0; i < produto.length; i++) {

                    prod = montaLinha(produto[i]);

                    $('#tabelaProdutos>tbody').append(prod);
                }
            })
        }

        $('#formProdutos').submit(function (event) {
            event.preventDefault();
            if ($('#id').val() != '') {
                salvaBanco();
                $('#divProdutos').modal('hide');
            } else {
                criaProduto();
            }
        });

        function salvaBanco(objeto) {

            prod = {
                id: $('#id').val(),
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                estoque: $('#estoqueProduto').val(),
                id_categoria: $('#categoriaProduto').val()
            }

            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + prod.id,
                context: this,
                data: prod,
                success: function (data) {
                    linhas = $('#tabelaProdutos>tbody>tr');
                    e = linhas.filter(function (id, elemento) {
                        return elemento.cells[0].textContent == prod.id;
                    })
                    if (e) {
                            e[0].cells[0].textContent = prod.id;
                            e[0].cells[1].textContent = prod.nome;
                            e[0].cells[2].textContent = prod.preco;
                            e[0].cells[3].textContent = prod.estoque;
                            e[0].cells[4].textContent = prod.id_categoria;
                    }
                    console.log('OK');
                },
                error: function (error) {
                    console.log(error);
                }
            });

        }

        function criaProduto() {

            prod = {
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                estoque: $('#estoqueProduto').val(),
                id_categoria: $('#categoriaProduto').val()
            }

            $.post('/api/produtos', prod, function (produto) {

                prod = JSON.parse(produto)
                $('#tabelaProdutos>tbody').append(montaLinha(prod))

            })
            $('#divProdutos').modal('hide')

        }

        function removeProduto(id) {
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function () {
                    linhas = $('#tabelaProdutos>tbody>tr>td:first-child');
                    e = linhas.filter(function (i, elemento) {
                        return elemento.textContent == id;
                    });

                    if (e) {
                        e.parent('tr').remove();
                        console.log('OK');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function editarProduto(id) {
            $.getJSON('/api/produtos/' + id, function (produto) {
                $('#id').val(produto.id);
                $('#nomeProduto').val(produto.nome);
                $('#estoqueProduto').val(produto.estoque);
                $('#precoProduto').val(produto.preco);
                $('#categoriaProduto').val(produto.id_categoria);
                $('#divProdutos').modal('show');
            })
        }

        function montaLinha(p) {
            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.id_categoria + "</td>" +
                "<td>" +
                "<button class='btn btn-primary btn-sm' onclick='editarProduto(" + p.id + ")'>Editar</button>" +
                "<button class='btn btn-danger btn-sm'  onclick='removeProduto(" + p.id + ")'>Excluir</button>" +
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
