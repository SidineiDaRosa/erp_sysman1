@extends('app.layouts.app')
@section('content')
<script src="{{ asset('js/update_datatime.js') }}" defer></script>
<script src="{{ asset('js/timeline_google.js') }}" defer></script>
<main class="content">
    <div class="card">
        novo pedido de saida
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
            <div class="form-row">
                <div class="col-md-1">
                    <label for="data_inicio">Data emissão:</label>
                    <input type="date" class="form-control" name="data_emissao" id="data_emissao" placeholder="dataPrevista" value="" readonly>
                </div>
                <div class="col-md-1">
                    <label for="hora_inicio">Hora emissão:</label>
                    <input type="time" class="form-control" name="hora_emissao" id="hora_emissao" placeholder="horaPrevista" value="" readonly>
                </div>
                <div class="col-md-1">
                    <label for="dataFim">Data prevista:</label>
                    <input type="date" class="form-control" name="data_fim" id="dataFim" placeholder="dataFim" value="">
                </div>
                <div class="col-md-1">
                    <label for="horaFim">Hora Prevista:</label>
                    <input type="time" class="form-control" name="hora_fim" id="horaFim" placeholder="horaFim" value="">
                </div>
                <div class="col-md-6 mb-0">
                    <label for="emissor" class="">Emissor</label>
                    <select name="emissor" id="emissor" class="form-control-template">
                        <option value=""> --Selecione o emissor--</option>
                        @foreach ($funcionarios as $funcionario_find)
                        <option value="{{$funcionario_find->primeiro_nome}}" {{($funcionario_find->emissor ?? old('emissor')) == $funcionario_find->primeiro_nome ? 'selected' : '' }}>
                            {{$funcionario_find->primeiro_nome}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('emissor') ? $errors->first('emissor') : '' }}
                </div>
                <!----------------------------------->
                <div class="col-md-2 mb-0">
                    <label for="situacao" class="">Status:</label>
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
                <!---equipamento-->
                <!------------------------------------------------------------------------------------------->
                <div class="col-md-6 mb-0">
                    <label for="equipamento_pai" class="">Equipamento/Patrimônio</label>
                    <select name="equipamento_id" id="equipamento_id" class="form-control-template">
                        <option value=""> --Selecione o equipamento--</option>
                        @foreach ($equipamentos as $equipment)
                        <option value="{{$equipment->id}}" {{($equipment->equipamento_id ?? old('equipamento_id')) == $equipment->id ? 'selected' : '' }}>
                            {{$equipment->nome}}
                        </option>
                        @endforeach
                    </select>
                    {{ $errors->has('equipamento_pai') ? $errors->first('equipamento_pai') : '' }}
                </div>
                <!------------------------------------------------------------------------------------------->
                <!---cliente-->
                <!------------------------------------------------------------------------------------------->
                <div class="col-md-6 mb-0">
                <label for="cliente" class="">Cliente</label>
                    
                        <select name="cliente" id="" class="form-control">
                            <option value=""> --Selecione o fornecedor--</option>
                            @foreach ($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}" {{ ($fornecedor->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>
                                {{ $fornecedor->nome_fantasia }}
                            </option>
                            @endforeach
                        </select>
                        {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
                   
                </div>
                <div class="col-md-0">
                    <label for="btFiltrar" class="">adicionar produto</label>
                    <p>
                        <a href="" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="icofont-plus-circle"></i>
                            </span>
                            <span class="text">adicionar produto</span>
                        </a>
                </div>
                <div class="col-md-0">
                    <label for="btFiltrar" class="">atualizar</label>
                    <p>
                        <a href="" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="icofont-refresh"></i>
                            </span>
                            <span class="text">ataulizar</span>
                        </a>
                </div>

            </div>

        </div>
    </div>
    <div class="card-body">

        @endsection
        <footer>
        </footer>

        </html>