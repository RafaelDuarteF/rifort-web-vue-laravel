<header>
    <div class="logoHeader" onclick="redirect('{{ route('site.index') }}')">
        <img alt="Página Principal" src="{{ asset('assets/arts/logoHeader.png') }}">
    </div>
    <ul class="menuNav">
        @yield('nav')
    </ul>
    <span class="loginHeader" onclick="redirect('{{route('site.login')}}')">Login</span>
</header>