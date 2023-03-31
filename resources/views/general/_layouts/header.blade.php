<header>
    <div class="logoHeader" onclick="redirect('{{ route('site.index') }}')">
        <img src="{{ asset('assets/arts/logoHeader.png') }}">
    </div>
    <ul class="menuNav">
        @yield('nav')
    </ul>
    <span class="loginHeader" onclick="redirect('{{route('site.login')}}')">Login</span>
</header>