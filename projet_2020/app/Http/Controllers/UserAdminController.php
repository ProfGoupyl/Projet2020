<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAdminController extends Controller
{

    public function show(User $user)
    {
        $users = User::all();

        return view('admin.usersAdmin', ['users' => $users]);
    }
}
