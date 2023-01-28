<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoSaida;
use App\Models\Empresas;
use App\Models\Funcionario;
use App\Models\Equipamento;
use App\Models\OrdemServico;
use App\Models\EstoqueProdutos;
use App\Models\Produto;

class ItemSaidaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipoFiltro = $request->get("tipofiltro");
        $empresa_id = $request->get("empresa_id");
        $produto_id = $request->get("produto");
        $pedido_id = $request->get("pedido");
        if ($tipoFiltro >=1) {
            $empresas = Empresas::all();
            $produtos = Empresas::all();
            $estoque_produtos = EstoqueProdutos::where('empresa_id', 2)->where('produto_id',$produto_id)->get();
            return view('app.item_saida_produto.index', [
                'estoque_produtos' => $estoque_produtos, 'empresas' => $empresas, 'produtos' =>$produtos,
                'pedido' => $pedido_id
            ]);
        } else {
            $empresas = Empresas::all();
            $produtos = Empresas::all();
            $estoque_produtos = EstoqueProdutos::where('empresa_id', 0)->get();
            return view('app.item_saida_produto.index', [
                'estoque_produtos' => $estoque_produtos, 'empresas' => $empresas, 'produtos' => $produtos,
                'pedido' => $pedido_id
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
