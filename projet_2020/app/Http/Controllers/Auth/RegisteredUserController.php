<?php

namespace App\Http\Controllers\Auth;

use DateTime;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::where('register_token', '=', $request->token)
            ->first();

        //  dump($request->token);
        //  dd($user->cours[1]->titre);

        $now = new DateTime();

        if ($request->has('pseudo') && $request->filled('pseudo')) {
            $user->pseudo = $request->pseudo;
        } else {
            $user->pseudo = $user->prenom;
        }

        $user->name = $user->name;
        $user->prenom = $user->prenom;
        $user->email = $user->email;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(100);
        $user->remember_token = '';
        $user->register_token = '';
        $user->email_verified_at = $now;
        $user->registered = 1;
        $user->save();

        return redirect('/login');
    }



    public function createAdmin(Request $request)
    {

        if ($request->pseudo === 'admin') {

            $user = User::where('pseudo', '=', $request->pseudo)
                ->first();

            if (!$user) {
                $user = new User;
                $now  = new DateTime();

                $user->name = 'admin';
                $user->prenom = 'admin';
                $user->pseudo = 'admin';
                $user->email = 'admin@mail.com';
                $user->password = Hash::make('adminSecret');
                $user->api_token = Str::random(100);
                $user->remember_token = '';
                $user->register_token = '';
                $user->email_verified_at = $now;
                $user->registered = 1;
                $user->admin = 1;
                $user->save();
            }
        }

        return redirect('/login');
    }
}
