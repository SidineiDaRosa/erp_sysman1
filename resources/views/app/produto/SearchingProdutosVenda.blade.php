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
                        <option value="1">Busca pelo ID</option>
                        <option value="2">Busca Pelas inicias</option>
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
            </form>
            <svg id="svg1" xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" class=" css-1jtd2m7 eac13zx0">
                <path d="M14.504 3a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h3.085l-9.594 9.594a.5.5 0 000 .707l.707.708a.5.5 0 00.707 0l9.594-9.595V9.5a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-6a.5.5 0 00-.5-.5h-6z"></path>
                <path d="M5 3.002a2 2 0 00-2 2v13.996a2 2 0 001.996 2.004h14a2 2 0 002-2v-6.5a.5.5 0 00-.5-.5h-1a.5.5 0 00-.5.5v6.5L5 18.998V5.002L11.5 5a.495.495 0 00.496-.498v-1a.5.5 0 00-.5-.5H5z"></path>
            </svg>
            <style>
                #svg1 {
                    height: 30px;
                    width: 30px;
                    cursor: pointer;
                }
            </style>
            <div>

                <a href="#" class="btn btn-sm btn-primary">

                    <i class="icofont-cart icofont-2x"></i>
                    Meu carrinho
                </a>
            </div>
        </div>
    </div>
    <!---estilização do input box buscar produtos---->
    <style>
        #formSearchingProducts {
            background-color: white;
            width: 900px;
            height: 44px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        input {
            all: unset;
            font: 16px system-ui;
            color: blue;
            height: 100%;
            width: 100%;
            padding: 6px 10px;
        }

        ::placeholder {
            color: blueviolet;
            opacity: 0.9;
        }


        button {
            all: unset;
            cursor: pointer;
            width: 44px;
            height: 44px;
        }

        #tblProdutos {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: rgb(211, 211, 211);
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
        }
    </style>
    <!-------------------------------------------------------------------------->
    <div class="card-body">
        <table class="" id="tblProdutos">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Qrcode</th>
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
                    <th scope="row">{{ $produto->id }}</td>
                    <td> {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $produto->id.'--'.$produto->nome) !!}</td>
                    <td>{{ $produto->cod_fabricante }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->unidade_medida->nome}}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->marca->nome}}</td>
                    <td><a href="{{ $produto->link_peca}}" target="blank">Ver no site do fabricante
                            <i class="icofont-arrow-right"></i>
                        </a></td>
                    <td>
                        <img src="/img/produtos/{{ $produto->image}}" alt="imagem" class="preview-image">
                    </td>
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
                        }

                        #formGoProduct {
                            width: 40px;
                        }

                        .div-op {
                            width: 20px;
                        }
                    </style>

                    <td>
                        <div class="btn-group btn-group-actions visible-on-hover">
                            <form id="formGoProduct" action="{{'comerce-show-produto'}}" method="POST" class="form_ver">
                                @csrf
                                <input type="number" value="{{ $produto->id }}" name="idProduto" hidden>
                                <input type="submit" value="Ver" id="submit_ver">
                                </a>
                            </form>
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