<?php

if (empty($_GET)) {
    $mes = date("n");
    $ano = date("Y");
} else {
    $mes = $_GET["m"];
    $ano = $_GET["a"];
}


function mesExtenso ($mes) {

    $meses = array( '1' => "Janeiro", '2' => "Fevereiro", '3' => "Março",
                     '4' => "Abril",   '5' => "Maio",      '6' => "Junho",
                     '7' => "Julho",   '8' => "Agosto",    '9' => "Setembro",
                     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
                     );

      if( $mes >= 01 && $mes <= 12){
        return $meses[$mes];
      } else {
        return "Mês Inexistente";
      }

}

function semanaDias()
{
	$dia = array('Dom',	'Seg', 'Ter', 'Qua', 'Qui',	'Sex', 'Sab');

	for( $i = 0; $i < 7; $i++ )
	 echo "<td>".$dia{$i}."</td>";

}

function organizarCalendario ($mes, $ano){

    $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);//numero de dias do mes
    $mExtenso = mesExtenso($mes);//nome do mes por extenso
    $diaCorrente = 0;

    $diaSemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes, "01", $ano) , 0 );	// função que descobre o dia da semana do primeiro dia do mes

    //calcular proximo mes e mes anterior
    if ($mes == 12){
        $mPosterior = 1;
        $aPosterior = $ano +1;
        $mAnterior = $mes - 1;
        $aAnterior = $ano;
    } else if ($mes == 1) {
        $mPosterior = $mes + 1;
        $aPosterior = $ano;
        $mAnterior = 12;
        $aAnterior = $ano - 1;
    } else {
        $mPosterior = $mes + 1;
        $aPosterior = $ano;
        $mAnterior = $mes - 1;
        $aAnterior = $ano;
    }

    echo "<table>";
        echo "<tr>";
            echo "<td colspan = 1><a href='?m=" . $mAnterior . "&a=" . $aAnterior . "'>&laquo</a></td>";
            echo "<td class='mesNome' colspan = 5>".$mExtenso.", ". $ano ."</td>";
            echo "<td colspan = 1><a href='?m=" . $mPosterior . "&a=" . $aPosterior . "'>&raquo</a></td>";
        echo "</tr>";
        echo "<tr class='semana'>";
            semanaDias();
        echo "</tr>";


    $linha = 0;
    while($linha < 6){
        $coluna = 0;
        echo "<tr>";
        while($coluna < 7){
            if($coluna < $diaSemana && $diaCorrente == 0 || $diaCorrente >= $numeroDias){
                echo "<td class='diaVazio' align='center'></td>";
            } else {
                $diaCorrente = $diaCorrente + 1;
                if ($diaCorrente == date("j") && $mes == date("n") && $ano == date("Y")){
                    echo "<td class='hoje' align='center'>" . $diaCorrente . "</td>";
                } else {
                    echo "<td class='diaComum' align='center'>" . $diaCorrente . "</td>";
                }
            }
            $coluna = $coluna + 1;
        }
        echo "</tr>";
        $linha = $linha + 1;
    }



}
//organizarCalendario($mes, $ano);
?>
