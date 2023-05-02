<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use RafaelDuarte\OlhoVivo\OlhoVivo;

class ApplicationController extends Controller
{
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
        $olhoVivo = new OlhoVivo('a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090');
        return $olhoVivo->espBuscarChegadasLinhaParadas($linha, $parada);
    }
}
