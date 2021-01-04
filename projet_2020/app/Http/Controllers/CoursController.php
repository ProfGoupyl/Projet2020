<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cours::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'titre' => 'required|alpha_num|max:255',
        ]);

        if (Cours::create($data)) {
            return response()->json(['insert succes'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cour)
    {
        return $cour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cours $cour)
    {
        $data = request()->validate([
            'titre' => 'required|alpha_num|max:255',
        ]);

        if ($cour->update($data)) {
            return response()->json(['update succes'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cour)
    {
        if ($cour->delete()) {
            return response()->json(['delete succes'], 200);
        }
    }
}
