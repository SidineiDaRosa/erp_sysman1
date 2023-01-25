@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>Estoque de Produtos</div>
            <div>
                <a href="{{ route('entrada-produto.index') }}" class="btn btn-sm btn-primary">
                    LISTAGEM
                </a>
            </div>
        </div>

        <div class="card-body">
            @component('app.estoque_produto._components.form_create_edit', [
            'produtos' => $produtos,
            'fornecedores'=>$fornecedores,'empresa'=>$empresa,'unidade_medida '=>$unidade_medida 
            ])
            @endcomponent
        </div>
    </div>

</main>
@endsection