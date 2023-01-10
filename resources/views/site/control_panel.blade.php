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
        const element = document.getElementById("demo");
        setInterval(function() {
            element.innerHTML += "Hello"
            document.getElementById('busca').click();
           
            //btn.addEventListener("click", exibirMensagem);


        }, 1000);
    </script>
    <a id="busca" class="sidebar-submenu-expanded-a" href="{{route('control-panel.index')}}">Busca</a><br>
    <form id="form"action="{{route('control-panel.index')}}" method="get">
        @method('POST')
        @csrf
        <input id="btn1"type="submit" value="get" >
    </form>
  

</body>

</html>