@extends('general.basic')
@section('conteudo')
    <user-contatos-component 
       contatos="{{ $contatosAtributos }}"
       arts={{ $artsPath }}
       route_deletar_solicitacao={{ route('user.deletarContato') }}
       route_verificar_contato={{ route('user.verificarContato') }}
    >
    </user-contatos-component>
@endsection
@section('footer')
@endsection
