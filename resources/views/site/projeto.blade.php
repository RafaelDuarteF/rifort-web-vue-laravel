@extends('general.basic')
@section('nav')
    <span class="navSobreProjeto">O que é?</span>
    <span class="navSobreUso">Como é usado?</span>
@endsection
@section('conteudo')
    <projeto-component arts={{ $artsPath }} videos={{ $videosPath }}></projeto-component>
@endsection