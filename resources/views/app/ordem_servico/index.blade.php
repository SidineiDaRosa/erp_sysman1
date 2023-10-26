@extends('app.layouts.app')
@section('content')
<script src="{{ asset('js/update_datatime.js') }}" defer></script>
<script src="{{ asset('js/timeline_google.js') }}" defer></script>
<main class="content">
    <div class="card">
        <style>
            .card-header {
                background-color: rgb(211, 211, 211);
                opacity: 0.95;
            }
        </style>
        <div class="card-header">
            <script>
                function Funcao() {
                    alert('teste');
                    document.getElementById("t1").value = "{{$funcionarios}}"
                }
            </script>
            <!------------------------------------->
            <!----teste de url--------------------->
            <div class="form-row">
                <form action="{{'filtro-os'}}" method="POST">
                    @csrf

            </div>x
            <!------------------------------------------------------------------------------------------->
            <!----datas---------------------------------------------------------------------------------->
            <!------------------------------------------------------------------------------------------->
            <div class="form-row">
                <div class="col-md-1">
                    <label for="id">ID:</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="ID Os" value="">
                </div>
                <p>
                    <!----------------------------------->
                <div class="col-md-1">
                    <label for="data_inicio">Data inicial:</label>
                    <input type="date" class="form-control" name="data_inicio" id="data_inicio" placeholder="dataPrevista" value="">
                </div>
                <div class="col-md-1">
                    <label for="hora_inicio">Hora prevista:</label>
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio" placeholder="horaPrevista" value="">
                </div>
                <div class="col-md-1">
                    <label for="dataFim">Data final:</label>
                    <input type="date" class="form-control" name="data_fim" id="dataFim" placeholder="dataFim" value="">
                </div>
                <div class="col-md-1">
                    <label for="horaFim">Hora fim:</label>
                    <input type="time" class="form-control" name="hora_fim" id="horaFim" placeholder="horaFim" value="">
                </div>
                <div class="col-md-6 mb-0">
                    <label for="responsavel" class="">Responsável:</label>
                    <select name="responsavel" id="responsavel" class="form-control-template">
                        <option value="todos">todos</option>
                        @foreach ($funcionarios as $funcionario_find)
                        <option value="{{$funcionario_find->primeiro_nome}}" {{($funcionario_find->responsavel ?? old('responsavel')) == $funcionario_find->primeiro_nome ? 'selected' : '' }}>
                            {{$funcionario_find->primeiro_nome}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('responsavel') ? $errors->first('responsavel') : '' }}
                </div>
                <!----------------------------------->
                <div class="col-md-2 mb-0">
                    <label for="situacao" class="">Situação:</label>
                    <select class="form-control" name="situacao" id="situacao" value="">
                        <option value="aberto">aberto</option>
                        <option value="fechado">fechado</option>
                        <option value="indefinido">indefinido</option>
                        <option value="cancelada">cancelada</option>
                        <option value="em andamento">em andamento</option>
                    </select>
                </div>
                <div class="col-md-2 mb-0">
                    <label for="tipo_consulta" class="">Tipo de consulta:</label>

                    <select class="form-control" name="tipo_consulta" id="tipo_consulta" value="">
                        <option value="1">Pelo ID</option>
                        <option value="2">>=Data inicial <= Data inicial </option>
                        <option value="3">>=Data inicial e <=Data final</option>
                        <option value="4">=Data final</option>
                        <option value="5">Data inicial e equipamento</option>
                        <option value="6">Data inicial e empresa</option>
                        <option value="7">Imprimir</option>
                    </select>
                </div>
                <!--------------------------------------------------------------------------------------->
                <!---------Select empresa------------->
                <!--------------------------------------------------------------------------------------->
                <div class="col-md-5 mb-0">
                    <label for="empresas" class="">Empresa:</label>
                    <select name="empresa_id" id="empresa_id" class="form-control-template">
                        <option value=""> --Selecione a empresa--</option>
                        @foreach ($empresa as $empresas_find)
                        <option value="{{$empresas_find->id}}" {{($empresas_find->empresa_id ?? old('empresa_id')) == $empresas_find->id ? 'selected' : '' }}>
                            {{$empresas_find->razao_social}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('empresa_id') ? $errors->first('empresa_id') : '' }}
                </div>
                <!------------------------------------------------------------------------------------------->
                <!---------Select o equipament------------->
                <!--------------------------------------------------------------------------------------->
                <div class="col-md-3 mb-0">
                    <label for="id">Patrimônio:</label>
                    <input type="number" class="form-control" id="patrimonio" name="patrimonio_id" placeholder="ID patrimonio" value="">
                </div>
                <!------------------------------------------------------------------------------------------->
                <div class="col-md-0">
                    <label for="btFiltrar" class="">Filtrar:</label>
                    <p>
                        <input type="submit" class="btn btn-info btn-icon-split" value="Filtrar">

                        <span class="icon text-white-50">
                            <i class="icofont-filter"></i>
                        </span>
                        <span class="text"></span>

                        </input>
                </div>
                </form>
                <!--------------------------------------->
                <div class="col-md-0">
                    <label for="btFiltrar" class="">Nova os</label>
                    <p>
                        <a href="{{route('empresas.index')}}" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="icofont-plus-circle"></i>
                            </span>
                            <span class="text">Nova ordem</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <style>
                #tblOs {
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
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }

                tr:hover {
                    background-color: rgb(169, 169, 169);
                }
            </style>
            <table class="" id="tblOs">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th hidden>Data emissao</th>
                        <th hidden>Hora</th>
                        <th>Data prevista</th>
                        <th>Hora prevista</th>
                        <th>Data fim</th>
                        <th>Hora fim</th>
                        <th>Empresa</th>
                        <th>Patrimônio</th>
                        <th>Emissor</th>
                        <th>Responsável</th>
                        <th>Descrição</th>
                        <th>Executado</th>
                        <th>link foto</th>
                        <th>Status</th>
                        <th>Valor</th>
                        <th>Operações</th>
                        <th>check</th>
                        <th>Pedido</th>
                    </tr>
                </thead>
                @foreach ($ordens_servicos as $ordem_servico)
                <tbody>
                    <tr>
                        <td>{{ $ordem_servico->id }}</td>
                        <td hidden>{{ $ordem_servico->data_emissao}}</td>
                        <td hidden>{{ $ordem_servico->hora_emissao}}</td>
                        <td>{{ $ordem_servico->data_inicio}}</td>
                        <td>{{ $ordem_servico->hora_inicio}}</td>
                        <td>{{ $ordem_servico->data_fim}}</td>
                        <td>{{ $ordem_servico->hora_fim}}</td>
                        <td>
                            {{ $ordem_servico->Empresa->razao_social}}
                        </td>
                        <td>{{ $ordem_servico->equipamento->nome}}</td>
                        <td>{{ $ordem_servico->emissor}}</td>
                        <td>{{ $ordem_servico->responsavel}}</td>
                        <td id="descricao">

                            {{ $ordem_servico->descricao}}

                        </td>
                        <td>
                            {{ $ordem_servico->Executado}}

                        </td>
                        <td><a href="{{ $ordem_servico->link_foto}}" target="blank">link foto</a></td>
                        <td>{{ $ordem_servico->situacao}}
                            <div class="progress mb-3" role="progressbar" aria-label="Success example with label" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-warning">{{ $ordem_servico->status_servicos}}%</div>
                            </div>
                        </td>
                        <td id="valor" value="{{ $ordem_servico->valor}}">{{ $ordem_servico->valor}}</td>
                        <!--Div operaçoes do registro da ordem des serviço-->
                        <td>
                            <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">
                                <a class="btn btn-sm-template btn-outline-primary" href="{{route('ordem-servico.show', ['ordem_servico'=>$ordem_servico->id])}}">
                                    <i class="icofont-eye-alt"></i>
                                </a>

                                <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="{{route('ordem-servico.edit', ['ordem_servico'=>$ordem_servico->id])}}">

                                    <i class="icofont-ui-edit"></i> </a>

                                <!--Condoçes para deletar a os-->
                                <form id="form_{{ $ordem_servico->id }}" method="post" action="{{route('ordem-servico.destroy', ['ordem_servico'=>$ordem_servico->id])}}">
                                    @method('DELETE')
                                    @csrf

                                </form>
                                <a class="btn btn-sm-template btn-outline-danger @can('user') disabled @endcan" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick=" DeletarOs()">
                                    <i class="icofont-ui-delete"></i>
                                    <script>
                                        function DeletarOs() {
                                            var x;
                                            var r = confirm("Deseja deletar a ordem de serviço?");
                                            if (r == true) {

                                                document.getElementById('form_{{$ordem_servico->id }}').submit()
                                            } else {
                                                x = "Você pressionou Cancelar!";
                                            }
                                            document.getElementById("demo").innerHTML = x;
                                        }
                                    </script>
                                </a>
                                <!------------------------------>

                            </div>
                        <td>
                            <div class="col-md-2 mb-0">
                                <input type="checkbox" name="" id="">
                            </div>
                        </td>
                        <td>
                            <!-------------------------------filtra pedidos de saida-------------------------------->
                            <form id="formBuscaPedidosSaida" action="{{'pedido-saida-filtro'}}" method="POST">
                                @csrf
                                <input type="text" name="tipofiltro" value="4" hidden>
                                <input type="text" name="tipofiltro" value="4" hidden>
                                <input type="text" id="query" name="produto" value="283" hidden>
                                <button type="submit">
                                    <i class="icofont-list"></i>
                                </button>
                            </form>
                            <input type="button" value="" onclick="">
                            <!-------------------------------------------------------------------------------------->
                        </td>

                    </tr>

                </tbody>


                @endforeach

            </table>
            <p></p>

            <div class="card border-success mb-3 md-1" style="max-width: 18rem;" id="valorTotal">
                <style>
                    #valorTotal {
                        font-size: 20px;
                        font-weight: 700;
                        font-stretch: normal;
                        float: right;
                        padding: 10px;
                    }
                </style>
                Valor Total:R$ {{$valorTotal}}
            </div>
        </div>

        <div class="row mb-0 md-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="executaTimeLine()">
                    Gerar timeline
                </button>
            </div>
        </div>
        <!--------------------------------------------------------------------->
        <!--Código que gera o gáfico de gantt-->
        <!--------------------------------------------------------------------->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        </script>

        <div id="timeline" style="height: 2000px;">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                let valor = "{{$valorTotal}}"; //pega valor total
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Valor total', valor],
                        ['Eat', 2],
                        ['Commute', 2],
                        ['Watch TV', 2],
                        ['Sleep', 7]
                    ]);
                    var options = {
                        title: 'My Daily Activities'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
            </script>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>timeline
        <!--------------------------------------------------------------------->
</main>
@endsection
<footer>
</footer>

</html>