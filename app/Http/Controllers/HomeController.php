<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Empresas;
use App\Models\Equipamento;
use App\Models\OrdemServico;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Query\OrExpr;
use App\Models\Servicos_executado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $empresa = Empresas::all();
        $equipamento = Equipamento::all();
        $id = $request->get("id");
        $printerOs = $request->get("printer");

        $tipo_consulta = $request->get("tipo_consulta");

        $funcionarios = Funcionario::all();
        $ordens_servicos = OrdemServico::where('id', 0)->get();
        $valorTotal = 0;
        //
        //filtro ordem de serviço pelo data inicial e situação
        //  $prensa = onda_b_tmp_prensa0::where('TimeString', ('>'), '27/04/2023 14:08:08')->where('TimeString', ('<'), '27/04/2023 15:08:08')->get();
        $hoje = date("Y-m-d"); //data de hoje
        $data = date("Y-m-d", strtotime("-240 days")); //desconta dias para pegar a data inicial
        //$dataInicio = '2023-01-01';
        $dataInicio = $data;
        $dataFim = $hoje; //formato en
        $funcionarios = Funcionario::all();
        $situacao = 'aberto';
        $ordens_servicos = OrdemServico::where('situacao', $situacao)
            ->where('data_inicio', ('>='), $dataInicio)
            ->where('data_fim', ('<='), $dataFim)
            ->where('empresa_id', ('<='),2)
            ->orderby('data_inicio')->orderby('hora_inicio')->get();
        //somando valor
        $countOS = OrdemServico::where('situacao', $situacao)
            ->where('data_inicio', ('>='), $dataInicio)
            ->where('data_fim', ('<='), $dataFim)->count();
        return view('app.layouts.dashboard', [
            'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
            'empresa' => $empresa,
            'countos' => $countOS,'data_inicio' =>$dataInicio,'data_fim'=>$dataFim
        ]);
    }
}
