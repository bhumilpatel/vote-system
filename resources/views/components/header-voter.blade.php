<header class="header">
    <a href="{{ route('voter.index') }}" class="header-title">Vote System</a>
    <nav class="header-nav">
        @auth('voter')
            <a href="{{ route('voter.logout') }}" class="hover:text-failure">Exit</a>
        @endauth
    </nav>
</header>
