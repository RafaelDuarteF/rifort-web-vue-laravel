<header>
    <div class="logoHeader"><img src="{{ asset('assets/arts/logoHeader.png') }}"></div>
    <ul class="menuNav">
        @yield('nav')
    </ul>
    <span class="loginHeader" onclick="redirect('{{route('site.login')}}')">Login</span>
</header>