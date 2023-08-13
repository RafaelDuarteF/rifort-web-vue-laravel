<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class IndexController extends Controller
{
    public $contato;
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }
    public function index()
    {
        $infosPag = [
            'titulo' => 'Inicial',
        ];
        $infosPag = array_merge($infosPag, $this->getSitePath());
        return view('site.index', $infosPag);
    }
    public function enviarContato(Request $request)
    {
        session_start();
        $contatosEnv = isset($_SESSION['contatosEnv']) ? $_SESSION['contatosEnv'] : 0;
        $_SESSION['contatosEnv'] = $contatosEnv;

        if($contatosEnv <= 5) {
            // Verifica a request de contato com as rules e os feedbacks definidas do model contato.
            $request->validate($this->contato->rules(), $this->contato->feedback());
            try {
                Contato::create($request->all());
                $_SESSION['contatosEnv'] = $_SESSION['contatosEnv'] + 1;
                return redirect()->route('site.index')->with('contatoEnv', true);
            } catch (\Exception $e) {
                return redirect()->route('site.index')->withErrors(['erroContato' => true]);
            } 
        } else {
            return redirect()->route('site.index')->withErrors(['maxContato' => true]);
        }
    }
    public function enviarContatoAPI(Request $request) {
        session_start();
        $contatosEnv = isset($_SESSION['contatosEnv']) ? $_SESSION['contatosEnv'] : 0;
        $_SESSION['contatosEnv'] = $contatosEnv;
        if($contatosEnv <= 5) {
            $request->validate($this->contato->rules(), $this->contato->feedback());
            try {
                Contato::create($request->all());
                $_SESSION['contatosEnv'] = $_SESSION['contatosEnv'] + 1;
                return true;
            } catch (\Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }
}
