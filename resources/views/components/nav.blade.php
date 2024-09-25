<nav class="nav-menu">
    <a href="/">Home</a>
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
        <form action="{{ route('logout') }}" method="post">
            @csrf

            <input type="hidden" name="user-id" id="user-id" value="{{ Auth::id() }}" />
            <button onclick="form.submit();">Uitloggen</button>
        </form>
    @endif
</div>
