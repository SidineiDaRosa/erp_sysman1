@if (isset($equipamento->id))
<form action="{{ route('Peca-equipamento.update', ['pecas_equipamento' => $pecas_equipamento->id]) }}" method="POST">
    @csrf
    @method('PUT')
    @else
    <form action="{{ route('Peca-equipamento.store') }}" method="POST">
        @csrf
        @endif
        <div class="row mb-1">
            <label for="equipamento_id" class="col-md-4 col-form-label text-md-end text-right">ID</label>
            <div class="col-md-6">
                <input id="equipamento" type="nuber" class="form-control-template" name="equipamento" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['id']}}
                    @endforeach" readonly>
                {{ $errors->has('equipamento') ? $errors->first('equipamento') : '' }}
            </div>
        </div>
        <div class="row mb-1">
            <label for="equipamento_id" class="col-md-4 col-form-label text-md-end text-right">ID</label>
            <div class="col-md-6">
                <input id="equipamento_nome" type="nuber" class="form-control-template" name="equipamento_nome" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['nome']}}
                    @endforeach" readonly>
                {{ $errors->has('id') ? $errors->first('id') : '' }}
            </div>
        </div>
      
        <div class="row mb-1">
            <label for="produtos" class="col-md-4 col-form-label text-md-end text-right">Produto</label>
            <div class="col-md-6">
                <select name="produto_id" id="" class="form-control">
                    <option value=""> --Selecione o Produto--</option>
                    @foreach ($produtos as $produto )
                    <option value="{{ $produto ->id}}" {{ ($produto ->nome ?? old('nome')) == $produto ->nome? 'selected' : '' }}>
                        {{ $produto ->nome }}
                    </option>
                    @endforeach
                </select>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="data" class="col-md-4 col-form-label text-md-end text-right">Data da ultima manutenção</label>
            <div class="col-md-6">
                <input name="data_substituicao" id="data_substituicao" type="date" class="form-control " value="">
                {{ $errors->has('data') ? $errors->first('data') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="data" class="col-md-4 col-form-label text-md-end text-right">hora da ultima manutenção</label>
            <div class="col-md-6">
                <input name="hora_substituicao" id="hora_substituicao" type="time" class="form-control " value="">
                {{ $errors->has('data') ? $errors->first('data') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="quantidade" class="col-md-4 col-form-label text-md-end text-right">quantidade</label>
            <div class="col-md-6">
                <input name="quantidade" id="quantidade" type="number" class="form-control " value="">
                {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="intervalo_manutencao" class="col-md-4 col-form-label text-md-end text-right">intervalo manutencao</label>
            <div class="col-md-6">
                <input name="intervalo_manutencao" id="intervalo_manutencao" type="number" class="form-control " value="">
                {{ $errors->has('intervalo_manutencao') ? $errors->first('intervalo_manutencao') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="status" class="col-md-4 col-form-label text-md-end text-right">Satatus</label>
            <div class="col-md-6">
                <input name="status" id="intervalo_manutencao" type="text" class="form-control " value="">
                {{ $errors->has('status') ? $errors->first('status') : '' }}
            </div>
        </div>
        <div class="row mb-3">
            <label for="link_peca" class="col-md-4 col-form-label text-md-end text-right">link_peca</label>
            <div class="col-md-6">
                <input name="link_peca" id="link_peca" type="text" class="form-control " value="">
                {{ $errors->has('link_peca') ? $errors->first('link_peca') : '' }}
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ isset($equipamento) ? 'Atualizar' : 'Cadastrar' }}
                </button>
            </div>
        </div>
    </form>