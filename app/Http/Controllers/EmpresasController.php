<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Emphasis;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $razao_social_like=$request->get('empresa1');
       // $empresas = Empresas::all();
        
        //return view('app.empresa.index');
        //$idEmpresa =Empresas::where('razao_social','like',$razao_social_like.'%')->get('id');
       // return view('app.empresa.index', ['empresas' => $empresas]);
       if (isset($_POST['empresa1'])){
        if (!empty($razao_social_like)) {
            echo($razao_social_like);
           $empresas =Empresas::where('razao_social','like',$razao_social_like.'%')->get();
           //$empresas=Empresas::all();
            return view('app.empresa.index', ['empresas' => $empresas]);
    }else{
       echo('dados invállidos');
    }
    }else{
        $empresas =Empresas::where('id',0)->get();
          return view('app.empresa.index', ['empresas' => $empresas]);
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
     * @param  \App\Models\Empresas  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresa)
    {
      
        //
      //dd($empresa);
        return view('app.empresa.show', ['empresa' => $empresa]);

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
