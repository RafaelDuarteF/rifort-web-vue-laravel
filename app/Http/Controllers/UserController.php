<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RafaelDuarte\OlhoVivo\OlhoVivo;

class UserController extends Controller
{
    public function index() {
        $olhoVivo = new OlhoVivo();
        $olhoVivo->token = 'a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090';
        $olhoVivo->autenticar();
        // $linhas = $olhoVivo->buscarLinhas('Vila sabrina');
        // foreach ($linhas as $linha) {
        //     echo $linha->cl . '<br>';
        //     echo $linha->tp . '<br>';
        //     echo $linha->ts . '<br>';
        //     echo '<br>';
        // }
        // echo $olhoVivo->buscarMapa('/Corredor');
        // dd($olhoVivo->buscarParadas('Lapa'));
        // dd($olhoVivo->buscarParadasPorLinha(1273));
        // dd($olhoVivo->buscarPosicaoTodosOnibus());
        dd($olhoVivo->buscarPosicaoOnibusEspecifico(34705));
        // $olhoVivo->buscarPrevisaoChegadaParadaLinha(4200953, 1989);
        // $olhoVivo->buscarPrevisaoChegadaLinha(34705); 4200953
        // dd($olhoVivo->buscarPrevisaoChegadaParada(4200953));
    }
}
