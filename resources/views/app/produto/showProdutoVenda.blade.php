@extends('app.layouts.app')

@section('titulo', 'Produtos')

@section('content')

<main class="content">
    <div class="card">
        <div class="card-header-template">
            <div>Visualizar Produto venda</div>
            <div>
                <a href="{{ route('produto.index') }}" class="btn btn-sm btn-primary">
                    Lista de produtos para visualização
                </a>
            </div>
        </div>
        <div class="card-body">
            <!--  div dos fotos-->
            <div class="carousel-container">
                <div class="carousel-images">
                    <img src="/img/produtos/{{ $produto->image}}" alt="Imagem 1">
                    <img src="/img/produtos/{{ $produto->image2}}" alt="Imagem 2">
                    <img src="/img/produtos/{{ $produto->image3}}" alt="Imagem 3">
                    <!-- Adicione mais imagens conforme necessário -->
                </div>
                <div class="carousel-preview">
                    <img src="/img/produtos/{{ $produto->image}}" alt="imagem" class="preview-image">
                    <img src="/img/produtos/{{ $produto->image2}}" alt="imagem" class="preview-image">
                    <img src="/img/produtos/{{ $produto->image3}}" alt="imagem" class="preview-image">
                    <!-- Adicione mais imagens conforme necessário -->
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const carouselImages = document.querySelector('.carousel-images');
                    const previewImages = document.querySelectorAll('.preview-image');

                    previewImages.forEach((preview, index) => {
                        preview.addEventListener('click', () => {
                            carouselImages.style.transform = `translateX(-${index * 100}%)`;
                        });
                    });
                });
            </script>
            <style>
                .carousel-container {
                    max-width: 600px;
                    margin: 0 auto;
                    overflow: hidden;
                    float: left;
                    margin-left:100px;
                }

                .carousel-images {
                    display: flex;
                    transition: transform 0.5s ease;
                }

                .carousel-images img {
                    width: 100%;
                    height: auto;
                    object-fit: cover;
                }

                .carousel-preview {
                    display: flex;
                    justify-content: center;
                    margin-top: 10px;
                }

                .preview-image {
                    width: 50px;
                    height: 50px;
                    object-fit: cover;
                    margin: 0 5px;
                    cursor: pointer;
                }

                .preview-image:hover {
                    border: 2px solid blue;
                }
            </style>
            <!--  div dos dados do produto-->
            <style>
                #dados-tec {
                    height: 500px;
                    width: 500px;
                    float: right;
                
                    margin-right:100px;
                }
            </style>
            <div id="dados-tec">
                <h6>ID:</h6>{{ $produto->id }}
                <h6>Nome:</h6>{{ $produto->nome }}
                <h6>Descrição:</h6>{{ $produto->descricao }}
                <h6>Marca:</h6>{{ $produto->marca->nome }}
                <hr>
                ESTOQUE:{{ $produto->estoque_minimo }},{{ $produto->estoque_maximo}},{{ $produto->local_estoque}}
                <hr>
                <h6>local:</h6>{{ $produto->local_estoque}}
                <h6>Categoria</h6>{{ $produto->categoria->nome}}
                <hr>

                <hr><?php

                    $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on") ? "https" : "http");
                    $url = '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $urlPaginaAtual = $protocolo . $url
                    //echo $protocolo.$url;
                    ?>
                Visualisar no web site:
                <p>
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $urlPaginaAtual ) !!}
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $produto->id.'--'.$produto->nome) !!}
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $produto->id.'--'.$produto->nome) !!}
            </div>

        </div>
    </div>

</main>

@endsection