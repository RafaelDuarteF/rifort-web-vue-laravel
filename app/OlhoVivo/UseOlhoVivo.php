<?php

// ARQUIVO PARA REALIZAR VERIFICAÇÕES DE LÓGICAS COMPLEXAS DA LIB DA API OLHOVIVO

namespace App\OlhoVivo;

trait UseOlhoVivo
{

    public function verificarChegadas($linha, $parada)
    {
        $return = 0;
        $jsonArray = array();
        if (empty($linha) || empty($parada)) {
            $return = 'empty';
        } else {
            $olhoVivo = $this->bootstrapOlhoVivo();
            try {
                $linhasInfo = $olhoVivo->buscarLinhas($linha)[0];
                $linhaCod = intval($olhoVivo->buscarLinhas($linha)[0]->cl);
                $parada = intval($olhoVivo->buscarParadas($parada)[0]['cp']);
                $prevChegadaLinha = $olhoVivo->buscarPrevisaoChegadaLinha($linhaCod);
            } catch (Exception $e) {
                $return = 'invalid';
            }
            if ($return != 0) {
                return $return;
            } else {
                $i = 0;
                while ($i <= count($prevChegadaLinha->ps) - 1) {
                    if (intval($prevChegadaLinha->ps[$i]->cp) == $parada) {
                        $chegadaLinha = $prevChegadaLinha->ps[$i];
                        array_push($jsonArray, $linhasInfo);
                        array_push($jsonArray, $chegadaLinha);
                        $jsonArray = array(
                            "linha" => $jsonArray[0],
                            "chegada" => $jsonArray[1],
                        );
                        return $jsonArray;
                    }
                    $i++;
                }
            }
        }
        return $return;
    }

}