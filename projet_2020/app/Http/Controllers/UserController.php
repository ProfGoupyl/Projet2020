<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
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
        if ($user->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }


        /**
     * Display the specified resource and relations.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function formations(user $user)
    {
        return DB::table('users')
        ->join('cours_user', 'users.id', '=', 'cours_user.user_id')
        ->join('cours', 'cours.id', '=', 'cours_user.cours_id')
        ->select('cours.id as coursId',
                'cours.titre as titre',
                'cours_user.start_at as start_at',
                'cours_user.end_at as end_at')
        ->where('cours_user.user_id', '=', $user->id)
        ->orderBy('cours_user.start_at', 'asc')
        ->get(); 
        
        
        // $userCours = User::find($user->id)->cours;
        // return $userCours;
  
    }

    
}
