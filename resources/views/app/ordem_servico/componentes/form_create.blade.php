<!----**************************************************************************************--->
<!----Grava -->
<!---*************************************************************************************----->
@if (isset($ordem_servico->id))
<form action="{{route('ordem-servico.store',['ordem_servico' => $ordem_servico->id]) }}" method="POST">
    @csrf
    @method('PUT')
    @else
    <form action="{{ route('ordem-servico.store') }}" method="POST">
        @csrf
        @endif
        <!------------------------------------------------------------------------------------------->
        <div class="form-row mb-0">
            <div class="col-md-2 mb-0">
                <label for="idOs" class="col-md-4 col-form-label text-md-end">ID Os</label>
                <input id="idOs" type="nuber" class="form-control-template" name="id" value="" require readonly>
                {{ $errors->has('id') ? $errors->first('id') : '' }}
            </div>
            <!--------------------------------------------------------------------------------------->
            <!---------Empresa------------->
            <!--------------------------------------------------------------------------------------->
            <div class="col-md-0 mb-0">
                <label for="empresa_id" class="col-md-4 col-form-label text-md-end">Id</label>
                <input id="empresa_id" type="text" class="form-control-template" name="empresa_id" value="@foreach($empresa as $empresas_f)
                    {{$empresas_f['id']}}
                    @endforeach" readonly>
                {{ $errors->has('empresa_id') ? $errors->first('empresa_id') : '' }}
            </div>
            <div class="col-md-7 mb-0">
                <label for="empresa" class="col-md-4 col-form-label text-md-end">Empresa</label>
                <input id="empresa" type="text" class="form-control-template" name="empresa" value="@foreach($empresa as $empresas_f)
                    {{$empresas_f['razao_social']}}
                    @endforeach" readonly>
                {{ $errors->has('empresa_id') ? $errors->first('empresa_id') : '' }}

            </div>
            <!------------------------------------------------------------------------------------------->
            <!---equipamento-->
            <!------------------------------------------------------------------------------------------->
            <div class="col-md-8 mb-0">
                <label for="equipamento_pai" class="col-md-4 col-form-label text-md-end">Equipamento/Patrimônio</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control-template">
                    <option value=""> --Selecione o equipamento--</option>
                    @foreach ($equipamentos as $equipment)
                    <option value="{{$equipment->id}}" {{($equipment->equipamento_id ?? old('equipamento_id')) == $equipment->id ? 'selected' : '' }}>
                        {{$equipment->nome}}
                    </option>
                    @endforeach
                </select>
                {{ $errors->has('equipamento_pai') ? $errors->first('equipamento_pai') : '' }}
            </div>
            <div class="col-md-2 mb-0">
                <label for="valor" class="col-md-6 col-form-label text-md-end">R$:</label>
                <input id="valor" name="valor" value="" input type="number" min="0.00" max="100000.00" step="00.01" placeholder="R$00,00" class="form-control-template">
            </div>
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
                <label for="dataPrevista">Data prevista</label>
                <input type="date" class="form-control" name="data_inicio" id="dataPrevista" placeholder="dataPrevista" required value="" onchange="ValidateDateFim()">
                <div class="invalid-tooltip">
                    Por favor, informe data.
                </div>
                <script>
                    function ValidateDatePrevista() {
                        let dataPrevista = document.getElementById('dataPrevista').value;
                        let dataEmissao = document.getElementById('data_emissao').value;
                        if (dataPrevista < dataEmissao) {
                            alert('A data prevista deve ser maior');
                            document.getElementById('dataPrevista').value = 'null';

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
                <label for="horaPrevista">Hora prevista</label>
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
            <div class="col-md-2 mb-0">
                <label for="situacao" class="">Sitaução</label>
                <select class="form-control" name="situacao" id="situacao" value="">
                    <option value="aberto">Aberto</option>
                    <option value="fechado">Fechado</option>
                    <option value="indefinido">Indefinido</option>
                    <option value="cancelada">Cancelada</option>
                    <option value="em andamento">Em andamento</option>
                </select>
                <div class="invalid-tooltip">
                    Por favor, informe situacao.
                </div>
            </div>

        </div>
        <!------------------------------------------------------------------------------------------->
        <!----Emissor e responsavel pela ordem de serviço-->
        <!------------------------------------------------------------------------------------------->
        <div class="form-row mb-0">
            <div class="col-md-6 mb-0">
                <label for="emissor" class="col-md-4 col-form-label text-md-end">Emissor</label>
                <select name="emissor" id="emissor" class="form-control-template">
                    <option value=""> --Selecione o emissor--</option>
                    @foreach ($funcionarios as $funcionario_find)
                    <option value="{{$funcionario_find->primeiro_nome}}" {{($funcionario_find->emissor ?? old('emissor')) == $funcionario_find->primeiro_nome ? 'selected' : '' }}>
                        {{$funcionario_find->primeiro_nome}}
                    </option>
                    @endforeach
                </select>
                {{ $errors->has('emissor') ? $errors->first('emissor') : '' }}
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
        </div>
        <div class="form-row mb-0">

            <div class="col-md-6 mb-0">
                <label for="responsavel" class="col-md-6 col-form-label text-md-end">Descrição</label>
                <input id="descricao" type="text" class="form-control-template" name="descricao" value="">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

            </div>
            <div class="col-md-6 mb-0">
                <label for="responsavel" class="col-md-6 col-form-label text-md-end">executado</label>
                <input id="executado" type="text" class="form-control-template" name="executado" value="">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>

        </div>
        <div class="form-row mb-0">

            <div class="col-md-4 mb-0">
                <label for="link_foto" class="col-md-4 col-form-label text-md-end">link foto</label>
                <input id="link_foto" type="text" class="form-control-template" name="link_foto" value="">
                {{ $errors->has('link_foto') ? $errors->first('link_foto') : '' }}

            </div>
            <div class="col-md-2 mb-0">
                <label for="status_servicos" class="col-md-4 col-form-label text-md-end">status %</label>
                <input id="status_servicos" type="text" class="form-control-template" name="status_servicos" value="">
                {{ $errors->has('status_servicos') ? $errors->first('status_servicos') : '' }}
            </div>

            <div class="col-md-2 mb-0">
                <label for="gravidade" class="col-md-4 col-form-label text-md-end">Gravidade</label>
                <select class="form-control" name="gravidade" id="gravidade" value="">
                    <option value="5">Extremamante grave</option>
                    <option value="4">Muito grave</option>
                    <option value="3">Grave</option>
                    <option value="2">Pouco grave</option>
                    <option value="1">Nada grave</option>
                </select>
                <div class="invalid-tooltip">
                    Por favor, informe a urgencia.
                </div>
            </div>

            <div class="col-md-2 mb-0">
                <label for="urgencia" class="col-md-4 col-form-label text-md-end">Urgência</label>
                <select class="form-control" name="urgencia" id="urgencia" value="">
                    <option value="5">Extremamante urgente</option>
                    <option value="4">Urgente</option>
                    <option value="3">Urgente se possível</option>
                    <option value="2">Pouco urgente</option>
                    <option value="1">Não urgente</option>
                </select>
                <div class="invalid-tooltip">
                    Por favor, informe a urgencia.
                </div>
            </div>
            <!---->
            <div class="col-md-2 mb-0">
                <label for="tendencia" class="col-md-4 col-form-label text-md-end">Tendência</label>
                <select class="form-control" name="tendencia" id="tendencia" value="">
                    <option value="5">Piorar rápidamante</option>
                    <option value="4">Piorar em curto prazo</option>
                    <option value="3">Piorar</option>
                    <option value="2">Piorar logo prazo</option>
                    <option value="1">Não irá piorar</option>
                </select>
                <div class="invalid-tooltip">
                    Por favor, informe a tendência.
                </div>
            </div>
            <!---->
            <hr>
            <div class="row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ isset($equipamento) ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </div>
            </div>
    </form>

    <script>
        $(function() {
            $('#equipamento_id').change(function() {
                var equipamento_id = $("#equipamento_id option:selected").val();
                $("#horimetro_inicial").val('');
                $.ajax({
                    url: "{{route('get-last-id-os')}}",
                    type: "get",
                    data: {
                        'id_os': equipamento_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        let newOs = response + 1;
                        $("#idOs").val(newOs);
                    }
                })

            });

        });
    </script>