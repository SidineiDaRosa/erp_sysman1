@extends('app.layouts.app')
@section('content')
<script src="{{ asset('js/update_datatime.js') }}" defer></script>
<script src="{{ asset('js/timeline_google.js') }}" defer></script>
<main class="content">
    <div>
        Usuário:{{auth()->user()->name}}
    </div>
    <div class="card" hidden>

        <div class="card-body">
            <style>
                #tblOs {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    background-color: rgb(211, 211, 211);
                }

                thead {
                    background-color: rgb(169, 169, 169);
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

                tr:hover {
                    background-color: rgb(169, 169, 169);
                }
            </style>
            <table id="tblOs" hidden>
                <thead>
                    <tr>
                        <th scope="col" class="">ID</th>
                        <th scope="col" class="" hidden>Data emissao</th>
                        <th scope="col" class="" hidden>Hora</th>
                        <th scope="col" class="">Data prevista</th>
                        <th scope="col" class="">Hora prevista</th>
                        <th scope="col" class="">Data fim</th>
                        <th scope="col" class="">Hora fim</th>
                        <th scope="col" class="">Empresa</th>
                        <th scope="col" class="">Patrimônio</th>
                        <th scope="col" class="">Emissor</th>
                        <th scope="col" class="">Responsável</th>
                        <th scope="col" class="">Descrição</th>
                        <th scope="col" class="">Executado</th>
                        <th>link foto</th>
                        <th>Status</th>
                        <th>Valor</th>
                        <th>Operações</th>
                        <th>check</th>

                    </tr>
                </thead>
                @foreach ($ordens_servicos as $ordem_servico)
                <tbody>
                    <tr>
                        <td>{{ $ordem_servico->id }}</td>
                        <td hidden>{{ $ordem_servico->data_emissao }}</td>
                        <td hidden>{{ $ordem_servico->hora_emissao }}</td>
                        <td>{{ $ordem_servico->data_inicio }}</td>
                        <td>{{ $ordem_servico->hora_inicio }}</td>
                        <td>{{ $ordem_servico->data_fim }}</td>
                        <td>{{ $ordem_servico->hora_fim }}</td>
                        <td>

                            {{ $ordem_servico->Empresa->razao_social }}

                        </td>
                        <td>{{ $ordem_servico->equipamento->nome }}</td>
                        <td>{{ $ordem_servico->equipamento->id }}</td>
                        <td>{{ $ordem_servico->emissor }}</td>
                        <td>{{ $ordem_servico->responsavel }}</td>
                        <td id="descricao">

                            {{ $ordem_servico->descricao }}

                        </td>
                        <td>
                            {{ $ordem_servico->Executado }}

                        </td>

                        <td><a href="{{ $ordem_servico->link_foto }}" target="blank">link foto</a></td>
                        <td>{{ $ordem_servico->situacao }}
                            <div class="progress mb-3" role="progressbar" aria-label="Success example with label" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-warning">{{ $ordem_servico->status_servicos }}%
                                </div>
                            </div>
                        </td>
                        <td id="valor" value="{{ $ordem_servico->valor }}">{{ $ordem_servico->valor }}</td>
                        <!--Div operaçoes do registro da ordem des serviço-->
                        <td>
                            <div {{-- class="div-op" --}} class="btn-group btn-group-actions visible-on-hover">
                                <a class="btn btn-sm-template btn-outline-primary" href="{{ route('ordem-servico.show', ['ordem_servico' => $ordem_servico->id]) }}">
                                    <i class="icofont-eye-alt"></i>
                                </a>

                                <a class="btn btn-sm-template btn-outline-success  @can('user') disabled @endcan" href="{{ route('ordem-servico.edit', ['ordem_servico' => $ordem_servico->id]) }}">

                                    <i class="icofont-ui-edit"></i> </a>

                                <!--Condoçes para deletar a os-->
                                <form id="form_{{ $ordem_servico->id }}" method="post" action="{{ route('ordem-servico.destroy', ['ordem_servico' => $ordem_servico->id]) }}">
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

                                                document.getElementById('form_{{ $ordem_servico->id }}').submit()
                                            } else {
                                                x = "Você pressionou Cancelar!";
                                            }
                                            document.getElementById("demo").innerHTML = x;
                                        }
                                    </script>
                                </a>
                                <!------------------------------>

                            </div>
                        <td>
                            <div class="col-md-2 mb-0">
                                <input type="checkbox" name="" id="">
                            </div>
                        </td>

                    </tr>

                </tbody>
                @endforeach

            </table>
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!--------------------------------------------------------------------->
        <!--Código que gera o gáfico de pizza-->
        <!--------------------------------------------------------------------->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <table id="tabelaAgrupada" hidden>
        <caption>Tabela Agrupada</caption>
        <thead>
            <tr>
                <th>Nome do equipamento</th>
                <th>Id</th>
                <th>Quantidade de ordens geradas</th>
            </tr>
        </thead>
        <tbody id="corpoTabelaAgrupada">
            <!-- Aqui será preenchido dinamicamente com JavaScript -->
        </tbody>
    </table>
    <style>
        .container-chart {
            display: flex;
            height: 430px;
            width: 100%;
        }

        .item {
            flex: 1;
            border: 1px solid black;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            box-shadow: 10px;
            background-color: darkgrey;
        }

        #graficoPizza {
            background-color: transparent;
        }
    </style>
    <!--------------------------------------------------------------------->
    <!--Dashboard -->
    <!--------------------------------------------------------------------->
    <div class="container-chart">
        <div class="item">

            <!-- Onde o gráfico será exibido -->
            <div id="graficoPizza"></div>
        </div>
        <div class="item">
            <canvas id="myChart3"></canvas>
        </div>
        <div class="item">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <div class="container-chart">
        <div class="item">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">O.S NO PERIODO</div>
                <div class="card-header">{{ date( 'd-m-Y' , strtotime($data_inicio))}} até
                    {{ date( 'd-m-Y' , strtotime($data_fim))}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Abertas</h5>
                    {{$countos}} O.S
                    <hr>
                    <h5 class="card-title">Fechadas</h5>
                    {{$countos_fechado}} O.S
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">TOTAL ABERTA</div>
                <div class="card-body">
                    <h5 class="card-title">total Aberta</h5>
                    <p class="card-text">{{$total_aberto}}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">total Fechado</h5>
                    <p class="card-text">{{$total_fechado}}</p>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Titulo</h5>
                    <p class="card-text"></p>
                </div>
                <!--Exemplo de progressbar com um input texto-->
                <div class="progress">
                    <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <input type="text" id="progress-input">
                <script>
                    // Seleciona o elemento de entrada e a barra de progresso
                    var progressBar = document.getElementById('progress-bar');
                    var progressInput = document.getElementById('progress-input');
                    // Atualiza a largura da barra de progresso quando o valor do input é alterado
                    progressInput.addEventListener('input', function() {
                        var value = progressInput.value;
                        progressBar.style.width = value + '%';
                        progressBar.setAttribute('aria-valuenow', value);
                    });
                </script>
                <!--Fim Exemplo de progressbar com um input texto-->
            </div>
        </div>
        <script>
            //-------------------------------------------------------------------------------------------------------
            function VerTabela() {
                agruparNumerosIguais() //chama criar tabela
                table1 = document.getElementById("tblOs");
                let totalColumnsTbOs = (table1.rows.length);

                for (var i = 1; i < table1.rows.length; i++) {
                    let equipamentoId =
                        document.getElementById("tblOs").rows[i].cells[9].innerHTML;
                    //FunAjaxGetcontEquip()
                };
                if (i = totalColumnsTbOs) {}
            }
            //Funçoes em ajax
            //$(document).ready(function()
            function FunAjaxGetcontEquip(url, sidinei, sucessoCallback, erroCallback) {
                let valorInput = $("#os1").val(); //pega o valor do input
                let date1 = $("#date1").val(); //pega o valor do input
                let date2 = $("#date2").val(); //pega o valor do input
                var linha = $("#tblOs tr:eq(1)"); // Pega a segunda linha da tabela (índice 1)
                var equipamentoId = linha.find("td:eq(8)").text(); // Pega o texto da segunda célula (índice 1) da linha
                var dataInicio = linha.find("td:eq(1)").text(); // Pega o texto da terceira célula (índice 2) da linha
                var dataFim = linha.find("td:eq(3)").text(); // Pega o texto da terceira célula (índice 2) da linha

                // Exibe um alerta com os valores obtidos
                alert("esta fução busca e conta registros de equipaento nesta data-Equipamento id: " + equipamentoId +
                    "Datas: " + date1 + '...' + date2);
                $.ajax({

                    // url: "route('get-cont-os-equip'", // Substitua 'pagina.php' pelo URL da sua página de destino
                    type: "get", // Ou "GET" dependendo do tipo de requisição que você deseja fazer
                    data: {

                        parametro1: date1,
                        parametro2: date2,
                        parametro3: equipamentoId
                    }, // Se necessário, envie parâmetros para a página de destino
                    success: function(response) {
                        // Executa essa função quando a requisição for bem-sucedida
                        alert("Requisição bem-sucedida! Resposta: " +
                            response); // Mostra um alerta com a resposta da requisição
                        document.getElementById('os1').value = response;
                        // Alterando a cor de fundo do input
                        $("#os1").css("background-color", "#ff0000");
                    },
                    error: function(xhr, status, error) {
                        // Executa essa função se houver um erro na requisição
                        // alert("Ocorreu um erro na requisição: " + xhr.responseText); // Mostra um alerta com a mensagem de erro
                    }
                });
            };
        </script>
        </body>
</main>
@endsection

</html>

<script>
    //Cria uma tabela que agrupa os registros iguais e conta quantos registros iguais.
    function agruparNumerosIguais1() {
        var tabela = document.getElementById("tblOs");
        var numeros = {};

        for (var i = 1; i < tabela.rows.length; i++) {
            var nome = tabela.rows[i].cells[8].innerHTML;
            var numero = tabela.rows[i].cells[9].innerHTML;
            if (!numeros[nome]) {
                numeros[nome] = {};
            }
            if (!numeros[nome][numero]) {
                numeros[nome][numero] = 1;
            } else {
                numeros[nome][numero]++;
            }
        }

        var tabelaAgrupada = document.getElementById("tabelaAgrupada");
        var corpoTabelaAgrupada = document.getElementById("corpoTabelaAgrupada");
        corpoTabelaAgrupada.innerHTML = "";

        for (var nome in numeros) {
            for (var numero in numeros[nome]) {
                var row = corpoTabelaAgrupada.insertRow();
                var cellNome = row.insertCell(0);
                var cellNumero = row.insertCell(1);
                var cellQuantidade = row.insertCell(2);
                cellNome.innerHTML = nome;
                cellNumero.innerHTML = numero;
                cellQuantidade.innerHTML = numeros[nome][numero];

            }
        }
        // Criar gráfico de pizza
        // Obter os dados da tabela
        const table = document.getElementById('tabelaAgrupada');
        const rows = table.getElementsByTagName('tr');
        const data = {
            labels: [],
            values: []
        };

        // Iterar sobre as linhas da tabela e extrair os dados
        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            data.labels.push(cells[0].innerText);
            const value1 = parseInt(cells[0].innerText);
            const value2 = parseInt(cells[2].innerText);
            data.values.push(value1 + value2);
        }
        GeraGraficoPizza() //chama gerar gráfico pie chart google  após ter gerado a tebela agrupada
        GerarGráficoLinhas() //chama função para gerar gráfico de linhas após ter gerado a tabela agrupada
    }
    //Fim da função que gera tabela agrupada

    function GerarGráficoLinhas() {
        // Extrai os dados da tabela HTML
        const table = document.getElementById('tblOs');
        const data = Array.from(table.querySelectorAll('tbody tr')).map(row => {
            const cells = Array.from(row.cells);
            return {
                data: cells[1].textContent,
                gasto: parseFloat(cells[16].textContent)
            };
        });

        // Prepara os dados para o gráfico
        const labels = data.map(item => item.data);
        const dataset = {
            label: 'Gasto',
            data: data.map(item => item.gasto),
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
        };

        // Cria o gráfico de linhas
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [dataset]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
</body>

<script>
    //-------------------------------------------------------------------//
    //Evento so executa após ter carregado todo os elementos do Dom
    //-------------------------------------------------------------------//
    document.addEventListener('DOMContentLoaded', (event) => {
        agruparNumerosIguais1() //executa a função que gera uma tabela agrupada
        // Extrai os dados da tabela HTML
        //Gera um gráfico de barras apartir da biblioteca chart.js
        const table = document.getElementById('tblOs');
        const data = Array.from(table.querySelectorAll('tbody tr')).map(row => {
            const cells = Array.from(row.cells);
            return {
                data: cells[1].textContent,
                gasto: parseFloat(cells[16].textContent)
            };
        });

        // Prepara os dados para o gráfico
        const labels = data.map(item => item.data);
        const dataset = {
            label: 'Gasto',
            data: data.map(item => item.gasto),
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
        };

        // Cria o gráfico de barras
        const ctx = document.getElementById('myChart3').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Altera o tipo de gráfico para barras
            data: {
                labels: labels,
                datasets: [dataset]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })
    });
</script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Exemplo de Gráfico de Pizza com Google Charts</title>
    <!-- Importar a biblioteca do Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        //document.addEventListener("DOMContentLoaded", function() {
        function GeraGraficoPizza() {
            // Carregar a biblioteca de visualização e preparar para desenhar o gráfico
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(desenharGrafico);

            function desenharGrafico() {
                // Obter os dados da tabela
                var dadosTabela = [];
                var table = document.getElementById('tabelaAgrupada');
                var linhas = table.getElementsByTagName('tr');
                for (var i = 1; i < linhas.length; i++) { // Começar do índice 1 para pular a linha de cabeçalho
                    var celulas = linhas[i].getElementsByTagName('td');
                    if (celulas.length === 3) {
                        dadosTabela.push([celulas[0].textContent, parseFloat(celulas[2].textContent), parseFloat(celulas[1].textContent)]);
                    }
                }

                // Criar e preencher a DataTable
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Total de O.S');
                data.addColumn('number', 'Horas por Dia');
                data.addColumn('number', 'Outro Valor'); // Adicionar um terceiro valor
                data.addRows(dadosTabela);

                // Configurar as opções do gráfico
                var options = {
                    title: 'Total de O.S',
                    width: 500,
                    height: 380,
                    is3D: true,
                    backgroundColor: 'darkgrey',
                };

                // Instanciar e desenhar o gráfico, passando os dados e opções
                var chart = new google.visualization.PieChart(document.getElementById('graficoPizza'));
                chart.draw(data, options);
            }
            // }
        };
    </script>
</head>
<style>

</style>