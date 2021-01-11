<figure>
    <a href="/profile" class="UserName">
        <img src="" alt="" class="UserImage" height="80px" width="80px">
    </a>
</figure>
<nav class="navPrincipale">
    <ul class="navigation">
        <li><a href="/">Home</a></li>
        <li><a href="/user">Cours</a></li>
        <li><a href="/faq">FAQ</a></li>
        @if (Auth::user() && Auth::user()->admin === 1)
        <li>
            <a href="{{ url('/admin') }}">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-dropdown-link>
            </form>
            <p>Vous êtes connecté(e) en tant que {{ Auth::user()->name }} {{ Auth::user()->prenom }} (Admin)</p>
        </li>
        @endif
        @if (Auth::user() && Auth::user()->admin === 0)
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-dropdown-link>
            </form>
            <p>Vous êtes connecté(e) en tant que <span>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></p>
        </li>
        @endif
    </ul>
</nav>