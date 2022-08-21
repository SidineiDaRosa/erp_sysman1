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

            </div>
            <!------------------------------------------------------------------------------------------->
            <!----datas---------------------------------------------------------------------------------->
            <!------------------------------------------------------------------------------------------->
            <div class="form-row">
                <div class="col-md-2">
                    <label for="id">ID:</label><input type="checkbox" name="" id="">
                    <input type="number" class="form-control" id="id" name="id" placeholder="ID Os" value="">
                </div>
                <p>
                    <!----------------------------------->
                <div class="col-md-2">
                    <label for="data_inicio">Data prevista:</label><input type="checkbox" name="" id="">
                    <input type="date" class="form-control" name="data_inicio" id="data_inicio"
                        placeholder="dataPrevista" value="">
                </div>
                <div class="col-md-2">
                    <label for="hora_inicio">Hora prevista:</label><input type="checkbox" name="" id="">
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"
                        placeholder="horaPrevista" value="">
                </div>
                <div class="col-md-2">
                    <label for="dataFim">Data fim:</label><input type="checkbox" name="" id="">
                    <input type="date" class="form-control" name="data_fim" id="dataFim" placeholder="dataFim" value="">
                </div>
                <div class="col-md-2">
                    <label for="horaFim">Hora fim:</label><input type="checkbox" name="" id="">
                    <input type="time" class="form-control" name="hora_fim" id="horaFim" placeholder="horaFim" value="">
                </div>
                <div class="col-md-6 mb-0">
                    <label for="responsavel" class="">Responsável:</label><input type="checkbox" name="" id="">
                    <select name="responsavel" id="responsavel" class="form-control-template">
                        <option value="todos">todos</option>
                        @foreach ($funcionarios as $funcionario_find)
                        <option value="{{$funcionario_find->primeiro_nome}}"
                            {{($funcionario_find->responsavel ?? old('responsavel')) == $funcionario_find->primeiro_nome ? 'selected' : '' }}>
                            {{$funcionario_find->primeiro_nome}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('responsavel') ? $errors->first('responsavel') : '' }}
                </div>
                <!----------------------------------->
                <div class="col-md-2 mb-0">
                    <label for="situacao" class="">Situação:</label><input type="checkbox" name="" id="">
                    <select class="form-control" name="situacao" id="situacao" value="">
                        <option value="aberto">aberto</option>
                        <option value="fechado">fechado</option>
                        <option value="indefinido">indefinido</option>
                        <option value="cancelada">cancelada</option>
                        <option value="em andamento">em andamento</option>
                    </select>
                </div>
                <!--------------------------------------------------------------------------------------->
                <!---------Select empresa------------->
                <!--------------------------------------------------------------------------------------->
                <div class="col-md-6 mb-0">
                    <label for="empresas" class="">Empresa:</label><input type="checkbox" name="" id="">
                    <select name="empresa_id" id="empresa_id" class="form-control-template">
                        <option value=""> --Selecione a empresa--</option>
                        @foreach ($empresa as $empresas_find)
                        <option value="{{$empresas_find->id}}"
                            {{($empresas_find->empresa_id ?? old('empresa_id')) == $empresas_find->id ? 'selected' : '' }}>
                            {{$empresas_find->razao_social}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('empresa_id') ? $errors->first('empresa_id') : '' }}
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
                font-size: small;
                padding: 1px;
                margin-left: 0px;
                width: 100%;
            }

            thead {
                font-size: 20px;
                height: 50px;
                padding: 1px;
            }

            th {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-size: 20px;
                font-weight: 100;
            }

            tr {
                height: auto;
                font-weight: 300;

            }

            td {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-size: 10px;
                font-weight: 1000;
            }
            </style>
            <table class="table table-dark table-striped table-responsive-md-1 mb-0" id="tblOs">
                <thead>
                    <tr>
                        <th scope="col" class="">ID</th>
                        <th scope="col" class="" hidden>Data emissao</th>
                        <th scope="col" class="" hidden>Hora</th>
                        <th scope="col" class="">Data prevista</th>
                        <th scope="col" class="">Hora prevista</th>
                        <th scope="col" class="">Data fim</th>
                        <th scope="col" class="">Hora fim</th>
                        <th scope="col" class="">Empresa</th>
                        <th scope="col" class="">Patrimônio</th>
                        <th scope="col" class="">Emissor</th>
                        <th scope="col" class="">Responsável</th>
                        <th scope="col" class="">Descrição</th>
                        <th scope="col" class="">Executado</th>
                        <th scope="col" class="">Status</th>
                        <th scope="col" class="">Valor</th>
                        <th scope="col" class="">Visualizar</th>
                        <th scope="col" class="">Editar</th>
                        <th scope="col" class="">Excluir</th>
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
                        <td>{{ $ordem_servico->situacao}}</td>
                        <td id="valor" value="{{ $ordem_servico->valor}}">{{ $ordem_servico->valor}}</td>
                        <td>
                            <a href="{{route('ordem-servico.show', ['ordem_servico'=>$ordem_servico->id])}}">
                                <button class="btn btn-sm-template btn-info">Visualizar</button>
                            </a>
                        </td>

                        <td>
                            <a href="{{route('ordem-servico.edit', ['ordem_servico'=>$ordem_servico->id])}}">
                                <button class="btn btn-sm-template btn-primary">Editar</button>
                        </td>

                        <td>
                            <a href="{{route('ordem-servico.destroy', ['ordem_servico'=>$ordem_servico->id])}}">
                                <a class="btn btn-sm-template btn btn-danger">Excluir</a>
                        </td>
                    </tr>

                </tbody>


                @endforeach

            </table>
            <p></p>

            <div class="card border-success mb-3 md-1" style="max-width: 18rem;" id="valorTotal">
            <style>
                #valorTotal{
                    font-size:20px;
                    font-weight:700;
                    font-stretch: normal;
                    float:right;
                    padding:10px;
                    
                }
            </style>
                Valor Total:R$ {{$valorTotal}}
            </div>
        </div>

        <div class="row mb-0 md-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="executaTimeLine()">
                    Gera time line grafico de gantt
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
                    ['Valor total', valor ],
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