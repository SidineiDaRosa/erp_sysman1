@extends('app.layouts.app')

@section('titulo', 'Marcas')

@section('content')

<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>Listagem de Empresas</div>
            <form action="{{'Empresas-filtro'}}" method="POST">
                @csrf

                <div class="col-md-6 mb-0">
                    <input type="text" name="empresa1">
                </div>
                <!--------------------------------------------->
                <div class="col-md-0">

                    <input type="submit" class="btn btn-info btn-icon-split" value="Filtrar">

                    <span class="icon text-white-50">
                        <i class="icofont-filter"></i>
                    </span>
                    <span class="text"></span>
                    </input>
                </div>
            </form>
            <div>
                <a href="" class="btn btn-primary btn-sm">
                    Nova empresa
                </a>
            </div>
        </div>


        <div class="card-body">
            <table class="table-template table-hover table-striped table-bordered">
                <thead class="bg-active">
                    <tr>
                        <th scope="col" class="th-title">Id</th>
                        <th scope="col" class="th-title">Razão social</th>
                        <th scope="col" class="th-title">Nome fantasia</th>
                        <th scope="col" class="th-title">Cnpj</th>
                        <th scope="col" class="th-title">Inscrição estadual</th>
                        <th scope="col" class="th-title">Endereço</th>
                        <th scope="col" class="th-title">Bairro</th>
                        <th scope="col" class="th-title">Cidade</th>
                        <th scope="col" class="th-title">Visualisar</th>
                        <th scope="col" class="th-title">Editar</th>
                        <th scope="col" class="th-title">Nova ordem</th>
                        <th scope="col" class="th-title">Busca equipamentos</th>
                        <th scope="col" class="th-title">Site</th>
                        <th scope="col" class="th-title">Segmento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                    <tr>

                        <th scope="row">{{ $empresa->id }}</th>
                        <td>{{ $empresa->razao_social }}</td>
                        <td>{{ $empresa->nome_fantasia }}</td>
                        <td>{{ $empresa->cnpj }}</td>
                        <td>{{ $empresa->insc_estadual }}</td>
                        <td>{{ $empresa->endereco}}</td>
                        <td>{{ $empresa->bairro}}</td>
                        <td>{{ $empresa->cidade}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm"
                                href="{{route('empresas.show', ['empresa'=>$empresa->id])}}">Visualizar</a>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="">Editar</a>
                        </td>
                        <td>
                            <div class="col-sm-0">
                                <a href="{{route('ordem-servico.create', ['empresa'=>$empresa->id])}}"
                                    class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="icofont-plus-circle"></i>
                                    </span>
                                    <span class="text">Nova ordem</span>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-0">
                                <a href="{{route('equipamento.index', ['empresa'=>$empresa->id])}}"
                                    class="btn  btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="icofont-plus-circle"></i>
                                    </span>
                                    <span class="text">Busca Equipamentos</span>
                                </a>
                            </div>
                        </td>
                        @csrf
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</main>

@endsection