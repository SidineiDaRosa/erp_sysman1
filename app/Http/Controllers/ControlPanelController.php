<?php

namespace App\Http\Controllers;

use App\Models\ParadaEquipamento;
use App\Models\Produto;
use App\Models\Equipamento;
use App\Models\OrdemProducao;
use App\Models\RecursosProducao;
use App\Models\PecasEquipamentos;

use Illuminate\Http\Request;

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

class ControlPanelController extends Controller
{
    public function index(Request $request)
    {
        $produtos = 2;
        $qnt = 1;
        //$produto = Produto::find($produtos); //busca o registro do produto com o id da entrada do produto
        $totRegPecEquip = PecasEquipamentos::select('id')->max('id');
        $x = 1;
       // while ($x <= $totRegPecEquip) {
            //echo "The number is: $x <br>";

            $numRegistroPecaEquip = PecasEquipamentos::find($x); //busca o registro do produto com o id da entrada do produto
            dd($numRegistroPecaEquip );
            //$numRegistroPecaEquip = $numRegistroPecaEquip->horas_proxima_manutencao + 1; // soma estoque antigo com a entrada de produto
            //$numRegistroPecaEquip->save();
            //echo ($numRegistroPecaEquip) . "<br>";
           // $x += 1;
            //if ($x = $totRegPecEquip) {
                $x = 0;
          //  }
        }

        //$produto->estoque_ideal = $produto->estoque_ideal -($qnt); // soma estoque antigo com a entrada de produto
        //$produto->estoque_ideal = $produto->estoque_ideal -($qnt); // soma estoque antigo com a entrada de produto

        //$produto->save();
        // return view('site.control_panel', ['produtos' => $produtos]);
    }
    // 

