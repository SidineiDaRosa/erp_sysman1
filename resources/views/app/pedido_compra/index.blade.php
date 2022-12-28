@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div> Pedidos de compra lista</div>
            <div>
                <a href="" class="btn btn-sm btn-primary">
                    Lista
                </a>

            </div>

        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="th-title">Id</th>
                        <th scope="col" class="th-title">Data emissão</th>
                        <th scope="col" class="th-title">hora emissão</th>
                        <th scope="col" class="th-title">Data prevista</th>
                        <th scope="col" class="th-title">hora prevista</th>
                        <th scope="col" class="th-title">Equipamento</th>
                        <th scope="col" class="th-title">status</th>
                        <th scope="col" class="th-title">Emissor</th>
                        <th scope="col" class="th-title">operaçoes</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos_compra as $pedido_compra)
                    <tr>
                        <th scope="row">{{ $pedido_compra->id }}</td>
                        <td>{{ $pedido_compra->data_emissao }}</td>
                        <td>{{ $pedido_compra->hora_emissao }}</td>
                        <td>{{ $pedido_compra->data_prevista}}</td>
                        <td>{{ $pedido_compra->hora_prevista}}</td>
                        <td>{{ $pedido_compra->equipamento->nome}}</td>
                        <td>{{ $pedido_compra->funcionarios->primeiro_nome}}</td>
                        <td>{{ $pedido_compra->status}}</td>
                        <td>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</main>
@endsection