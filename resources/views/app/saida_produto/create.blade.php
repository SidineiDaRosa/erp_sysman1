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
                    'patrimonios' => $patrimonios,
                    'estoque' => $estoque,
                    'pedido' => $pedido,
                    ])
                @endcomponent
            </div>
        </div>

    </main>
@endsection
