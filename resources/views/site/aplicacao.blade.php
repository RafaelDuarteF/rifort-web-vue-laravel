@extends('general.basic')
@section('header')
@endsection

@section('conteudo')
    <aplicacao-component
        route_verificar_chegadas={{ route('site.application.verificarChegadas') }}
        arts={{ $artsPath }}
        route_index={{ route('site.index') }}
    >
    </aplicacao-component>
@endsection

@section('footer')
@endsection