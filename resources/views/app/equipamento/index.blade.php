@extends('app.layouts.app')

@section('content')

<main class="content">
    <div>LISTAGEM DE EQUIPAMENTOS</div>
    <div class="card">
        <div class="card-header-template">

            <!--------------------------------------------->
            <div class="col-md-0">
                <label for="btFiltrar" class=""> Novo </label>
                <p>
                    <a href="{{ route('equipamento.create') }}" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="icofont-plus-circle"></i>
                        </span>
                        <span class="text">Novo equipamento</span>
                    </a>
            </div>
            <!--------------------------------------->
        </div>

        <div class="card-body">

            <table class="table-template table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Equipamento Pai</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Visualizar</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($equipamentos as $equipamento)
                    <tr>
                        <th scope="row">{{ $equipamento->id }}</td>
                        <td>{{ $equipamento->nome }}</td>
                        <td>{{ $equipamento->descricao }}</td>
                        <td>{{ $equipamento->marca->nome }}</td>
                        <td>{{ $equipamento->equip_pai->nome ?? '' }}</td>
                        <td>{{ $equipamento->Empresa->razao_social }}</td>
                        <td><a class="btn btn-sm-template btn-primary" href="{{ route('equipamento.show', ['equipamento' => $equipamento->id]) }}">Visualizar</a>
                        </td>
                        <td><a class="btn btn-sm-template btn-primary" href="{{ route('equipamento.edit', ['equipamento' => $equipamento->id]) }}">Editar</a>
                        </td>
                        <td>
                            <form id="form_{{ $equipamento->id }}" method="post" action="{{ route('equipamento.destroy', ['equipamento' => $equipamento->id]) }}">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-sm-template btn-danger" href="#" onclick="document.getElementById('form_{{ $equipamento->id }}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</main>
@endsection