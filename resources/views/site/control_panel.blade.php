<!DOCTYPE html>
<html lang="en">

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
            //document.getElementById('busca').click();

            //btn.addEventListener("click", exibirMensagem);


        }, 5000);

        function calcula() {
            let dataInicial = document.getElementById('data_inicial').value
            //União da data e hora de início
            //let horaInicNew = new Date(dataInic + "T" + horaInic + "Z");
            let dataInicial1 = new Date(dataInicial);
        

            //dataTimeInic.setHours(horaInicNew.getHours() + 3);
            //dataTimeInic.setMonth(horaInicNew.getMonth() + 1);
            //inicio pega datas e hora
           // let anoInic = dataTimeInic.getUTCFullYear();
            //alert('ano:' + anoInic)
           // let mesInic = dataTimeInic.getUTCMonth();
            // alert('mes:' + mesInic)
            let ano=dataInicial1.getFullYear()
            let mes=dataInicial1.getMonth();
            let diaInic = dataInicial1.getDay();
            let horas = dataInicial1.getHours();

            //alert('dia:' + diaInic)
           // let horaInicial = dataTimeInic.getHours();
            //alert('horas:' + horaInicial)
           // let minutosInic = dataTimeInic.getUTCMinutes();
            //alert('minutos:' + minutosInic)
           // let segundosInic = dataTimeInic.getSeconds();
            //alert('segundos:' + segundosInic)

            alert(ano+"----"+mes+"----"+diaInic+"-----"+horas);
        }
    </script>
    <a id="busca" class="sidebar-submenu-expanded-a" href="{{route('control-panel.index')}}">Busca</a><br>
    <form id="form" action="{{route('control-panel.index')}}" method="get">
        @method('POST')
        @csrf
        <input id="btn1" type="submit" value="get">
    </form>
    <input type="date" id="data_inicial">
    <input type="button" value="Calcular dias" onclick="calcula()">

</body>

</html>