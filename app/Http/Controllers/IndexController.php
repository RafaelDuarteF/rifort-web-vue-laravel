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
        return view('site.index', $infosPag);
    }
    public function enviarContato(Request $request)
    {
        // Verifica a request de contato com as rules e os feedbacks definidas do model contato.
        $request->validate($this->contato->rules(), $this->contato->feedback());
        try {
            Contato::create($request->all());
            return redirect()->route('site.index')->with('contatoEnv', true);
        } catch (\Exception $e) {
            return redirect()->route('site.index')->withErrors(['erroContato' => true]);
        }
    }
}
