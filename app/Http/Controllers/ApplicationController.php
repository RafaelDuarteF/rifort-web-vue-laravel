<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use RafaelDuarte\OlhoVivo\OlhoVivo;
use Illuminate\Http\Request;

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

    public function obterChegadas(Request $request)
    {
        $linha = $request->input('linha');
        $parada = $request->input('parada');
        $olhoVivo = new OlhoVivo('a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090');
        return $olhoVivo->espBuscarChegadasLinhaParadas($linha, $parada);
    }
}
