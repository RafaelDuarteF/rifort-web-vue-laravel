@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'index.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('assets.js')
    <script src="{{ asset($jsPath . 'index.js')}}"></script>
@endsection

@section('nav')
    <span class="navProposta">Proposta</span>
    <span class="navSobreNos">Sobre nós</span>
    <span class="navContato">Contato</span>
@endsection

@section('conteudo')
    @if(!empty(session()->has('contatoEnv')))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Contato realizado com sucesso!',
                text: 'Responderemos no E-Mail informado em até 48 horas.',
            });
        </script>
    @endif
    @if(!empty($errors->has('erroContato')))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao enviar o contato. Por favor, tente novamente.',
            });
        </script>
    @endif
    <div class="videoFundo">
        <h2>Um toque de conforto e segurança em cada viagem.</h2>
        <span>Apoie o projeto RIFORT.</span>
        <video autoplay muted loop>
            <source src="{{asset($videosPath . 'fundo.mp4')}}" type="video/mp4"/>
        </video>
    </div>
    <div class="wrapperInfos sw">
        <div class="infos box" id="secao1">
            <h2>Seu transporte público com conforto e segurança que apenas a RIFORT pode proporcionar</h2>
            <div class="textImg">
                <img alt="Proposta" src="{{ asset($artsPath . 'proposta.svg') }}"/>
                <span>Com nossos sensores, trazemos uma solução para o gigante problema de qualidade e segurança
                 relacionada as lotações dos ônibus nas grandes metrópoles.</span>
            </div>
        </div>
        @include('site/_partials/index/sobre-nos')
        @include('site/_partials/index/contato')
    </div>
    @if(!empty($errors->has('email')) || !empty($errors->has('assunto')) || !empty($errors->has('mensagem')))
        <script>
            $('html, body').animate({
                scrollTop: $('.contatoForm form').offset().top + 450
            }, 1000);
        </script>
    @endif
@endsection

