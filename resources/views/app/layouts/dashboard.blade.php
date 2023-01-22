@extends('app.layouts.app')
@section('titulo', 'Dashboard')
<main class="content">

    <div class="card">
        <div class="card-header">


        </div>
        <div class="card-body">
            <div class="d-flex m-2 justify-content-around">
                <span class="record">sysman8-V1.0-2022</span>
            </div>
        </div>

    </div>
    <div>
        <a class="nav-link" href="{{ route('site.control_panel') }}"> Painel de controle</a>
        <label for="">Usuário logado no momento:</label>
        {{auth()->user()->name}}
    </div>

    <div class="" id="cardsboard">
        <style>
            #cardsboard {
                display: flex;
                flex-direction: row;
                height: auto;
                background-color: rgb(235, 227, 227);
                position: relative;
                align-items: center;
                text-align: center;

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

                #cardsboard {
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
        <div class="divt">
            </i><i class="icofont-automation icofont-5x"></i>
            <p></p>
            <label for="">Automação</label>
            <p>
                <label for="">Manutenção programada</label>

        </div>
        <div class="divt">


            <i class="icofont-dart icofont-5x"></i>
            <p></p>
            <label for="">Acertividade</label>
            <p>
                <label for="">Acuracidade</label>
        </div>
        <div class="divt">

            <i class="icofont-help-robot icofont-5x"></i>
            <p></p>
            <label for="">Equipamentos</label>

        </div>

    </div>
</main>