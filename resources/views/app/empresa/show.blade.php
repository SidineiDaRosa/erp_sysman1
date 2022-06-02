@extends('app.layouts.app')

@section('titulo', 'Empresa')

@section('content')

<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>Visualizar Empresa</div>
            <div>
                <a href="{{ route('empresas.index') }}" class="btn btn-primary btn-sm">
                    LISTAGEM
                </a>
            </div>
        </div>
        <div class="card-body">
            ID:
            {{ $empresa->id }}
            <p></p>

            Razão Social:
            {{ $empresa->razao_social }}
            <p></p>
            Nome fantasia:
            {{ $empresa->nome_fantasia }}
            <p></p>
            Endereço:
            {{ $empresa->endereco }}



        </div>

    </div>


</main>

@endsection