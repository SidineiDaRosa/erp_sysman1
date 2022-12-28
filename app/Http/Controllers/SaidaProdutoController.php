<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Models\EntradaProduto;
use App\Models\SaidaProduto;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Equipamento;
use App\Models\Marca;

class SaidaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipamentos = Equipamento::all();
        $produtos = Produto::all();
        $categorias = Marca::all();
        $unidades = Empresas::all();
        //echo('controller saidas de produtos');
        return view('app.produto.index', ['produtos' => $produtos, 'unidades' => $unidades, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $produto_id)
    {
        //
        $patrimonios = Equipamento::all();
        $produtoId = $produto_id->get('produto');
        $produtos  = Produto::where('id', $produtoId)->get();
        return view('app.saida_produto.create', [
            'produtos' => $produtos, 'patrimonios' =>  $patrimonios

        ]);
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
        SaidaProduto::create($request->all());
        $saidas_produtos = SaidaProduto::all();
        ///------------------------------------------
        $produto = Produto::find($request->input('produto_id')); //busca o registro do produto com o id da entrada do produto
        $produto->estoque_ideal = $produto->estoque_ideal - $request->input('quantidade'); // soma estoque antigo com a entrada de produto
        $produto->save();
        $equipamentos = Equipamento::all();
        $produtos = Produto::all();
        $categorias = Marca::all();
        $unidades = Empresas::all();
        //echo('controller saidas de produtos');
        return view('app.produto.index', ['produtos' => $produtos, 'unidades' => $unidades, 'categorias' => $categorias]);
    

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
