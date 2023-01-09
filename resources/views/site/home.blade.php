<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/comum.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">

    <link rel="stylesheet" href="{{ asset('img') }}">
    <title>sysman8</title>

</head>

<body>
    <div id="div-topbar">

        <div>
            <a class="nav-link" href="{{ route('site.home') }}">
                <i class="icofont-home icofont-2x"></i>
            </a>
        </div>
        <div>
            <a class="nav-link" href="#"> Produtos e Serviços</a>
        </div>
        <div>
            <a class="nav-link" href="#">Downlodas</a>
        </div>

        <div>
            <a class="nav-link" target="_blank" href="https://webmail.sysman8.com.br/?_task=logout&_token=4m0BgjeEKoTjDuHVj7+FrWw8UTaffSeOHlw8MKJFMy4">Webmail</a>
        </div>
        <div>
            <a class="nav-link" href="{{ route('app.home') }}">Área restrita</a>
        </div>




    </div>
    <div id="div-body">
        <img class="d-block w-100" src="{{ asset('img/automação-industrial-1.jpg') }}" alt="imagem 1">

    </div>

</body>
<footer>
    <div id="footer_main">

        <div class="divt">
            </i><i class="icofont-automation icofont-5x"></i>
            <p></p>
            <label for="">Automação de máquinas</label>
            <p>
                <label for="">Manutenção programada</label>
            </p>
            <p>
                <label for="">Egenharia de processos</label>
            </p>
            <p>


        </div>
        <div class="divt">


            <i class="icofont-dart icofont-5x"></i>
            <p>
                <label for="">Acertividade</label>
            <p>
                <label for="">Acuracidade</label>
            <p>
                <label for="">Desenvolvimento de aplicações</label>
        </div>
        <div class="divt">

            <i class="icofont-help-robot icofont-5x"></i>
            <p></p>
            <label for="">Equipamentos</label>

        </div>
    </div>
</footer>
<style>
    #div-topbar {
        position: absolute;
        display: flex;
        flex-direction: row;
        height: 100px;
        width: 100%;
        text-align: justify;
        background-color: rgb(211, 211, 211);
    }


    #div-body {
        height: 100%;
        width: 100%;
        background-image: url("/public/img/automação-industrial-1.jpg");
        background-repeat: no-repeat;
    }

    footer {

        height: 300px;
        position: relative;

    }

    #footer_main {
        display: flex;
        flex-direction: row;
        height: auto;
        background-color: rgb(235, 227, 227);
        position: relative;
        align-items: center;
        text-align: center;
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif

    }

    .divt {
        height: 200px;
        width: 30%;
        margin: 1%;
        background-color: rgb(119, 147, 172);
        position: relative;
    }

    @media only screen and (max-width: 600px) {
        body {
            background-color: lightblue;


        }

        #div-topbar {
            display: flex;
            flex-direction: column;
            height: 100px;
            width: 100%;
            background-color: blueviolet;
        }

        #footer_main {
            display: flex;
            flex-direction: column;
            height: auto;
            background-color: rgb(245, 235, 235);
            position: relative;

        }

        .divt {
            height: 200px;
            width: 100%;
            padding: 10px;
            background-color: rgb(149, 175, 197);
            position: relative;
        }
</style>