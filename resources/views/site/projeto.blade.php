@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'projeto.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('assets.js')
    <script src="{{ asset($jsPath . 'projeto.js')}}"></script>
@endsection
@section('nav')
    <span class="navSobreProjeto">O que é?</span>
    <span class="navSobreUso">Como é usado?</span>
@endsection
@section('conteudo')
    <div class="projetoFundo">
        <h2>Tecnologia e conforto em seu transporte.</h2>
        <span>Confira todas as informações sobre nosso projeto.</span>
        <video autoplay muted loop>
            <source src="{{asset($videosPath . 'projeto-fundo.mp4')}}" type="video/mp4"/>
        </video>
    </div>
    <div class="infosProjeto sw">
        <div class="sobreProjeto">
            <h2>O que é?</h2>
            <div class="infos_sobreProjeto" id="secao1">
                <img alt="Sobre o projeto" src="{{ asset('assets/arts/bus-stop.png')}}"/>
                <span>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
                 e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de
                 tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só
                 a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente
                 inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens
                 de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica
                 como Aldus PageMaker.
                </span>
            </div>
            <h2>Como é usado?</h2>
            <div class="infos_sobreProjeto" id="secao2">
                <h4>Protótipo</h4>
                <video autoplay muted loop>
                    <source src="{{asset($videosPath . 'prototipo-projeto.mp4')}}" type="video/mp4"/>
                </video>
                
                <progress id="barraDeProgresso" value="0" max="100"></progress>
                <span>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos,
                 e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de
                 tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só
                 a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente
                 inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens
                 de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica
                 como Aldus PageMaker.
                </span>
            </div>
        </div>
    </div>
@endsection