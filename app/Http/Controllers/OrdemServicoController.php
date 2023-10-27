<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\OrdemServico;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Query\OrExpr;
use App\Models\Servicos_executado;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(Request $request)
    public function index(Request $request)
    {

        $empresa = Empresas::all();
        $equipamento = Equipamento::all();
        $id = $request->get("id");
        $printerOs = $request->get("printer");

        $tipo_consulta = $request->get("tipo_consulta");

        if ($tipo_consulta == 1 && $id >= 1) {
            //filtro ordem de serviço pelo Id
            $funcionarios = Funcionario::all();
            $ordens_servicos = OrdemServico::where('id', $id)->orderby('data_inicio')->orderby('hora_inicio')->get();
            $valorTotal = OrdemServico::where('id', $id)->orderby('data_inicio')->orderby('hora_inicio')->sum('valor');
            $servicos_executado = Servicos_executado::where('ordem_servico_id', $id)->get();
            //dd($servicos_executado );
            return view('app.ordem_servico.index', [
                'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
                'empresa' => $empresa,
                'valorTotal' => $valorTotal,
                'servicos_executado' => $servicos_executado

            ]);
        }

        //if (isset($_POST['id'])) {//antigo pelo id
        //if (!empty($id)) {
        if ($tipo_consulta == 2) {
            //filtro ordem de serviço pelo data inicial e situação
            if (isset($_POST['data_inicio'])) {
                $dataInicio = $request->get("data_inicio");
                $dataFim = $request->get("data_fim");
                if (!empty($dataInicio)) {
                    $funcionarios = Funcionario::all();
                    $dataInicio = $request->get("data_inicio");
                    $situacao = $request->get("situacao");
                    $ordens_servicos = OrdemServico::where('situacao', $situacao)
                        ->where('data_inicio', ('>='), $dataInicio)
                        ->where('data_inicio', ('<='), $dataFim)
                        ->orderby('data_inicio')->orderby('hora_inicio')->get();
                    //somando valor
                    $valorTotal = OrdemServico::where('situacao', $situacao)->where('data_inicio', ('>='), $dataInicio)->sum('valor');

                    return view('app.ordem_servico.index', [
                        'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
                        'empresa' => $empresa,
                        'valorTotal' => $valorTotal
                    ]);
                }
            }
        }
        //Patrimonio
        if ($tipo_consulta == 5) {
            //filtro ordem de serviço pelo data inicial e situação e patrimonio
            $funcionarios = Funcionario::all();
            $dataInicio = $request->get("data_inicio");
            $dataFim = $request->get("data_fim");
            // $empresa_id = $request->get("empresa_id");
            $patrimonio = $request->get("patrimonio_id");
            $situacao = $request->get("situacao");
            $ordens_servicos = OrdemServico::where('data_inicio', ('>='), $dataInicio)
                ->where('data_inicio', ('<='), $dataFim)
                ->where('equipamento_id', $patrimonio)->where('situacao', $situacao)->orderby('data_inicio')->orderby('hora_inicio')->get();

            $valorTotal = OrdemServico::where('data_inicio', ('>='), $dataInicio)
                ->where('data_inicio', ('<='), $dataFim)
                ->where('equipamento_id', $patrimonio)->where('situacao', $situacao)->orderby('data_inicio')->orderby('hora_inicio')->sum('valor'); //somando valor
            return view('app.ordem_servico.index', [
                'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
                'empresa' => $empresa, 'valorTotal' => $valorTotal
            ]);
        }
        if ($tipo_consulta == 6) {
            //filtro ordem de serviço pelo data inicial e situação e empresa
            $funcionarios = Funcionario::all();
            $dataInicio = $request->get("data_inicio");
            $dataFim = $request->get("data_fim");
            $empresa_id = $request->get("empresa_id");
            $situacao = $request->get("situacao");
            $ordens_servicos = OrdemServico::where('data_inicio', ('>='), $dataInicio)
                ->where('data_inicio', ('<='), $dataFim)
                ->where('empresa_id', $empresa_id)->where('situacao', $situacao)->orderby('data_inicio')->orderby('hora_inicio')->get();

            $valorTotal = OrdemServico::where('data_inicio', ('>='), $dataInicio)
                ->where('data_inicio', ('<='), $dataFim)
                ->where('empresa_id', $empresa_id)->where('situacao', $situacao)->orderby('data_inicio')->orderby('hora_inicio')->sum('valor'); //somando valor
            return view('app.ordem_servico.index', [
                'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
                'empresa' => $empresa, 'valorTotal' => $valorTotal
            ]);
        }

        //Ipressão
        if ($tipo_consulta == 7) {
            $empresa_id = $request->get("empresa_id");
            $empresa = Empresas::where('id', $empresa_id)->get();
            $situacao = $request->get("situacao");
            $dataInicio = $request->get("data_inicio");
            $dataFim = $request->get("data_fim");
            // $ordens_servicos = OrdemServico::where('empresa_id', $empresa_id )->where('situacao', $situacao)->get();

            $valorTotal = OrdemServico::where('data_inicio', ('>='), $dataInicio)->where('data_inicio', ('<='), $dataFim)->where('empresa_id', $empresa_id)->where('situacao', $situacao)->sum('valor');
            $valorTotal = number_format($valorTotal, 2, ",", ".");
            $ordens_servicos = OrdemServico::where('data_inicio', ('>='), $dataInicio)
                ->where('data_inicio', ('<='), $dataFim)
                ->where('empresa_id', $empresa_id)->where('situacao', $situacao)->orderby('data_inicio')->orderby('hora_inicio')->get();
            return view(
                'app.ordem_servico.printer_list_os',
                ['empresa' => $empresa, 'ordens_servicos' => $ordens_servicos, 'valorTotal' => $valorTotal]

            );
        }
        if (('teste')) {
            $funcionarios = Funcionario::all();
            $ordens_servicos = OrdemServico::where('id', 0)->get();
            $valorTotal = 0;
            return view('app.ordem_servico.index', [
                'equipamento' => $equipamento, 'ordens_servicos' => $ordens_servicos, 'funcionarios' => $funcionarios,
                'empresa' => $empresa,
                'valorTotal' => $valorTotal
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $empresa)
    {

        $id = $empresa->get('empresa');
        // $funcionarios=Funcionario::all();
        $funcionarios = Funcionario::where('funcao', 'supervisor')->get();
        $equipamentos = Equipamento::where('empresa_id', $id)->get();
        $ordem_servico = OrdemServico::all();
        $empresa = Empresas::where('id', $id)->get();

        return view('app.ordem_servico.create', [
            'ordem_servico' =>  $ordem_servico, 'equipamentos' => $equipamentos, 'funcionarios' => $funcionarios,
            'empresa' => $empresa
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(Request $req)
    {
        $equipamentos = Equipamento::all();
        $req['teste'] = 'teste';
        OrdemServico::create($req->all());
        return redirect()->route('ordem-servico.create', ['$equipamentos' => $equipamentos]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdemServico  $ordem_servico
     * @return \Illuminate\Http\Response
     */
    public function show(OrdemServico $ordem_servico)
    {
        $id=$ordem_servico->id;
        $servicos_executado = Servicos_executado::where('ordem_servico_id', $id)->get();
        return view('app.ordem_servico.show', ['ordem_servico' => $ordem_servico,'servicos_executado'=>$servicos_executado]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\OrdemServico $ordem_servico
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdemServico $ordem_servico)
    {
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();
        $empresas = Empresas::all();
        
        
        return view(
            'app.ordem_servico.edit',
            [
                'ordem_servico' => $ordem_servico,
                'equipamentos' => $equipamentos,
                'funcionarios' => $funcionarios,
                'empresas' => $empresas

            ]
        );
        return view('app.ordem_servico.show', ['ordem_servico' => $ordem_servico,]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdemServico $ordem_sevico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdemServico $ordem_servico)
    {
        $ordem_servico->update($request->all()); //
        return redirect()->route('ordem-servico.index');
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
