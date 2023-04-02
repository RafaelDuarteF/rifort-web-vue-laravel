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
    @if($errors->has('erroAutenticacao'))
        <p>Deu bosta</p>
    @endif

    <div class="loginWrapper">
        <video autoplay muted loop>
            <source src="{{asset($videosPath . 'fundo2.mp4')}}" type="video/mp4"/>
        </video>
        <div class="gLogin">
            <div class="card-login">
                <h1>Login</h1>
                <form action="{{ route('site.logar') }}" id="formLogin" method="POST">
                    @csrf
                    <label>Nome:</label>
                    <input type="text" name="name" placeholder="Nome de usuário"/>
                    <label class="senhaLogin">Senha:</label>
                    <input type="password" name="password" placeholder="Senha"/>
                    <button class="buttonSubmit" type="submit">LOGAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
