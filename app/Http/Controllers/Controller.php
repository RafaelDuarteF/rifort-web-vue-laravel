<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RafaelDuarte\OlhoVivo\OlhoVivo;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function getSitePath()
    {
        return [
            'cssPath' => 'css/site/',
            'jsPath' => 'js/site/',
            'videosPath' => 'assets/videos/',
            'artsPath' => 'assets/arts/',
            'participantesPath' => 'assets/participantes/'
        ];
    } // Retorna o caminho dos assets das rotas principais (públicas)
    public function bootstrapOlhoVivo()
    {
        $olhoVivo = new OlhoVivo();
        $olhoVivo->token = 'a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090';
        $olhoVivo->autenticar();
        return $olhoVivo;
    } // Estado inicial para o uso da api olhoVivo pela biblioteca
}
