@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div> Pedidos de saida</div>
            <div>

                <a href="{{route('pedido-saida.create')}}" class="btn-sm btn-success">

                    <i class="icofont-database-add"></i>
                    </span>
                    <span class="text">Criar novo pedido de saída</span>
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
                    @foreach ($pedidos_saida as $pedido_saida)
                    <tr>
                        <th scope="row">{{ $pedido_saida->id }}</td>
                        <td>{{ $pedido_saida->data_emissao }}</td>
                        <td>{{ $pedido_saida->hora_emissao }}</td>
                        <td>{{ $pedido_saida->data_prevista}}</td>
                        <td>{{ $pedido_saida->hora_prevista}}</td>
                        <td>{{ $pedido_saida->equipamento->nome}}</td>
                        <td>{{ $pedido_saida->funcionarios->primeiro_nome}}</td>
                        <td>{{ $pedido_saida->status}}</td>

                        <td>
                            <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">


                                <a class=" btn btn-sm-template btn-outline-primary" href="{{route('pedido-saida.show', ['pedido_saida'=>$pedido_saida->id])}}">

                                    <i class="icofont-eye-alt"></i>
                                </a>

                                <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="{{route('pedido-saida-lista.index', ['pedido_saida'=>$pedido_saida->id])}}">
                                    <i class="icofont-list"></i>
                                    <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="{{route('pedido-saida.edit', ['pedido_saida'=>$pedido_saida->id])}}">
                                        <i class="icofont-ui-edit"></i> </a>
                                    <!--Condioçes para deletar a os-->
                                    <form id="form_{{$pedido_saida->id }}" method="post" action="{{route('pedido-saida.destroy', [$pedido_saida->id])}}">
                                        @method('POST')
                                        @csrf

                                    </form>
                                    <a class="btn btn-sm-template btn-outline-danger @can('user') disabled @endcan" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick=" DeletarPedidoSaida()">
                                        <i class="icofont-ui-delete"></i>
                                        <script>
                                            function DeletarPedidoSaida() {
                                                var x;
                                                var r = confirm("Deseja deletar a pedido de saida?");
                                                if (r == true) {

                                                    document.getElementById('form_header{{$pedido_saida->id }}').submit()
                                                } else {
                                                    x = "Você pressionou Cancelar!";
                                                }
                                                document.getElementById("demo").innerHTML = x;
                                            }

                                            function PedidosSaidaHeader() {
                                                var x;
                                                var r = confirm(" Pedido de saida header?");
                                                if (r == true) {

                                                    document.getElementById('form_header{{$pedido_saida->id }}').submit()
                                                } else {
                                                    x = "Você pressionou Cancelar!";
                                                }
                                                document.getElementById("demo").innerHTML = x;
                                            }
                                        </script>
                                    </a>
                                    <!------------------------------>
                            </div>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

</main>
@endsection