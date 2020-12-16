<?php

use Illuminate\Support\Facades\Auth;


$user = Auth::user();





var_dump($user->api_token);



?>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ __('Logout') }}
    </x-dropdown-link>
</form>