<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\PedidoCompra;
use App\Models\Empresas;
use App\Models\PedidoSaida;
use App\Models\SaidaProduto;

class PedidoSaidaListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $pedido_saida)
    {
        //
        $pedido_saida_id_1 = $pedido_saida->get('pedido_saida');
       // $pedidos_saida = PedidoSaida::all();
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $saidas_produto = SaidaProduto::where('pedidos_saida_id', $pedido_saida_id_1)->get();
        $pedidos_saida = PedidoSaida::where('id', $pedido_saida_id_1)->get();
        return view('app.pedido_saida_lista.index', [
            'equipamentos' => $equipamentos, 'funcionarios' => $funcionarios,
            'saidas_produto' => $saidas_produto,
            'pedidos_saida' =>  $pedidos_saida
        ]);
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
