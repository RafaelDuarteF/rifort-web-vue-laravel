<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $infosPag = [
            'titulo' => 'Login',
            'fundo' => '#141414',
        ];
        $infosPag = array_merge($infosPag, $this->getSitePath());
        return view('site.login', $infosPag);
    }
}
