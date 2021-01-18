<?php

namespace App\Http\Controllers;

use App\Models\Cours_user;
use Illuminate\Http\Request;

class UserCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cours_user::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Cours_user::create($request->all())) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours_user $users_cour)
    {
        return $users_cour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours_user $users_cour)
    {
        if ($users_cour->update($request->all())) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours_user $users_cour)
    {
        if ($users_cour->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
