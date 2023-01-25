<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueProdutos;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Empresas;

class EstoqueProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estoque_produtos= EstoqueProdutos::all();
        $empresas=Empresas::all();
        $produtos=Produto::all();
        
        return view('app.estoque_produto.index', [
            'estoque_produtos'=>$estoque_produtos,'empresas'=>$empresas,'produtos'=>$produtos
        ]);
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $produto_id)
    {
        $produtoId = $produto_id->get('produto');
        $fornecedores = Fornecedor::all();
        //dd( $produtoId);
        $empresa = Empresas::all();
        $produtos  = Produto::where('id', $produtoId)->get();
        return view('app.estoque_produto.create', [
            'produtos' => $produtos,
            'fornecedores' => $fornecedores,
            'empresa' => $empresa

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
        EstoqueProdutos::create($request->all());
        
        return redirect()->route('Estoque-produto.index');
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
