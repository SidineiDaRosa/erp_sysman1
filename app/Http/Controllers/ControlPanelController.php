<?php

namespace App\Http\Controllers;
use App\Models\ParadaEquipamento;
use App\Models\Produto;
use App\Models\Equipamento;
use App\Models\OrdemProducao;
use App\Models\RecursosProducao;

use Illuminate\Http\Request;
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

class ControlPanelController extends Controller
{
    public function index(Request $request){
        $produtos=Produto::all();
        dd($produtos);

    }
    // 
}
