<nav class="nav-menu">
    <a href="/home">Home</a>
    <a href="{{ route('reviews.index') }}">Alle reviews</a>

    @if (Auth::check())
        <a href="{{ route('reviews.create') }}">Nieuwe review</a>
    @endif
</nav>
<div class="login-container">
    @if (!Auth::check())
        <a class="login-button" href="{{ route('login') }}">Inloggen</a>
    @else
        <span class="user-name">{{ Auth::user()->name }}</span>
        <a class="login-button" href="{{ route('logout') }}"><x-icon iconCode="box-arrow-right"/></a>
    @endif
</div>
