@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div> Lista estoque de produtos</div>

        </div>
        <div class="card-body">
            <table class="table-template table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="th-title">Id</th>
                        <th scope="col" class="th-title">Produto id</th>
                        <th scope="col" class="th-title">Produto</th>
                        <th scope="col" class="th-title">Unid</th>
                        <th scope="col" class="th-title">Quantidade</th>
                        <th scope="col" class="th-title">Valor</th>
                        <th scope="col" class="th-title">estoque minimo</th>
                        <th scope="col" class="th-title">estoque máximo</th>
                        <th scope="col" class="th-title">Local</th>
                        <th scope="col" class="th-title">empresa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estoque_produtos as $estoque_produto)
                    <tr>
                        <th scope="row">{{ $estoque_produto->id }}</td>
                        <td>{{ $estoque_produto->produto->id}}</td>
                        <td>{{ $estoque_produto->produto->nome }}</td>
                        <td>{{ $estoque_produto->unidade_medida }}</td>
                        <td>{{ $estoque_produto->quantidade }}</td>
                        <td>{{ $estoque_produto->valor }}</td>
                        <td>{{ $estoque_produto->estoque_minimo }}</td>
                        <td>{{ $estoque_produto->estoque_maximo}}</td>
                        <td>{{ $estoque_produto->local}}</td>
                        <td>{{ $estoque_produto->empresa->nome_fantasia}}</td>

                        <td>
                            <a href="{{ route('entrada-produto.create',['produto' => $estoque_produto->produto->nome]) }}" class="btn-sm btn-success">

                                <i class="icofont-database-add"></i>
                                </span>
                                <span class="text">Inserir estoque</span>
                            </a>
                        </td>
                    </tr>



                    @endforeach

                </tbody>
            </table>


        </div>


    </div>


</main>
@endsection