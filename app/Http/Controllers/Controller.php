<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function getSitePath() {
        return [
            'cssPath' => 'css/site/',
            'jsPath' => 'js/site/',
            'videosPath' => 'assets/videos/',
            'artsPath' => 'assets/arts/',
            'participantesPath' => 'assets/participantes/'
        ];
    } // Retorna o caminho dos assets das rotas principais (públicas)
}
