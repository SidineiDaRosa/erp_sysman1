@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div> Lista entrada de produtos</div>
            <div>
                <a href="{{ route('produto.index') }}" class="btn btn-sm btn-primary">
                    Lista de produtos
                </a>

            </div>

        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="th-title">Id</th>
                        <th scope="col" class="th-title">Produto Id</th>
                        <th scope="col" class="th-title">Produto</th>
                        <th scope="col" class="th-title">Quantidade</th>
                        <th scope="col" class="th-title">Valor</th>
                        <th scope="col" class="th-title">Data</th>
                        <th scope="col" class="th-title">Fornecedor</th>
                        <th scope="col" class="th-title">Operações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($entradas_produtos as $entrada_produto)
                    <tr>
                        <th scope="row">{{ $entrada_produto->id }}</td>
                        <td>{{ $entrada_produto->produto->id }}</td>
                        <td>{{ $entrada_produto->produto->nome }}</td>
                        <td>{{ $entrada_produto->quantidade }}</td>
                        <td>{{ $entrada_produto->valor }}</td>
                        <td>{{ $entrada_produto->data}}</td>
                        <td>{{ $entrada_produto->Fornecedor->nome_fantasia}}</td>
                        <td>
                            <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">
                                <a class="btn btn-sm-template btn-outline-primary" href="{{ route('entrada-produto.show', ['entrada_produto' => $entrada_produto->id]) }}">
                                    <i class="icofont-eye-alt"></i>
                                </a>
                                <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="{{ route('entrada-produto.edit', ['entrada_produto' => $entrada_produto->id]) }}">

                                    <i class="icofont-ui-edit"></i> </a>
                                <form id="form_{{$entrada_produto->id }}" method="post" action="{{ route('entrada-produto.destroy', ['entrada_produto' => $entrada_produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-sm-template btn-outline-danger @can('user') disabled @endcan" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('form_{{ $entrada_produto->id }}').submit()">
                                        <i class="icofont-ui-delete"></i>
                                    </a>
                                </form>
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