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
                        <th scope="col" class="th-title">Produto</th>
                        <th scope="col" class="th-title">Quantidade</th>
                        <th scope="col" class="th-title">empresa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estoque_produtos as $estoque_produto)
                    <tr>
                        <th scope="row">{{ $estoque_produto->id }}</td>
                        <td>{{ $estoque_produto->produto->nome }}</td>
                        <td>{{ $estoque_produto->quantidade }}</td>
                        <td>{{ $estoque_produto->empresa_id}}</td>
                    </tr>
                    </tr>

                    @endforeach

                </tbody>
            </table>


        </div>


    </div>


</main>
@endsection