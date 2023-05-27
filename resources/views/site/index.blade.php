@extends('general.basic')

@section('nav')
    <span class="navProposta">Proposta</span>
    <span class="navAplicacao">Aplicação</span>
    <span class="navSobreNos">Sobre nós</span>
    <span class="navContato">Contato</span>
@endsection

@php
    $erroPreenchimento = '0';
    $contatoEnviado = '0';
    $erroContato = '0';
    $error = [];
@endphp

@if($errors->has('email') || $errors->has('assunto') || $errors->has('mensagem'))
    @php
        $erroPreenchimento = true;
        $error = [
            'email' => $errors->first('email') ?? null,
            'assunto' => $errors->first('assunto') ?? null,
            'mensagem' => $errors->first('mensagem') ?? null,
        ];
    @endphp
@endif

@if(session()->has('contatoEnv'))
    @php $contatoEnviado = '1'; @endphp
@endif
@if($errors->has('erroContato'))
    @php $erroContato = '1'; @endphp
@endif

@section('conteudo')
    <index-component
        csrf={{ csrf_token() }}
        route_contato="{{ route('site.enviarContato') }}"
        route_projeto="{{ route('site.projeto') }}"
        route_aplicacao="{{ route('site.application') }}"
        participantes={{ $participantesPath }}
        arts={{ $artsPath }}
        videos={{ $videosPath }}
        old_contato_email="{{ old('email') ?? '' }}"
        old_contato_assunto="{{ old('assunto') ?? '' }}"
        old_contato_mensagem="{{ old('mensagem') ?? '' }}"
        erro_preenchimento={{ $erroPreenchimento ?? false }}
        contato_enviado={{ $contatoEnviado ?? false }}
        erro_contato={{ $erroContato ?? false }}
        erro_email="{{ $error['email'] ?? null }}"
        erro_assunto="{{ $error['assunto'] ?? null }}"
        erro_mensagem="{{ $error['mensagem'] ?? null }}"
    >
        </index-component>
@endsection