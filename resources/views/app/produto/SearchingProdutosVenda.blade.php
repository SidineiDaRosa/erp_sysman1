<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>LISTAGEM DE PRODUTOS</div>

            <form id="formSearchingProducts" action="{{'Produtos-filtro-e-comerce'}}" method="POST">
                @csrf
                <div class="col-md-4 mb-0">
                    <select class="form-control" name="tipofiltro" id="tipofiltro" value="" placeholder="Selecione o tipo de filtro">

                        <option value="2">Busca Pelas inicias</option>
                        <option value="1">Busca pelo ID</option>
                        <option value="3">Busca pelo Código do Fabricante</option>
                        <option value="4">Busca por categoria</option>
                        <option value="0">Busca Pelo estoque minimo</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="categoria_id" id="" class="form-control-template">
                        <option value=""> --Selecione a Categoria--</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ ($produto->categoria_id ?? old('categoria_id')) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('categoria_id') ? $errors->first('categoria_id') : '' }}
                </div>
                <!--input box filtro buscar produto--------->

                <input type="text" id="query" name="produto" placeholder="Buscar produto..." aria-label="Search through site content">
                <button type="submit">
                    <i class="icofont-search"></i>
                </button>

                <a href="#" class="btn btn-sm btn-primary">

                    <span class="material-symbols-outlined">
                        shopping_cart_checkout
                    </span>

                    Meu carrinho
                </a>
            </form>

            <div>


            </div>
        </div>
    </div>
    <!---estilização do input box buscar produtos---->
    <style>
        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: blue;
            margin: 10%;
            transition: 0.5s;


        }

        #tipofiltro.form-control {
            margin: 10px;
            margin-top: 6px;

        }

        .form-control-template {
            margin: 15px;
        }

        .col-md-4 {
            margin: 30px;
            font-size: 18px;
        }

        .card-header-template div {
            color: white;
            margin: 5px;
            font-size: 20px;
            text-align: center;
        }

        .icofont-cart {
            padding: 0px;
            width: 0;
            padding: 10px;
            min-width: 100px;
            max-width: 200px;

        }


        .card-header-template {
            background-color: black;
        }


        .placeholder {
            background-color: white;

        }



        input#query {
            background-color: rgb(211, 211, 211);
            border-radius: 20px;
            padding: 10px;
            min-width: 600px;
            max-width: 2000px;
            margin: 10%;
            border-color: black;

        }



        #formSearchingProducts {
            background-color: black;
            width: 900px;
            height: 44px;
            border-radius: 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 15px;
            margin: 20px;
        }

        input {
            all: unset;
            font: 15px system-ui;
            color: black;
            height: 100%;
            width: 100%;
            padding: 6px 10px;
            font-family: 'Oswald', sans-serif;
        }

        ::placeholder {
            color: black;
            opacity: 0.9;
            font-family: 'Oswald', sans-serif;
            font: 20px system-ui;
        }


        button {
            all: unset;
            cursor: pointer;
            width: 44px;
            height: 44px;
            background-color: white;
        }

        #tblProdutos {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: rgb(211, 211, 211);
            color: black;
        }

        thead {
            background-color: rgb(169, 169, 169);
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        tr:hover {
            background-color: rgb(169, 169, 169);
            transition: 0.5s;
        }

        a {
            color: black;
            text-decoration: underline;
            text-decoration: none;
            font-size: 18px;


        }
    </style>
    <!-------------------------------------------------------------------------->
    <div class="card-body">
        <table class="" id="tblProdutos">
            <thead>
                <tr>
                    <th scope="col">imagem</th>
                    <th scope="col">cod_fabricante</th>
                    <th scope="col">Nome</th>
                    <th scope="col">un medida</th>
                    <th scope="col">Dados técnicos</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Ver peça</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">oprações</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($produtos as $produto)
                <tr>

                    <td>
                        <img src="/img/produtos/{{ $produto->image}}" alt="imagem" class="preview-image">
                    </td>
                    <td>{{ $produto->cod_fabricante }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->unidade_medida->nome}}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->marca->nome}}</td>
                    <td><a href="{{ $produto->link_peca}}" target="blank">Fabricante
                            <span class="material-symbols-outlined">
                                open_in_new
                            </span>
                        </a></td>
                    <style>
                        .preview-image {
                            width: 100px;
                            height: 100px;
                            object-fit: cover;
                            margin: 0 5px;
                            cursor: pointer;

                        }

                        #submit_ver {
                            cursor: pointer;
                            width: 20px;
                            transition: 0.5s;
                            color: white;
                        }


                        .div-op {
                            width: 20px;

                        }
                    </style>

                    <td>

                        <div class="btn-group btn-group-actions visible-on-hover">

                            <form id="formGoProduct" action="{{'comerce-show-produto'}}" method="POST">
                                @csrf
                                <input type="submit" value="ver" onclick="ActionSuibmitformGoProduct()">
                                <input type="number" value="{{ $produto->id }}" name="idProduto" hidden>
                            </form>

                            <script>
                                function ActionSuibmitformGoProduct() {
                                    //document.getElementById('busca').click();
                                    document.getElementById('formGoProduct').submit();
                                }
                            </script>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    </div>
</main>

</html>