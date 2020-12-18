<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

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
        return view('admin.index', [
            'users' => $users
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
