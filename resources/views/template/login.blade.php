@auth
    Hi, <a href="/login" class="link">{{ Auth::user()->name }}</a>
@endauth
@guest
    <a href="/login" class="link">Log in</a>
@endguest