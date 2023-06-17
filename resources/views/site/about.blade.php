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

        <div>
            <a class="nav-link" href="{{ route('site.about') }}"> sobre nós</a>
        </div>


    </div>
    <div id="div-body">


        <div class="font-30px">
            Missão <p></p>
            <div class="font-20px">
                <i class="icofont-eye-alt icofont-3x"></i>
                <p></p>
                “Proporcionar soluções inovadoras capaz de otimizar processos <p></p>
                de maneira eficiente, fornecendo os melhores procedimentos de aproveitamento de
                recursos, visando a sutentabilidade". <p></p>

            </div>
        </div>


        <div class="font-30px">
            Visão <p></p>
            <div class="font-20px">
                <i class="icofont-dart icofont-3x"></i>
                <p></p>
                “ser referência no setor de serviços para indústria, sempre em busca dos melhores resultados<p></p>
                trazendo satifação para stakeholders com produtos e serviços oferecidos, <p></p>
                buscar sempre os melhores resultados”.
            </div>
        </div>
        <div class="font-30px">
            Valores <p></p>
            <div class="font-20px">
                <i class="icofont-users-alt-3 icofont-3x"></i>
                <p></p>
                “Proporcionar assistência técnica de qualidade, visando<p></p>
                trazer segurança formando uma parceria com clientes parceiros e colaboradores, <p></p>
                proporcionando resultados duradouros pensado no curto médio e longo prazo”.
            </div>
        </div>

    </div>

</body>

<style>
    #div-topbar {
        position: relative;
        display: flex;
        flex-direction: row;
        height: 100px;
        width: 100%;
        background-color: rgb(211, 211, 211);
    }


    #div-body {
        height: 800px;
        width: 100%;
        color: white;
        text-align: center;
        /*background-image: url("/public/img/automação-industrial-1.jpg");*/
        background-repeat: no-repeat;
        background-color: rgb(71, 74, 81);
    }

    .font-30px {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 30px;
    }

    .font-20px {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 20px;
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
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
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
    }
</style>

</html>