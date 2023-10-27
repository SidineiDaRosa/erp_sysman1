@extends('app.layouts.app')
@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>
                Ordem de serviço
            </div>
            <div>
                <a class="btn btn-primary btn-lg" href="{{route('pedido-saida.create', ['ordem_servico'=>$ordem_servico->id])}}">
                    <i class="icofont-database-add"></i>
                    Criar novo pedido de saída
                </a>

                <a class="btn btn-primary btn-lg" href="{{route('pedido-saida.index',['ordem_servico'=>$ordem_servico->id,'tipofiltro'=>4])}}">
                    <i class="icofont-search-2"></i>

                    </i>Busca Pedidos </a>
                <a class="btn btn-primary btn-lg mr-2" href="{{ route('ordem-servico.index') }}">Voltar</a>
                <a class="btn btn-primary btn-lg" href="{{ route('ordem-servico.index') }}">listar</a>

            </div>
        </div>
        <div class="card-body">
            <table class="table-template table-hover" border="1">
                <tr>
                    <td>ID</td>
                    <td id="idos">{{$ordem_servico->id}}</td>

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
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data prevista</th>
                                <th>Hora prevista</th>
                                <th>Data fim</th>
                                <th>Hora fim</th>
                            </tr>
                        </thead>
                        @foreach($servicos_executado as $servicos_exec)
                        <tbody>
                        
                            <td>{{$servicos_exec->id}}</td>
                            <td>{{$servicos_exec->ordem_servico_id}}</td>
                            <td>{{$servicos_exec->data_inicio}}</td>
                            <td>{{$servicos_exec->hora_inicio}}</td>
                            <td>{{$servicos_exec->data_fim}}</td>
                            <td>{{$servicos_exec->hora_fim}}</td>
                            <td>{{$servicos_exec->funcionario_id}}</td>
                            <td>{{$servicos_exec->descricao}}</td>

                            @endforeach
                        </tbody>

                    </table>

                    <tr>
                        <!-------------------------------filtra pedidos de saida-------------------------------->
                        <script>
                            onload = teste()

                            function teste() {
                                // alert('teste')
                            }
                        </script>

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