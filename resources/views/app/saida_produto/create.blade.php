@extends('app.layouts.app')

@section('content')
    <main class="content">
        <div class="card">
            <div class="card-header-template">
                <div>Saída de Produtos</div>
                <div>
                    <a href="{{ route('Saida-produto.index') }}" class="btn btn-sm btn-primary">
                        LISTAGEM
                    </a>
                </div>
            </div>
            <div class="card-body">
                @component('app.saida_produto._components.form_create_edit', [
                    'produtos' => $produtos,
                    'estoque' => $estoque,
                    'pedido' => $pedido,
                    'equipamento_id' => $equipamento_id,
                    'pedido_saida_produtos'=>$pedido_saida_produtos
                    
                    ])
                @endcomponent
            </div>
        </div>

    </main>
@endsection
