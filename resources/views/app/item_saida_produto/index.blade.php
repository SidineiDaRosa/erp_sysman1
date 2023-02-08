<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/comum.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <script src="{{ asset('js/date_time.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
</head>

<main class="content" id="main1">
    <div class="card">
        <div class="card-header-template">
            <div> Item saida de produto</div>


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
                        <td></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>


</main>