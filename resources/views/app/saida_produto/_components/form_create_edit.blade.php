<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if (isset($produto->id))
    <form action="{{ route('Saida-produto.update', ['Saida_produto' => $saida_produto->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @else
        <form action="{{ route('Saida-produto.store') }}" method="POST">
            @csrf
            @endif
            <div class="row mb-3">
                <label for="peca_equipamento_id" class="col-md-4 col-form-label text-md-end text-right">Id Peça do equipamento</label>
                <div class="col-md-6">
                    <input name="peca_equipamento_id" id="peca_equipamento_id" type="number" class="form-control " value="{{ $peca_equipamento_id->id ?? old('id') }}" readonly>
                    {{ $errors->has('id') ? $errors->first('id') : '' }}
                </div>
            </div>
            <div class="row mb-3">
                <label for="data" class="col-md-4 col-form-label text-md-end text-right">Data</label>
                <div class="col-md-6">
                    <input name="data" id="data_emissao" type="date" class="form-control " value="{{ $produto->data ?? old('data') }}" readonly>
                    {{ $errors->has('data') ? $errors->first('data') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="pedidos_saida_id" class="col-md-4 col-form-label text-md-end text-right">Num pedido saida</label>
                <div class="col-md-6">
                    <input name="pedidos_saida_id" id="pedidos_saida_id" type="null" class="form-control " value="{{$pedido}}" readonly>
                    {{ $errors->has('pedidos_saida_id') ? $errors->first('pedidos_saida_id') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="valor" class="col-md-4 col-form-label text-md-end text-right">equipamento_id</label>
                <div class="col-md-6">
                    <input name="equipamento_id" id="equipamento_id" type="decimal" class="form-control " value="@foreach($pedido_saida_produtos as $pedido_saida_produtos_f)
                    {{$pedido_saida_produtos_f['equipamento_id']}}
                    @endforeach" readonly>
                    {{ $errors->has('equipamento_id') ? $errors->first('equipamento_id') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="produto" class="col-md-4 col-form-label text-md-end text-right">Estoque id</label>
                <div class="col-md-6">
                    <input name="estoque_id" id="produto_id" type="text" class="form-control " value="@foreach($estoque_produtos as $estoque_produto_f)
                    {{$estoque_produto_f['id']}}
                    @endforeach" readonly>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="produto" class="col-md-4 col-form-label text-md-end text-right">Produto id</label>
                <div class="col-md-6">
                    <input name="produto_id" id="produto_id" type="text" class="form-control " value="@foreach($estoque_produtos as $estoque_produto_f)
                    {{$estoque_produto_f['produto_id']}}
                    @endforeach" readonly>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="produto" class="col-md-4 col-form-label text-md-end text-right">Unid</label>
                <div class="col-md-6">
                    <input name="unidade_medida" id="produto_id" type="text" class="form-control " value="@foreach($estoque_produtos as $estoque_produto_f)
                    {{$estoque_produto_f['unidade_medida']}}
                    @endforeach" readonly>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="valor" class="col-md-4 col-form-label text-md-end text-right">Valor</label>
                <div class="col-md-6">
                    <input name="valor" id="valor" type="deciaml" class="form-control " value="@foreach($estoque_produtos as $estoque_produto_f)
                    {{$estoque_produto_f['valor']}}
                    @endforeach" readonly>
                    {{ $errors->has('valor') ? $errors->first('valor') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="quantidade" class="col-md-4 col-form-label text-md-end text-right">Quantidade</label>
                <div class="col-md-6">
                    <input name="quantidade" id="quantidade" type="decimal" class="form-control " value="{{ $produto->quantidade ?? old('quantidade') }}" onchange="Qnt_X_Valor()">
                    <script>
                        function Qnt_X_Valor() {
                            let n1 = document.getElementById('valor').value;
                            let n2 = document.getElementById('quantidade').value;
                            let sub = n2 * n1;
                            document.getElementById('subtotal').value = sub;
                        };
                    </script>
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
                </div>
            </div>
            <div class="row mb-1">
                <label for="subtotal" class="col-md-4 col-form-label text-md-end text-right">Subtotal</label>
                <div class="col-md-6">
                    <input name="subtotal" id="subtotal" type="text" class="form-control " value="{{ $produto->subtotal ?? old('subtotal') }}" readonly>
                    {{ $errors->has('subtotal') ? $errors->first('subtotal') : '' }}
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($saida_produto) ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <?php

                    $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on") ? "https" : "http");
                    $url = '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $urlPaginaAtual = $protocolo . $url
                    //echo $protocolo.$url;
                    ?>
                    Visualisar no web site:
                    <p></p>
                    {!! QrCode::size(100)->backgroundColor(255,90,0)->generate( $urlPaginaAtual ) !!}
                </div>
            </div>

        </form>
</body>

</html>