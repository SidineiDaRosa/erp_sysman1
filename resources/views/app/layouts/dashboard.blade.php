@extends('app.layouts.app')
@section('titulo', 'Dashboard')
<main class="content">

    <div class="card">
        <div class="card-header">
            <p class="mb-0">Empresa</p>

        </div>
        <div class="card-body">
            <div class="d-flex m-2 justify-content-around">
                <span class="record">Empresa modelo</span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="???" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                <h1>Sysman8 </h1>
                <h2> sistema de cadastro de produtos e serviços</h2>

            </a>
        </div>
        <div class="cards-dashboard" id="cardsboard">
            <style>
                #cardsboard {
                    display:flexbox;
                    flex-direction:row;
                    height: 200px;
                    background-color: red;
                }
            </style>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <ul>
                    <li>Cadastro de ordens de serviço</li>
                    <li>Cadastro de empresas</li>
                    <li>Cadastro de equipamentos</li>
                </ul>
            </div>
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Manutenção</div>
                <ul>
                    <li>acertividade nas manuteçôes</li>

                    <i class="icofont-dart icofont-10x"></i>
                </ul>
            </div>
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Manutenção</div>
                <ul>
                    <li>acertividade nas manuteçôes</li>
                    </i><i class="icofont-automation icofont-10x"></i>
                </ul>
            </div>
        </div>
    </div>


</main>