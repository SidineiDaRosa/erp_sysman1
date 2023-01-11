<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipamento;
use App\Models\Funcionario;
use App\Models\PedidoCompra;
use App\Models\Empresas;
use App\Models\PedidoSaida;
use App\Models\SaidaProduto;
use App\Models\Fornecedor;

class PedidosSaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos_saida = PedidoSaida::all();
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $empresas = Empresas::all();
        return view('app.pedido_saida.index', ['equipamentos' => $equipamentos, 'funcionarios' => $funcionarios, 'pedidos_saida' => $pedidos_saida]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pedidos_saida = PedidoSaida::all();
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $empresas = Empresas::all();
        $fornecedores = Fornecedor::all();
        return view('app.pedido_saida.create', [
            'equipamentos' => $equipamentos, 'funcionarios' => $funcionarios, 'pedidos_saida' => $pedidos_saida,
            'empresa' => $empresas,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        PedidoSaida::create($req->all());
        $pedidos_saida = PedidoSaida::all();
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $empresas = Empresas::all();
        $fornecedores = Fornecedor::all();
        return view('app.pedido_saida.index', ['equipamentos' => $equipamentos, 'funcionarios' => $funcionarios, 'pedidos_saida' => $pedidos_saida]);
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
     * @param  \App\PedidoSaida  $equipamento
     * @return \Illuminate\Http\Response
     */

    public function edit(PedidoSaida $pedido_saida)
    {
        //
        $pedido_saida_id_1 = $pedido_saida->get('pedido_saida->id');
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $saidas_produto = SaidaProduto::all();
        $saidas_produto = SaidaProduto::where('pedidos_saida_id', 1)->get();
        return view('app.pedido_saida.edit', [
            'equipamentos' => $equipamentos, 'funcionarios' => $funcionarios, 'pedido_saida' => $pedido_saida,
            'saidas_produto' => $saidas_produto
        ]);
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
