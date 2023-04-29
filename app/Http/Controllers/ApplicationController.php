<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\OlhoVivo\UseOlhoVivo;
use Exception;

class ApplicationController extends Controller
{
    use UseOlhoVivo;

    public function index()
    {
        $infosPag = [
            'titulo' => 'Aplicação',
            'fundo' => '#141414',
        ];
        $infosPag = array_merge($infosPag, $this->getSitePath());
        return view('site.aplicacao', $infosPag);
    }

    public function obterChegadas()
    {
        $linha = $_GET['linha'];
        $parada = $_GET['parada'];
        return $this->verificarChegadas($linha, $parada);
    }
}
