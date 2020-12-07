<?php

namespace App\Http\Controllers;

use App\Models\Users_cours;
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
        return Users_cours::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Users_cours::create($request->all())){
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function show(Users_cours $users_cours)
    {
        return $users_cours;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users_cours $users_cours)
    {
        if ($users_cours->update($request->all())){
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users_cours  $users_cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users_cours $users_cours)
    {
        if ($users_cours->delete()){
            return response()->json(['delete succes'], 200);
        }
    }
}
