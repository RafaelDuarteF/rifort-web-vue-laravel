<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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




        /* $olhoVivo = new OlhoVivo();
        $olhoVivo->token = 'a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090';
        $olhoVivo->autenticar();
        $linhas = $olhoVivo->buscarLinhas('Vila sabrina');
        foreach ($linhas as $linha) {
            echo $linha->cl . '<br>';
            echo $linha->tp . '<br>';
            echo $linha->ts . '<br>';
            echo '<br>';
        }
        echo $olhoVivo->buscarMapa('/Corredor');
        dd($olhoVivo->buscarParadas('Lapa'));
        dd($olhoVivo->buscarParadasPorLinha(1273));
        dd($olhoVivo->buscarPosicaoTodosOnibus());
        dd($olhoVivo->buscarPosicaoOnibusEspecifico(34705));
        dd($olhoVivo->buscarPrevisaoChegadaParadaLinha(4200953, 1989));
        dd($olhoVivo->buscarPrevisaoChegadaLinha(1273)->ps[1]); // 4200953
        dd($olhoVivo->buscarPrevisaoChegadaParada(4200953)); */
    }
}
