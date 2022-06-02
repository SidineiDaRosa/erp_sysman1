@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>VISUALIZAR EQUIPAMENTO</div>
            <diV>
                <a class="btn btn-sm btn-primary" href="{{route('equipamento.index')}}" class="btn">
                    LISTAGEM
                </a>
    
                <a class="btn btn-sm btn-primary" href="{{route('equipamento.create')}}" class="btn">
                    NOVA MARCA
                </a>
            </div>
        </div>
        
        
        <div class="card-body">
           
                 
                        ID:
                        {{$equipamento->id}}<p></p>
                    
                        Nome:
                        {{$equipamento->nome}}<p></p>
                    
                        DESCRIÇÂO:
                        {{$equipamento->descricao}}<p></p>
                   
                        MARCA:
                        {{$equipamento->marca->nome}}<p></p>
                   
                        Empresa:
                        {{$equipamento->Empresa->razao_social}}<p></p>

                        Data de fabricação:
                        {{$equipamento->data_fabricacao}}<p></p>
                        
                  
            
        </div>

        </div>
    </div>

</main>

@endsection






