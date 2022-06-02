<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Equipamento;
use Illuminate\Support\Arr;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts = Post::whereHas('comments', function($q)
        //{$q->where('content', 'like', 'foo%');})->get();
        $id= $request->get('empresa');
        
      //  $equipamentos = Equipamento::all();
       // $empresas = Empresas::all();
       if (isset($_POST['empresa'])) {
            if (!empty($id)) {            
                $empresas = Empresas::all();
                $equipamentos = Equipamento::where('empresa_id',$id)->get();
              return view('app.equipamento.index', ['equipamentos' => $equipamentos,
             'empresas' => $empresas]);
               
           } else {
                echo ('dados');
            }
           
        } else {

            $empresas = Empresas::all();
                $equipamentos = Equipamento::where('empresa_id',$id)->get();
              return view('app.equipamento.index', ['equipamentos' => $equipamentos,
             'empresas' => $empresas]);
           
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $marcas = Marca::all();
        $equipamentos = Equipamento::all();
        $empresas = Empresas::all();
        return view('app.equipamento.create', [
            'marcas' => $marcas, 'equipamentos' => $equipamentos,
            'empresas' => $empresas
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

        // $id = $request->get("empresa_id");
        //$nome = $request->get("nome");
        //echo( $id.$nome);

        Equipamento::create($request->all());
        return redirect()->route('equipamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        //dd($equipamento);
        //$empresa=Empresas::all();   
        //return view('app.equipamento.show', ['equipamento' => $equipamento,
        // 'empresa'=>$empresa]);
        return view('app.equipamento.show', ['equipamento' => $equipamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamento $equipamento)
    {
        $marcas = Marca::all();
        $equipamentos = Equipamento::all();
        $empresas = Empresas::all();
        return view('app.equipamento.edit', [
            'equipamento' => $equipamento,
            'equipamentos' => $equipamentos, 'marcas' => $marcas,
            'empresas' => $empresas

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipamento $equipamento)
    {
        $equipamento->update($request->all());
        return redirect()->route('equipamento.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('equipamento.index');
    }
}
