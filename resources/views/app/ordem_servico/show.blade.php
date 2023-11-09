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
                <a class="btn btn-primary btn-lg" href="{{route('Peca-equipamento.index', ['equipamento' =>$ordem_servico->equipamento->id]) }}">
                <i class="icofont-tractor"></i>
                    </i>ir para o equipamento</a>

                <a class="btn btn-primary btn-lg mr-2" href="{{ route('ordem-servico.index') }}">Voltar</a>
                <a class="btn btn-primary btn-lg" href="{{ route('ordem-servico.index') }}">listar</a>

            </div>
        </div>
        <div class="card-body">
            <!--Cabeçalho------------------------------------------------------------------------->
            <div id=top>

                <style>
                    #top {
                        border: 1px;
                        width: 100%;
                        height: auto;
                        text-align: center;
                    }

                    #idOs {
                        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        font-size: 25px;
                        font-weight: bold;

                    }

                    #qrCodes {
                        width: auto;
                        height: auto;
                        float: right;
                    }

                    .inputTxt {
                        width: 500px;
                    }

                    .content-input-txt {
                        float: left;
                    }

                    .textarea-input {
                        width: 99%;
                        height: auto;
                        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                    }
                </style>
                <div id=qrCodes>
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $ordem_servico->id) !!}
                    <?php
                    $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on") ? "https" : "http");
                    $url = '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $urlPaginaAtual = $protocolo . $url
                    //echo $protocolo.$url;
                    ?>
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $urlPaginaAtual ) !!}
                </div>
                <div id=idOs>
                    ID O.S:&nbsp&nbsp{{$ordem_servico->id}}
                </div>
                <hr>
                <div class="content-input-txt">
                    <label for="">Data emissão &nbsp</label>
                    <input type="text" value="{{$ordem_servico->data_emissao}}" readonly disabled>
                    <label for="">Hora emissão &nbsp</label>
                    <input type="text" value="{{$ordem_servico->hora_emissao}}" readonly disabled>
                    <label for="">Data início</label>
                    <input type="text" value="{{ date( 'd/m/Y' , strtotime($ordem_servico['data_inicio']))}}" readonly disabled>
                    <label for="">Hora início</label>
                    <input type="text" value="{{$ordem_servico->hora_fim}}" readonly disabled>
                    <label for="">Data fim</label>
                    <input type="text" value="{{ date( 'd/m/Y' , strtotime($ordem_servico['data_fim']))}}" readonly disabled>
                    <label for="">Hora fim</label>
                    <input type="text" value="{{$ordem_servico->hora_inicio}}" readonly disabled>
                </div>
                <div class="content-input-txt">
                    <label for="">Empresa/Filial</label>
                    <input class="inputTxt" type="text" value="{{$ordem_servico->Empresa->razao_social}}" readonly disabled>
                    <label for="">Ativo &nbsp&nbsp</label>
                    <input class="inputTxt" type="text" value="{{$ordem_servico->equipamento->nome}}" readonly disabled>
                    <label for="">Status</label>
                    <input class="inputTxt" type="text" value=" {{$ordem_servico->situacao}}" readonly disabled>

                </div>
                <p></p>
                <div class="content-input-txt">
                    <label for="">Emissor...........</label>
                    <input class="inputTxt" type="text" value="{{$ordem_servico->emissor}}" readonly disabled>
                    <label for="">Responsável</label>
                    <input class="inputTxt" type="text" value="{{$ordem_servico->responsavel}}" readonly disabled>
                </div>

                <div class="content-input-txt">
                    <label for="">Descrição dos serviços a executar</label>
                </div>

                <textarea class="textarea-input" name="" id="" readonly disabled>{{$ordem_servico->descricao}}</textarea>


            </div>

            <table class="table-template table-hover" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data prevista</th>
                        <th>Hora prevista</th>
                        <th>Data fim</th>
                        <th>Hora fim</th>
                        <th>Executor</th>
                        <th>Descrição dos serviços</th>
                    </tr>
                </thead>
                @foreach($servicos_executado as $servicos_exec)
                <tbody>
                    <td>{{$servicos_exec->id}}</td>
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

        </div>

    </div>
    </div>

    <a class="btn btn-primary btn-lg" href="{{route('Servicos-executado.create',['ordem_servico'=>$ordem_servico->id])}}">Inserir serviço executado</a>
</main>
@endsection