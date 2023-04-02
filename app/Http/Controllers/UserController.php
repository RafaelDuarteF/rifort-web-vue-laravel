<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OlhoVivo\src\OlhoVivo;

class UserController extends Controller
{
    public function index() {
        $olhoVivo = new OlhoVivo();
        $olhoVivo->token = 'a45aaa502f6b721b5959c713896a9aa27b98a615a46d98a9f875be516732f090';
        $olhoVivo->url = 'http://api.olhovivo.sptrans.com.br/v2.1/';
        echo $olhoVivo->autenticar();
    }
}
