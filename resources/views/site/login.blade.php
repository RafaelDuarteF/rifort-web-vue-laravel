@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'login.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('assets.js')
    <script src="{{ asset($jsPath . 'login.js')}}"></script>
@endsection

@section('header')
@endsection

@section('conteudo')
    <div class="loginWrapper">
        <video autoplay muted loop>
            <source src="{{asset($videosPath . 'fundo2.mp4')}}" type="video/mp4"/>
        </video>
        <div class="gLogin">
            <div class="card-login">
                <h1>Login</h1>
                <form action="" id="formLogin" method="POST">
                    <label>E-Mail:</label>
                    <input type="text" name="email" placeholder="Email"/>
                    <label class="senhaLogin">Senha:</label>
                    <input type="password" name="senha" placeholder="Senha"/>
                    <button class="buttonSubmit" type="submit">LOGAR</button>
                </form>
                <span>Não é cadastrado ainda? <br><a>Cadastre-se</a></span>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
