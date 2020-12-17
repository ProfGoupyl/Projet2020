<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">Front test</a>
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/faq">Faq</a></li>
            <li><a href="/profile">Profile</a></li>
            <li><a href="/cours">Cours</a></li>
            <li><a href="/user">User</a></li>
            <li><a href="/session">Session</a></li>
            @if (Auth::user() && Auth::user()->admin === 1)
            <li>
                <p>Vous êtes connecté(e) en tant que {{ Auth::user()->name }} {{ Auth::user()->prenom }} (Admin)</p>
               <a href="{{ url('/admin') }}">Dashboard</a>
               <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-dropdown-link>
            </form>
            </li>
            @endif
            @if (Auth::user() && Auth::user()->admin === 0)
            <li>
                <p>Vous êtes connecté(e) en tant que <span>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-dropdown-link>
                </form>
            </li>
            @endif
        </ul>
    </div>
</div>