<div class="col-md-2 mb-0">
    <label for="idOs" class="col-md-4 col-form-label text-md-end">ID Os</label>
    <input id="id1" type="nuber" class="form-control-template" name="id" value="{{$ordem_servico_id}}" disabled>
</div>

<!------------------------------------------------------------------------------------------->
<!----Datas-->
<!------------------------------------------------------------------------------------------->
<div class="form-row mb-0">
    <div class="col-md-2 mb-0">
        <label for="data_Emissao">Data emissao</label>
        <input type="date" class="form-control" id="data_emissao" name="data_emissao" placeholder="dataEmissao" value="" readonly>
        <div class="invalid-tooltip">
            informe a data
        </div>
    </div>
    <div class="col-md-2 mb-0">
        <label for="horaEmissao">Hora emissao</label>
        <input type="time" class="form-control" name=hora_emissao id="hora_emissao" placeholder="horaEmissao" required value="" readonly>
        <div class=" invalid-tooltip">
            Por favor, informe a hora.
        </div>
    </div>

    <div class="col-md-2 mb-0">
        <label for="dataPrevista">Data início</label>
        <input type="date" class="form-control" name="data_inicio" id="dataPrevista" placeholder="dataPrevista" required value="" onchange="ValidateDatePrevista()">
        <div class="invalid-tooltip">
            Por favor, informe data.
        </div>
        <script>
            function ValidateDatePrevista() {
                let dataPrevista = document.getElementById('dataPrevista').value;
                let dataEmissao = document.getElementById('data_emissao').value;
                if (dataPrevista < dataEmissao) {
                    alert('Atenção! A data prevista que você está inserindo é anterior a data de emissão.');
                    //document.getElementById('dataPrevista').value = 'null';

                }
            }

            function ValidateDateFim() {
                let dataPrevista = document.getElementById('dataPrevista').value;
                let dataFim = document.getElementById('dataFim').value;
                if (dataFim < dataPrevista) {
                    alert('Atenção! A data prevista deve ser maior que a data prevista para término.');
                    document.getElementById('dataFim').value = 'null';

                }
            }
        </script>
    </div>

    <div class="col-md-2 mb-0">
        <label for="horaPrevista">Hora início</label>
        <input type="time" class="form-control" name="hora_inicio" id="horaPrevista" placeholder="horaPrevista" required value="">
        <div class="invalid-tooltip">
            Por favor, informe hora.
        </div>
    </div>
</div>
<div class="form-row mb-0">
    <div class="col-md-2 mb-0">
        <label for="dataFim">Data fim</label>
        <input type="date" class="form-control" name="data_fim" id="dataFim" placeholder="dataFim" required value="" onchange="ValidateDateFim()">
        <div class="invalid-tooltip">
            Por favor, informe dataFim.
        </div>
    </div>

    <div class="col-md-2 mb-0">
        <label for="horaFim">Hora fim</label>
        <input type="time" class="form-control" name="hora_fim" id="horaFim" placeholder="horaFim" required value="">
        <div class="invalid-tooltip">
            Por favor, informe um estado válido.
        </div>
    </div>
    <div class="col-md-6 mb-0">
        <label for="responsavel" class="col-md-6 col-form-label text-md-end">executado</label>
        <input type="text" id="executado" type="text" class="form-control" name="executado" value="" rows="3">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    </div>
    <!-------------------------------------------------------------------------------------------->
    <!---Responsável ------------->
    <!-------------------------------------------------------------------------------------------->
    <div class="col-md-6 mb-0">
        <label for="responsavel" class="col-md-4 col-form-label text-md-end">Responsável</label>
        <select name="responsavel" id="responsavel" class="form-control-template">
            <option value=""> --Selecione o Responsável--</option>
            @foreach ($funcionarios as $funcionario_find)
            <option value="{{$funcionario_find->primeiro_nome}}" {{($funcionario_find->responsavel ?? old('responsavel')) == $funcionario_find->primeiro_nome ? 'selected' : '' }}>
                {{$funcionario_find->primeiro_nome}}
            </option>
            @endforeach
        </select>
        {{ $errors->has('responsavel') ? $errors->first('responsavel') : '' }}
    </div>
    <div class="row sm-3 mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Alterar ordem de serviço
            </button>
        </div>
    </div>