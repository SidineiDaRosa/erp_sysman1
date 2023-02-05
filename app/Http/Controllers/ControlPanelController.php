<?php

namespace App\Http\Controllers;

use App\Models\ParadaEquipamento;
use App\Models\Produto;
use App\Models\Equipamento;
use App\Models\OrdemProducao;
use App\Models\RecursosProducao;
use App\Models\PecasEquipamentos;
use DateTime;
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
        $tipo_atualizacao = 0;
        // $dataAtual=Date('now',$timezone);
        $diaAtual = date('d');
        $mesAtual = date('m');
        $anoAatual = date('y');
        // $timezone = new DateTimeZone('America/Sao_Paulo');
        $totalDiasAtual = ($diaAtual + ($mesAtual * 31) + ($anoAatual * 365)) - 30;
        $totHorasAtual = $totalDiasAtual * 24;
        $totRegPecEquip = PecasEquipamentos::select('id')->max('id');
        $x = 1;
        while ($x <= $totRegPecEquip) {

            $numRegistroPecaEquip = PecasEquipamentos::find($x); //busca o registro do produto com o id da entrada do produto

            if (!empty($numRegistroPecaEquip)) { //verifica se exite este registro
                $dataProximaManutencao = $numRegistroPecaEquip->data_proxima_manutencao; //Pega a data da proxima manutenção
                // $dataFutura = $numRegistroPecaEquip->horas_proxima_manutencao - 10; // soma estoque antigo com a entrada de produto

                $dataProximaManutencao_impld = implode("/", array_reverse(explode("-", $dataProximaManutencao))); //converte uma data para formato brasileiro trazido do banco mysql
                $ontem = DateTime::createFromFormat('d/m/Y',  $dataProximaManutencao_impld); //formata a data       
                $totDiasFuturo = ($ontem->format('d') + ($ontem->format('m')  * 31) + ($ontem->format('y') * 365)) - 30;
                $totHorasFuturo =  $totDiasFuturo * 24;
                $horasRestante = $totHorasFuturo - $totHorasAtual;
                $numRegistroPecaEquip->horas_proxima_manutencao = $horasRestante;
                $numRegistroPecaEquip->save();
                if ($horasRestante <= 72) {
                   // echo "<div class='divtxt'>Estas ordens devem ser programadas para execução</div><p>'";
                   // echo ('Ordem:' . $numRegistroPecaEquip->id . '<hr>');
                    //echo ('Ordem:' . $numRegistroPecaEquip . '<hr>');
                }
                //if($horasRestante<=1){
                // echo ('Estas ordens devem ser programadas para execução<p>');
                // echo ('Ordem:'.$numRegistroPecaEquip->id.'<hr background_color="red";>');
                // echo ('Ordem:'.$numRegistroPecaEquip.'<hr>');

                //}

                /// } else {     
            }
            $x += 1;
        }
        if ($x = $totRegPecEquip) {
            $ordens_servicos = PecasEquipamentos::where('horas_proxima_manutencao', ('>='), 1)
                ->where('horas_proxima_manutencao', ('<='), 4000)->get();
            $x = 0;
            $totRegPecEquip = 0;
            return view('site.control_panel', ['ordens_de_serviços' => $ordens_servicos]);
        }
        // }
        if ($tipo_atualizacao >= 1) {

            $numRegistroPecaEquip = PecasEquipamentos::find(13); //busca o registro do produto com o id da entrada do produto
            /// $numRegistroPecaEquip->data_susbstituicao = $numRegistroPecaEquip->data_susbstituicao; // soma estoque antigo com a entrada de produto
            //$diaProximaManu= $numRegistroPecaEquip->data_susbstituicao('d');
            //echo ('datra sub=' . $numRegistroPecaEquip->data_proxima_manutencao. '<br><hr></>');
            $dataFutura = $numRegistroPecaEquip->data_proxima_manutencao;
            //$dataFuturaFormat = DateTime::createFromFormat('d/m/Y',$dataFutura);
            $data = implode("/", array_reverse(explode("-", $dataFutura))); //converte uma data para formato brasileiro trazido do banco mysql
            //$data = implode("-",array_reverse(explode("/",$data))); enviando para o banco----https://www.l9web.com.br/blog/?cat=3
            $data_final = $data;
            // $ontem = DateTime::createFromFormat('d/m/Y', $data_final)->modify('-1 day');
            $ontem = DateTime::createFromFormat('d/m/Y', $data_final);

            echo ('A data trazida do banco é=' . $ontem->format('d/m/Y') . '<hr></>');
            echo ('Dia=' . $ontem->format('d') . '<hr></>');
            echo ('Mes=' . $ontem->format('m') . '<hr></>');
            echo ('Ano=' . $ontem->format('y') . '<hr></>');
            $totDiasFuturo = ($ontem->format('d') + ($ontem->format('m')  * 31) + ($ontem->format('y') * 365)) - 30;
            $totHorasFuturo =  $totDiasFuturo * 24;
            echo ('Dias futuro=' . $totDiasFuturo . '<hr></>');
            echo ('Horas futuro=' . $totHorasFuturo . '<hr></>');
            echo ('Diferença de horas entre datas=' . ($totHorasFuturo - $totHorasAtual) . '<hr></>');
            //echo ('Data sub=' . $numRegistroPecaEquip. '<br><hr></>');
            //$numRegistroPecaEquip->horas_proxima_manutencao = $numRegistroPecaEquip->horas_proxima_manutencao - 10; // soma estoque antigo com a entrada de produto
            //$numRegistroPecaEquip->save();


            // echo ('Tempo='.$timezone.'<br>');
            //$produto->estoque_ideal = $produto->estoque_ideal -($qnt); // soma estoque antigo com a entrada de produto
            //$produto->estoque_ideal = $produto->estoque_ideal -($qnt); // soma estoque antigo com a entrada de produto
            //$produto->save();
            //return view('site.control_panel', ['produtos' => $produtos]);


        }
    }
}// 
