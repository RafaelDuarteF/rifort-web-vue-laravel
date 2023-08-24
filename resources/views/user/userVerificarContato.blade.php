@extends('general.basic')
@section('conteudo')
    <user-contato-component 
       contato="{{ $contato }}"
       arts={{ $artsPath }}
       route_deletar_solicitacao={{ route('user.deletarContato') }}
       route_contatos={{ route('user.visualizarContatos') }}
       route_enviar_contato={{ route('user.enviarContato' )}}
    >
    </user-contato-component>
@endsection
@section('footer')
@endsection
