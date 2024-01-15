@extends('app.layouts.app')

@section('titulo', 'Produtos')

@section('content')

<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>Visualizar Produto</div>
            <div>
                <a href="{{ route('produto.index') }}" class="btn btn-sm btn-primary">
                    Lista de produtos
                </a>
                <a href="{{ route('produto.create') }}" class="btn btn-sm btn-primary">
                    NOVO
                </a>

            </div>
        </div>
        <div class="card-body">
            <table class="table-template table-hover">
                <tr>
                    <td class="text-right pr-2">ID</td>
                    <td>{{ $produto->id }}</td>


                    <td class="text-right pr-2">Nome</td>
                    <td>{{ $produto->nome }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-2">DESCRIÇÂO</td>
                    <td>href="{{ $produto->descricao }}"</td>
                </tr>
                <tr>
                    <td class="text-right pr-2"> MARCA</td>
                    <td>{{ $produto->marca->nome }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-2">ESTOQUE MÍNIMO</td>
                    <td>{{ $produto->estoque_minimo }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-2">ESTOQUE ATUAL</td>
                    <td>{{ $produto->estoque_ideal }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-2">ESTOQUE MÁXIMO</td>
                    <td>{{ $produto->estoque_maximo }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-2">Local no estoque</td>
                    <td>{{ $produto->local_estoque}}</td>
                </tr>

                <td>{{ $produto->categoria->nome}}</td>
                <td>
                    <img src="/img/produtos/{{ $produto->image}}" alt="imagem">
                </td>
                <td>
                    <img src="/img/produtos/{{ $produto->image2}}" alt="imagem">
                </td>
                <td>
                    <img src="/img/produtos/{{ $produto->image3}}" alt="imagem">
                </td>
            </table>
            {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $produto->id.'--'.$produto->nome) !!}</tr>
            <hr>

            <hr><?php

                $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on") ? "https" : "http");
                $url = '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $urlPaginaAtual = $protocolo . $url
                //echo $protocolo.$url;
                ?>
            Visualisar no web site:
            <p></p>
            {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $urlPaginaAtual ) !!}
        </div>
    </div>

</main>

@endsection