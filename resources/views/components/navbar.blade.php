<nav style="background: #eee; padding; 10px">
    @if (request()->query('username') === 'admin')
        <a href="/dashboard?username=admin">Dashboard</a>
        <a href="/pengelolaan?username=admin">Pengelolaan</a>
        <a href="/profile?username=admin">Profil</a>
    @else
        <a href="/login">Login</a>
    @endif
</nav>
