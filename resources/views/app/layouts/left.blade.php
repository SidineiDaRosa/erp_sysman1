<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <script src="{{ asset('js/left.js') }}" defer></script>
    <title>Document</title>
</head>

</html>
<!--Classe principal do menu left-->

<aside class="sidebar" id="sidebarleft">
    <nav class="menu mt-3" id="">
        <!--Classe inicio das listas de menu-->
        <ul class="nav-list">
            <!--Menu home page-->
            <li class="nav-item">
                <a onclick="FunExpandMenuHome();">

                    <i class="icofont-institution"></i>&nbsp&nbsp&nbspHome
                    <i class="icofont-caret-down"></i>

                </a>
                <div class="sidebar-submenu-expanded" id="sidebar-submenu-expanded-home">
                    <a class="sidebar-submenu-expanded-a" href="{{route('empresas.index')}}">Matriz/Filiais consultas gerais</a><br>
                    
                    <hr>
                    <a class="sidebar-submenu-expanded-a" href="">Configuraçoes</a>
                </div>
            </li>
            <!--Menu marcas-->
            <li class="nav-item">
                <a onclick="FunExpandMenuMarcas();">
                    <i class="icofont-cc"></i>
                    &nbsp&nbspMarcas
                    <i class="icofont-caret-down"></i>
                </a>
                <div class="sidebar-submenu-expanded" id="sidebar-submenu-expanded-marcas">
                    <a class="sidebar-submenu-expanded-a" href="{{route('marca.index')}}">Busca Marcas</a><br>
                    <a class="sidebar-submenu-expanded-a" href="">Cadastro de marcas</a><br>
                    <hr>
                    <a class="sidebar-submenu-expanded-a" href="">Cadastro de grupo</a>
                </div>
            </li>
            <!--Menu recursos-->
            <li class="nav-item">
                <a onclick="FunExpandMenuRecursos();">
                    <i class="icofont-cubes"></i>
                    &nbsp&nbspRecursos
                    <i class="icofont-caret-down"></i>
                </a>
                <div class="sidebar-submenu-expanded" id="sidebar-submenu-expanded-recursos">
                    <a class="sidebar-submenu-expanded-a" href="{{route('produto.index')}}">Cadeia de
                        suprimentos</a><br>
                    <a class="sidebar-submenu-expanded-a" href="{{route('produto-fornecedor.create')}}">Por
                        fornecedor</a><br>
                    <hr>
                    <a class="sidebar-submenu-expanded-a" href="">Consulta estoque</a><br>
                    <a class="sidebar-submenu-expanded-a" href="{{route('entrada-produto.index')}}">Entrada de
                        produtos</a>
                    <a class="sidebar-submenu-expanded-a" href="{{route('fornecedor.index')}}">Fornecedores</a>
                    <hr>
                    <a class="sidebar-submenu-expanded-a" href="{{route('pedido-compra.index')}}">Pedido de compra</a>
                    <hr>
                    <a class="sidebar-submenu-expanded-a" href="{{route('pedido-saida.index')}}">Pedido de saída</a>
                </div>
            </li>
            <!--Menu Máquinas e equipamentos-->
            <li class="nav-item">
                <a href="#">
                    <a onclick="FunExpandMenuPeatrimonio();">
                        <i class="icofont-vehicle-trucktor"></i>
                        &nbsp&nbspPatrimônio
                        <i class="icofont-caret-down"></i>
                    </a>
                    <div class="sidebar-submenu-expanded" id="sidebar-submenu-expanded-patrimonio">
                        <a class="sidebar-submenu-expanded-a" href="{{route('equipamento.index')}}">&nbsp&nbspEquipamentos</a><br>
                        <a class="sidebar-submenu-expanded-a" href="{{ route('equipamento.create') }}">&nbsp&nbspCadastro de
                            equipamentos</a><br>
                        <hr>
                        <a class="sidebar-submenu-expanded-a" href="">Consulta manutenção</a><br>
                        <a class="sidebar-submenu-expanded-a" href="{{route('ordem-servico.index')}}">
                            <i class="icofont-repair"></i>
                            &nbsp&nbspOrdem de serviço</a><br>
                        <a class="sidebar-submenu-expanded-a" href="">
                            <i class="icofont-dashboard-web"></i>
                            &nbsp&nbspRelatórios</a><br>
                        <a class="sidebar-submenu-expanded-a" href="">
                            <i class="icofont-bars"></i>
                            &nbsp&nbspGráficos</a>
                    </div>
            </li>

            <li class="nav-item">
                <a href="#">
                    <a href="{{route('ordem-producao.index')}}">
                        <i class="icofont-industries-4"></i>
                        &nbsp&nbspProdução
                        <i class="icofont-caret-down"></i>

                    </a>
            </li>


            <li class="nav-item">
                <a href="{{route('register')}}">
                    <i class="icofont-users mr-2"></i>
                    &nbspUsuários
                    <i class="icofont-caret-down"></i>
                </a>
            </li>



    </nav>

</aside>