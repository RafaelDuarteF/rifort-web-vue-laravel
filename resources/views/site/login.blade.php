@extends('general.basic')
@section('assets.css')
    <link href="{{ asset($cssPath . 'login.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('assets.js')
    <script src="{{ asset($jsPath . 'login.js') }}"></script>
@endsection

@section('header')
@endsection

@section('conteudo')
    <login-component videos={{ $videosPath }} route_logar={{ route('site.logar') }}></login-component>
@endsection
@section('footer')
@endsection
