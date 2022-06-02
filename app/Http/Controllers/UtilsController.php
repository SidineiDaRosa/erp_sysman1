<?php

namespace App\Http\Controllers;
use App\Models\OrdemProducao;
use App\Models\RecursosProducao;
use App\Models\Equipamento;
use App\Models\OrdemServico;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function getHorimetroInicial(Request $request){
        $equipamento_id = $request->get('equipamento_id');
        $horimetro_inicial=OrdemProducao::where('equipamento_id', $equipamento_id)->orderBy('id', 'desc')->first();
        $horimetro_inicial=$horimetro_inicial->horimetro_final;
        echo json_encode($horimetro_inicial);

    }

    public function getHorimetroInicialRecursos(Request $request){
        $equipamento_id = $request->get('equipamento_id');
        $horimetro_inicial=RecursosProducao::where('equipamento_id', $equipamento_id)->orderBy('id', 'desc')->first();
        $horimetro_inicial=$horimetro_inicial->horimetro_final;
        echo json_encode($horimetro_inicial);

    }
    public function getLastIdOs(Request $request)
    {
        $id_os = $request->get('id_os');

        $id_os = OrdemServico::select('id')->max('id');

        echo json_encode($id_os);
    }

    public function getTodasOs()
    {
        $equipamento = Equipamento::all();
        $ordens_servicos = OrdemServico::all();
        return view('app.ordem_servico.index', ['produtos' => $equipamento, 'ordens_servicos' => $ordens_servicos]);
    }
}

