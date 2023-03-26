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
        return view('site.login', $infosPag);
    }
}
