@extends('app.layouts.app')

@section('content')
<main class="content">
    <div class="card">
        <style>
            .card {
                background-color: rgb(211, 211, 211);
            }

            #equipamento_id {
                font-size: 20px;
            }
        </style>
        <div class="form-row mb-2">

            <div class="col-md-2 mb-0">
                <label for="equipamento_id" class="col-md-2 col-form-label text-bg">ID</label>
                <input id="equipamento_id" type="nuber" class="form-control-template" name="equipamento_id" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['id']}}
                    @endforeach" readonly>
                {{ $errors->has('id') ? $errors->first('id') : '' }}

            </div>
            <div class="col-md-4 mb-0 ">
                <label for="equipamento" class="col-md-4 col-form-label text-md-end">Nome do equipamento</label>
                <input id="equipamento" type="nuber" class="form-control-template text-bg-end" name="equipamento" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['nome']}}
                    @endforeach" readonly>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>
            <div class="col-md-4 mb-0">
                <label for="descricao" class="col-md-2 col-form-label text-bg">Descrição</label>
                <input id="descricao" type="nuber" class="form-control-template" name="descricao" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['descricao']}}
                    @endforeach" readonly>
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

            </div>
            <div class="col-md-6 mb-0">
                <label for="data_fabricacao" class="col-md-2 col-form-label text-bg">Data Fabricação</label>
                <input id="data_fabricacao" type="nuber" class="form-control-template md-2" name="data_fabricacao" value="@foreach($equipamento as $equipamento_f)
                    {{$equipamento_f['data_fabricacao']}}
                    @endforeach" readonly>
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

            </div>
            <p></p>
            <div class="col-md-4 mb-0">
                <label for="equipamento" class="col-md-4 col-form-label text-md-end"></label>
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
                    <th scope="col">Produto Id</th>
                    <th scope="col">Produto</th>
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
                    <td>{{ $equipamento_f->nome}}</td>
                    <td>{{ $peca_equipamento->produto->id}} <a class="btn btn-sm-template btn-outline-primary" href="">

                            <i class="icofont-search-2"></i>
                        </a>
                    </td>
                    <td>{{ $peca_equipamento->produto->nome}}</td>
                    <td>{{ $peca_equipamento->quantidade}}</td>
                    <td>{{ $peca_equipamento->link_peca}}</td>
                    <td>{{ $peca_equipamento->intervalo_manutencao}}</td>
                    <td>{{ $peca_equipamento->data_substituicao}}</td>
                    <td>{{ $peca_equipamento->hora_substituicao}}</td>
                    <td>{{ $peca_equipamento->data_proxima_manutencao}}</td>
                    <td>{{ $peca_equipamento->horas_proxima_manutencao}}</td>
                    <td>{{ $peca_equipamento->horimetro}}</td>
                    <td>{{ $peca_equipamento->status}}</td>
                    <!--Div operaçoes do registro da ordem des serviço-->
                    <td>
                        <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">
                            <a class="btn btn-sm-template btn-outline-primary" href="">
                                <i class="icofont-eye-alt"></i>
                            </a>
                            <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="">
                                <i class="icofont-ui-edit"></i> </a>
                            <!--Condoçes para deletar a os-->
                            <form id="" method="post" action="">
                                @method('DELETE')
                                @csrf
                            </form>
                            <a class="btn btn-sm-template btn-outline-danger @can('user') disabled @endcan" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick=" DeletarOs()">
                                <i class="icofont-ui-delete"></i>
                                <script>
                                    function DeletarOs() {
                                        var x;
                                        var r = confirm("Deseja deletar a ordem de serviço?");
                                        if (r == true) {

                                            // document.getElementById('').submit()
                                        } else {
                                            x = "Você pressionou Cancelar!";
                                        }
                                        document.getElementById("demo").innerHTML = x;
                                    }
                                </script>
                            </a>
                            <!------------------------------>



                        </div>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card">
            Ordens de serviços abertos


            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td,
                th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }
            </style>
            <table>
                @foreach ($ordens_servicos as $ordem_servico_f)
                <tr>
                    <th>id</th>
                    <th>Data</th>
                    <th>Descrição</th>

                </tr>
                <tr>
                    <td>{{$ordem_servico_f}}</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                </tr>
            </table>
            @endforeach
        </div>

</main>
@endsection