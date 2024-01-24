@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>VISUALIZAR EQUIPAMENTO</div>
            <diV>
                <a class="btn btn-sm btn-primary" href="{{route('equipamento.index')}}" class="btn">
                    LISTAGEM
                </a>

                <a class="btn btn-sm btn-primary" href="{{route('equipamento.create')}}" class="btn">
                    NOVA MARCA
                </a>
            </div>
        </div>
        <a href="{{route('ordem-servico.create', ['equipamento'=>12])}}" class="btn-sm btn-success">
            <span class="icon text-white-50">
                <i class="icofont-database-add"></i>
            </span>
            <span class="text">Nova ordem</span>
        </a>

        <div class="card-body">


            ID:
            {{$equipamento->id}}
            <p></p>

            Nome:
            {{$equipamento->nome}}
            <p></p>

            DESCRIÇÂO:
            {{$equipamento->descricao}}
            <p></p>

            MARCA:
            {{$equipamento->marca->nome}}
            <p></p>

            Empresa:
            {{$equipamento->Empresa->razao_social}}
            <p></p>

            Data de fabricação:
            {{$equipamento->data_fabricacao}}
            <p></p>


            {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $equipamento->id.'--'.$equipamento->nome) !!}</tr>
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
    </div>

</main>

@endsection