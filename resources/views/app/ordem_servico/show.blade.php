@extends('app.layouts.app')
@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>
                Ordem de serviço
            </div>
            <div>
                <a href="{{route('pedido-saida.create', ['ordem_servico'=>$ordem_servico->id])}}" class="btn-sm btn-success">
                    <i class="icofont-database-add"></i>
                    </span>
                    <span class="text">Criar novo pedido de saída</span>
                </a>
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('ordem-servico.index') }}">Voltar</a>
                <a class="btn btn-primary btn-lg" href="{{ route('ordem-servico.index') }}">listar</a>
                <a href=""> <a href="">
                        <div><i class="icofont-list icofont-2x"></i>
                    </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table-template table-hover" border="1">
                <tr>
                    <td>ID</td>
                    <td>{{$ordem_servico->id}}</td>

                </tr>
                <tr>
                    <td>data emissao</td>
                    <td>{{$ordem_servico->data_emissao}}</td>

                    <td>hora emissao</td>
                    <td>{{$ordem_servico->hora_emissao}}</td>
                </tr>
                <tr>
                    <td>data inicio</td>
                    <td>{{$ordem_servico->data_inicio}}</td>

                    <td>hora inicio</td>
                    <td>{{$ordem_servico->hora_inicio}}</td>
                </tr>
                <td>patrimonio</td>
                <td>{{$ordem_servico->equipamento->nome}}</td>
                </tr>
                </tr>
                <td>Empresa</td>
                <td>{{$ordem_servico->Empresa->razao_social}}</td>
                </tr>
                <td>emissor</td>
                <td>{{$ordem_servico->emissor}}</td>
                </tr>
                <td>responsavel</td>
                <td>{{$ordem_servico->responsavel}}</td>
                </tr>
                <td>descrição</td>
                <td>{{$ordem_servico->descricao}}</td>
                </tr>
                <td>Executado</td>
                <td>{{$ordem_servico->Executado}}</td>
                </tr>

                <span>Descrição dos serviços a serem executados</span>
                <table class="table-template table-hover" border="1">
                    <tr>

                        <td>
                            {{$ordem_servico->descricao}}
                        </td>
                    </tr>
                </table>
                <span>Descrição dos serviços executados</span>
                <table class="table-template table-hover" border="1">
                    <td>
                        {{$ordem_servico->Executado}}
                    </td>

                </table>

                <table class="table-template table-hover" border="1">
                    <tr>
                        <td>situação</td>
                        <td>{{$ordem_servico->situacao}}</td>
                        <td>R$:</td>
                        <td>{{$ordem_servico->valor}}</td>
                    </tr>
                    </tr>

                </table>
                <p></p>
                {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $ordem_servico->id) !!}</tr>
                <hr>

                <hr>
                <?php

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