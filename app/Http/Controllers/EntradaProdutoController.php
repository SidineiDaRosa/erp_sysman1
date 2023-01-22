<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaProduto;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\EntradaProdutos;
use App\Models\EstoqueProdutos;

class EntradaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipoFiltro = $request->get('tipofiltro');
        $nome_produto_like = $request->get('produto');
        //$fornecedores=Fornecedor::all();
        if ($tipoFiltro == 1) {
            //$entradas_produtos = EntradaProduto::all();
            //$entradas_produtos = EntradaProduto::where('nome', 'like', $nome_produto_like . '%')->get();
            $entradas_produtos = EntradaProduto::where('produto_id',$nome_produto_like)->get();
            echo($entradas_produtos);
           if (!empty($entradas_produtos )) {
                return view('app.entrada_produto.index', [
                    'entradas_produtos' => $entradas_produtos,
                ]);
            }
            //if ($tipoFiltro == 2) {
                //$entradas_produtos = EntradaProduto::all();
                //$entradas_produtos = EntradaProduto::where('nome', 'like', $nome_produto_like . '%')->get();
               
               // echo($entradas_produtos);
              // if (!empty($entradas_produtos )) {
                    //return view('app.entrada_produto.index', [
                        //'entradas_produtos' => $entradas_produtos,
                   // ]);
               // }
        } else {
            $entradas_produtos = EntradaProduto::all();
            $entradas_produtos  = Produto::where('id', 0)->get();
            return view('app.entrada_produto.index', [
                'entradas_produtos' => $entradas_produtos,
            ]);
        }
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
        // $produtos = Produto::all();
        $produtos  = Produto::where('id', $produtoId)->get();
        return view('app.entrada_produto.create', [
            'produtos' => $produtos,
            'fornecedores' => $fornecedores

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
        EntradaProduto::create($request->all());

        $produto = Produto::find($request->input('produto_id')); //busca o registro do produto com o id da entrada do produto
        $produto->estoque_ideal = $produto->estoque_ideal + $request->input('quantidade'); // soma estoque antigo com a entrada de produto
        $produto->save();
        return redirect()->route('entrada-produto.index');
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
     * @param  \App\Models\EntradaProduto $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntradaProduto $entrada_produto)
    {
        $entrada_produto->delete();
        return redirect()->route('entrada-produto.index');
    }
}
