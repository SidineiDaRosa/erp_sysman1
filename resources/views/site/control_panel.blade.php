<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle

    </title>
</head>

<body onload="checkCookies()">
    <h1>Painel de controle</h1>

    <p id="demo"></p>
    <script>
        let data_atual = new Date();
        var dia = String(data_atual.getDate()).padStart(2, '0');
        var mes = String(data_atual.getMonth() + 1).padStart(2, '0');
        var ano = data_atual.getFullYear();
        data_atual = ano + '-' + mes + '-' + dia;
        const element = document.getElementById("demo");
        setInterval(function() {
            //element.innerHTML += "Hello"
            document.getElementById('busca').click();
            document.getElementById('timer_interval').value = 0;
            // btn.addEventListener("click", exibirMensagem);

        }, 60000);

        function calcula() {
            //formata datas pegando ano dias mes e hora
            let data_inicial3 = document.getElementById('data_inicial').value
            let data_atual = new Date()
            let dataInicial = new Date(data_inicial)
            let ano = dataInicial.getFullYear()
            let dia = dataInicial.getDate()
            let hora = dataInicial.getHours()
            let dia_atual = data_atual.getDate()
            ///https://www.treinaweb.com.br/blog/trabalhando-com-data-no-javascript?gclid=Cj0KCQiAtvSdBhD0ARIsAPf8oNmQO6WInMUWZ5oZB094L6ktEKAh_wAv4L39MlFsYgtnUIvffNkShuwaAtA4EALw_wcB

        }
        setInterval(function() {
            document.getElementById('timer').value = new Date()
            let interval = document.getElementById('timer_interval').value
            interval1 = (interval++)
            document.getElementById('timer_interval').value = interval1 + 1;
            //document.getElementById('timer_interval').value = interval1

        }, 1000);
    </script>
    <style>
        #timer {
            height: 50px;
            width: auto;
            font-size: 30px;
            float: right;
            background: none;
            border: none;
        }

        #timer_interval {
            height: 50px;
            width: auto;
            font-size: 30px;
            background: none;
            border: none;

        }

        body {
            background-color: rgb(211, 211, 211);
        }
    </style>
    <input type="text" id="timer" readonly>
    <p></p>
    <h3>Tempo setado em 60s para atualização dos registros</h3>
    <input type="number" id="timer_interval" readonly>
    <p></p>
    <a id="busca" class="sidebar-submenu-expanded-a" href="{{route('control-panel.index')}}">Busca</a><br>
    <form id="form" action="{{route('control-panel.index')}}" method="get">
        @method('POST')
        @csrf
        <input id="btn1" type="submit" value="get">
    </form>
    <input type="button" value="Força atualização do intervalo de manutenção" onclick="PegaDataHoraPhp()">
    <script>
        function PegaDataHoraPhp() {
            document.getElementById('busca').click();
        }
    </script>
    <hr>
    <style>
        .divtxt {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: blue;
            font-size: 20px;
        }
    </style>
  {{$ordens_servicos}}
</body>

</html>