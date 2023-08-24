<header class="<?php if(isset($headerInv) && $headerInv == false) { echo 'headerInv'; } else { echo 'header'; } ?>" style="<?php if(isset($headerInv) && $headerInv == false) { echo 'background-color: rgba(40, 40, 40, 0.9)'; }?>">
    <div class="logoHeader" onclick="redirect('{{ route('site.index') }}')">
        <img alt="Página Principal" src="{{ asset('assets/arts/logoHeader.png') }}">
    </div>
    <ul class="menuNav">
        @yield('nav')
    </ul>
    @if((isset($loginOption) && $loginOption) || !isset($loginOption))
        <span class="loginHeader" onclick="redirect('{{ route('site.login') }}')">Login</span>
    @else
        <img class="perfilHeader" src="{{ asset('assets/arts/perfil.png') }}"/>
    @endif
</header>