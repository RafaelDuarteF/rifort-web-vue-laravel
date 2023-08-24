<?php

namespace App\Http\Controllers;

use App\Mail\EmailContato;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Models\Contato;
use Exception;

class UserController extends Controller
{
    
    public function visualizarContatos() {
        try {
            $contatos = Contato::where('verificado', 0)->orderBy('created_at')->paginate(10);
        } catch(\Exception $e) {
            $contatos = null;
        }
        
        $contatosAtributos = $contatos->map(function ($contato) {
            $carbonData = Carbon::parse($contato->created_at);
            return [
                'assunto' => $contato->assunto,
                'email' => $contato->email,
                'mensagem' => $contato->mensagem,
                'id' => $contato->id,
                'data_envio' => $carbonData->format('d/m/Y'),
            ];
        });
        
        $infosPag = [
            'titulo' => 'Contatos',
            'loginOption' => false,
            'headerInv' => false,
            'contatosAtributos' => $contatosAtributos,
        ];
        
        $infosPag = array_merge($infosPag, $this->getSitePath());
        
        return view('user.userContatos', $infosPag);
    }
    public function deletarContatos(Request $request) {
        try {
            $solicitacao = Contato::find($request->id);
            if (!$solicitacao) {
                return response()->json(false);
            }
            $solicitacao->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function verificarContato($id = null) {
        if($id === null) {
            return redirect()->back();
        } else {
            $contato = Contato::where('verificado', 0)->find(intval($id));
            $infosPag = [
                'titulo' => 'Contato',
                'loginOption' => false,
                'headerInv' => false,
                'contato' => $contato,
            ];
            
            $infosPag = array_merge($infosPag, $this->getSitePath());
            return view('user.userVerificarContato', $infosPag);
        }
    }
    public function enviarContato(Request $request) {
        $id = $request->id;
        $mensagem = $request->mensagem;
        $destinatario = $request->destinatario;
        if($id == null) {
            return redirect()->back();
        } else {
            $contato = Contato::find($id); // Substitua $id pelo ID do contato que você deseja atualizar

            if ($contato && $contato->verificado != 1) {
                $contato->verificado = 1; // Novo valor para o campo "verificado"
                $contato->save(); // Salva as alterações no banco de dados
                $enviarEmail = $this->enviarEmail($mensagem, $destinatario);
                if($enviarEmail) {
                    return true;
                }
                return false;
            }
            else {
                return false;
            }
        }
    }

    public function enviarEmail($mensagem, $destinatario)
    {
        try{
            Mail::to($destinatario)->send(new EmailContato($mensagem));
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
}