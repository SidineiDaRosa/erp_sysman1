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

<body id="body-home">
    <style>
        #body-home {
            align-items: center;
            align-content: center;
            text-align: center;
            background-image: url("paisagem-natural-floresta.webp");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <div id="div-topbar">

        <div>
            <a class="nav-link" href="{{ route('site.home') }}">
                <i class="icofont-home icofont-2x"></i>
            </a>
        </div>
        <div>
            <a id="div-produtos-servicos" class="nav-link" href="{{'e-comerce-show-produto'}}">Produtos e Serviços</a>

            <div id="div-produtos-1"></div>

            <style>
                #div-produtos-servicos:hover {
                    height: 400px;
                    background-color: rgb(215, 219, 221);
                    transition-delay: 0.5s;
                    transition-duration: 3s;
                    text-align: center;

                }
            </style>
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
        <article>
            Soluçoes em produtos e serviços.
            <a href="https://dolarhoje.com/" class="dolar-hoje-button" data-currency="dolar" target="_blank" title="Cotação do Dólar Hoje">Dólar Hoje</a>
            <script async src="//dolarhoje-widgets.s3.amazonaws.com/button.js"></script>
        </article>
        <div id="footer_main">

            <div class="continer-card-pecas" id="peca1">
                <label for="">Programação de clps</label>
                <p>
            </div>
            <div class="continer-card-pecas" id="peca2">

                <label for="">Acertividade</label>

            </div>
            <div class="continer-card-pecas" id="peca3">
                <label for="">Equipamentos</label>
            </div>
        </div>
    </div>
    <style>
        #cotiner-card-pecas {
            display: flex;
            flex-direction: row;
            height: auto;
            background-color: rgb(235, 227, 227);
            position: relative;
            align-items: center;
            text-align: center;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        .continer-card-pecas {
            height: 400px;
            width: 33%;
            margin: 1%;
            background-color: rgb(119, 147, 172);
            position: relative;
        }

        #peca1 {
            background-image: url("{{ asset('img/clps.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            text-align: center;
            object-fit: fill;

        }

        #peca2 {
            background-image: url("{{ asset('img/consertos.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            text-align: center;

        }

        #peca3 {
            background-image: url("{{ asset('img/disjuntor.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            text-align: center;
            object-fit: cover;
        }
    </style>
    <!----------------------------------------------------------------------------------------->


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
        position: relative;
        display: flex;
        flex-direction: row;
        height: 100px;
        width: 100%;
        background-color: rgb(211, 211, 211);
    }

    /*Configurações da div de fundo*/
    #div-body {
        height: 700px;
        width: 100%;
        background-image: url("{{ asset('img/automação-industrial-1.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        text-align: center;

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