<nav class="navPrincipale">

    <ul class="navigation">

        <li class="items">
            <a href="/"><img src="{{ asset('images/logo.svg') }}" alt="" class="logo" height="80px" width="80px"></a>
        </li>
        @if (Auth::user() === null)
            <li>
                <a href="/login">Se connecter</a>
            </li>
        @endif

        @if(\Request::is('admin/*'))
        <li class="items">
            <a href="/admin/cours">cours</a>

        <li class="items">
            <a href="/admin/users">Utilisateurs</a>
        </li>
        @else
        <li class="items">
            <a href="/user">Mes cours</a>
        </li>
        @endif
        <li class="items">
            <figure>
                @if (Auth::user())
                    @php
                        $file = asset('images/users/user'.Auth::user()->id).'.png';
                        if(file_exists($file)) {
                            $src = 'ok';
                        } else {
                            $src = 'nok';
                        }
                    @endphp
                    @if ($src === 'ok')
                        <img src="{{ asset('images/users/user'.Auth::user()->id).'.png' }}" alt="" class="UserImage" height="80px" width="80px">
                    @elseif ($src === 'nok')
                        <img src="https://via.placeholder.com/80" alt="" class="UserImage" height="80px" width="80px">
                    @endif
                @endif
            </figure>
            <ul class="sous">
                <li>
                    <a href="/profile" class="UserName">Profil</a>
                </li>
                @if (Auth::user())
                @if (Auth::user() && Auth::user()->admin === 1)
                <li>
                    @if(!\Request::is('admin/*'))
                    <a href="{{ url('/admin') }}">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
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
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                    <p>Vous êtes connecté(e) en tant que <span>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></p>
                </li>
                @endif
                @else
                <li>
                    <a href="/login">Login</a>
                </li>
                @endif
            </ul>

            <li class="items hide">   
                @if (Auth::user())
                @if (Auth::user() && Auth::user()->admin === 1)
                <p>
                    @if(!\Request::is('admin/*'))
                    <a href="{{ url('/admin') }}">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                    <p>Vous êtes connecté(e) en tant que {{ Auth::user()->name }} {{ Auth::user()->prenom }} (Admin)</p>
                </p>
                @endif
                @if (Auth::user() && Auth::user()->admin === 0)
                <p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                    <p>Vous êtes connecté(e) en tant que <span>{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></p>
                </p>
                @endif
                @else
                @endif
            </li>   
          

        </li>
        <li class="burger"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</nav>