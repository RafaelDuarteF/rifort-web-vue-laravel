<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function login(Request $request)
    {
        $regras = [
            'name' => 'required',
            'password' => 'required',
        ];
        $feedback = [
            'name.required' => 'O campo nome precisa ser informado.',
            'password.required' => 'O campo senha precisa ser informado.',
        ];
        $request->validate($regras, $feedback);
        try {
            $user = User::where('name', $request->name)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                // usuário existe e senha está correta
                Auth::login($user); // iniciar a sessão para o usuário
                return redirect()->route('user.index');
            } else {
                // usuário não existe ou senha está incorreta
                return redirect()->back()->withErrors(['erroAutenticacao' => 'As credenciais informadas estão incorretas.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['erroConexao' => 'Ocorreu um erro, tente novamente mais tarde.']);
        }
    }
}
