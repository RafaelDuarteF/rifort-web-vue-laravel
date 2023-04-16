<?php

namespace App\Http\Controllers;

class ProjetoController extends Controller
{
    public function index() {
        $infosPag = [
            'titulo' => 'Projeto'
        ];
        $infosPag = array_merge($infosPag, $this->getSitePath());
        return view('site.projeto', $infosPag);
    }
}
