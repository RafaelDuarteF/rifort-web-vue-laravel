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
@section('assets.js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6ORxjL9JSXo2VVa9HSoNV-r34dprnXV0" async defer></script>
@endsection