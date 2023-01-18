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
        // $dataAntiga=new DateTime('25/10/2022');
        // $timezone = new DateTimeZone('America/Sao_Paulo');
        echo ('<h1>Apartir do ano 2000 </h1>' . '<br>');
        echo ('O dia do mês hoje=' . $diaAtual . '<br>');
        echo ('O mês atual é.....=' . $mesAtual . '<br>');
        echo ('O ano atual é....=' . $anoAatual . '<br><hr></>');
        $totalDiasAtual = ($diaAtual + ($mesAtual * 31) + ($anoAatual * 365)) - 30;
        $totHorasAtual = $totalDiasAtual * 24;
        // $executaAtualizacao = 0;
        //if ($executaAtualizacao == 5) {
        //$produto = Produto::find($produtos); //busca o registro do produto com o id da entrada do produto
        $totRegPecEquip = PecasEquipamentos::select('id')->max('id');
        // $totRegPecEquip = 13;
        $x = 1;
        while ($x <= $totRegPecEquip) {
            //echo "The number is: $x <br>";

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
                /// } else {
                // echo ('este registro é nullo');
            }

            $x += 1;
        }
        if ($x = $totRegPecEquip) {

            $x = 0;
            $totRegPecEquip = 0;
            return view('site.control_panel');
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
