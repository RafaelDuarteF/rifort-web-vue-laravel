@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'login.css')}}" type="text/css" rel="stylesheet"/>
@endsection

@section('header')
@endsection

@php
    $erroAutenticacao = '0';
    $erroConexao = '0';
    $errosInput = [];
@endphp

@if($errors->has('erroAutenticacao'))
    @php $erroAutenticacao = '1'; @endphp
@endif
@if($errors->has('erroConexao'))
    @php $erroConexao = '1'; @endphp
@endif
@if($errors->has('name') || $errors->has('password'))
    @php 
        $errosInput = [
            'nome' => $errors->first('name'),
            'senha' => $errors->first('password'),
        ]; 
    @endphp
@endif

@section('conteudo')
    <login-component
        erro_autenticacao={{ $erroAutenticacao }}
        erro_conexao={{ $erroConexao }}
        erro_nome="{{ $errosInput['nome'] ?? null }}"
        erro_senha="{{ $errosInput['senha'] ?? null }}"
        old_nome="{{ old('name') ?? '' }}"
        csrf={{ csrf_token() }}
        videos={{ $videosPath }}
        route_logar={{ route('site.logar') }}
    >
    </login-component>
@endsection
@section('footer')
@endsection
