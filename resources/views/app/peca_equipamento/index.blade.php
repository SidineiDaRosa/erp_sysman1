@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">

        <div class="form-row mb-2">

            <div class="col-md-2 mb-0">
                <label for="equipamento_id" class="col-md-2 col-form-label text-md-end">ID</label>
                <input id="equipamento_id" type="nuber" class="form-control-template" name="equipamento_id" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['id']}}
                    @endforeach" readonly>
                {{ $errors->has('id') ? $errors->first('id') : '' }}

            </div>
            <div class="col-md-4 mb-0">
                <label for="equipamento" class="col-md-4 col-form-label text-md-end">Nome equipamento</label>
                <input id="equipamento" type="nuber" class="form-control-template" name="equipamento" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['nome']}}
                    @endforeach" readonly>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

            </div>
            <div class="col-md-4 mb-0">
                <label for="equipamento" class="col-md-4 col-form-label text-md-end"></label><p><p>
                <a href="{{ route('Peca-equipamento.create',['equipamento' => $equipamento_f->id]) }}" class="btn btn-sm btn-primary">
                    Cadastrar peça do equipamento
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table-template table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">equipamento</th>
                    <th scope="col">produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Link</th>
                    <th scope="col">intervalo</th>
                    <th scope="col">data ultima substituação</th>
                    <th scope="col">Hora</th>
                    <th scope="col">data proxima</th>
                    <th scope="col">horas proxima</th>
                    <th scope="col">horimetro</th>
                    <th scope="col">status</th>
                    <th scope="col">Operaçoes</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pecas_equipamento as $peca_equipamento)
                <tr>
                    <td scope="row">{{ $peca_equipamento->id }}</td>
                    <td>{{ $peca_equipamento->equipamento}}</td>
                    <td>{{ $peca_equipamento->produto_id}}</td>
                    <td>{{ $peca_equipamento->quantidade}}</td>
                    <td>{{ $peca_equipamento->link_peca}}</td>
                    <td>{{ $peca_equipamento->intervalo_manutencao}}</td>
                    <td>{{ $peca_equipamento->data_substituicao}}</td>
                    <td>{{ $peca_equipamento->hora_substituicao}}</td>
                    <td>{{ $peca_equipamento->data_proxima_substituicao}}</td>
                    <td>{{ $peca_equipamento->horas_proxima_substituicao}}</td>
                    <td>{{ $peca_equipamento->horimetro}}</td>
                    <td>{{ $peca_equipamento->status}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>


    </div>


    </div>


</main>
@endsection