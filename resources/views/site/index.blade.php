@extends('general.basic')

@section('nav')
    <span class="navProposta">Proposta</span>
    <span class="navSobreNos">Sobre nós</span>
    <span class="navContato">Contato</span>
@endsection

@section('conteudo')
    <index-component route_projeto="{{ route('site.projeto') }}" participantes={{ $participantesPath }} arts={{ $artsPath }} videos={{ $videosPath }}></index-component>
@endsection

