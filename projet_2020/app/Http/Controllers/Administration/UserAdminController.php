<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Cours;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $cours = Cours::all();
        return view('admin.users.index', [
            'users' => $users,
            'cours' => $cours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.UserAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cours = Cours::find($request->request->get('cours'));

        $user = new User();
        $date = new DateTime();
        $register_token = Str::random(40) . $date->getTimestamp();

        $user->email = $request->has('email') && strlen($request->email) ? $request->email : "Pas d'email";
        $user->name = $request->has('name') && strlen($request->name) ? $request->name : "Pas de nom";
        $user->prenom = $request->has('prenom') && strlen($request->prenom) ? $request->prenom : "Pas de prénom";
        $user->admin = 0;
        $user->password = "undefined";
        $user->register_token = $register_token;
        $user->save();

        // ENVOI EMAIL
        $data = [
            'subject' => "Invitation aux cours",
            'name' => $request->name,
            'email' => $request->email,
            'content' => [
                'message' => "Cliquez sur le lien suivant pour accepter l'invitation au cours de Goupyl:",
                'link' => route('register') . '?token=' . $register_token
            ]
        ];
        Mail::send('admin.email.invitation-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        //Invite au cours
        if ($cours != "null") {
            $user->cours()->attach($cours, ['start_at' => $cours->debut_du_cours, 'end_at' => $cours->fin_du_cours]);
            // ENVOI EMAIL
            $data = [
                'subject' => "Invitation aux cours",
                'name' => $user->name,
                'email' => str_replace("\r\n", '', $user->email),
                'content' => [
                    'message' => "Vous avez été invité au cours" . $cours->titre . ". Bienvenue !"
                ]
            ];
            Mail::send('admin.email.invitation-cours-template', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject($data['subject']);
            });
        }

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->has('name') && strlen($request->name) ? $request->name : $user->name;
        $user->prenom = $request->has('prenom') && strlen($request->prenom) ? $request->prenom : $user->prenom;
        $user->pseudo = $request->has('pseudo') && strlen($request->pseudo) ? $request->pseudo : $user->pseudo;
        $user->email = $request->has('email') && strlen($request->email) ? $request->email : $user->email;
        $user->admin = $request->has('admin') && strlen($request->admin) ? $request->admin : $user->admin;
        $user->save();
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users');
    }
}
