<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use App\Models\Module;
use App\Models\Cours;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Commentaire::all();
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
            'text' => 'required|max:300|alpha_num',
        ]);

        $commentaire = new Commentaire;

        $commentaire->text = $request->has('text');
        $user_id = User::find($request->user_id);
        $module_id = Module::find($request->module_id);
        $cours_id = Cours::find($request->cours_id);

        if ($user_id) {
            $commentaire->user()->associate($cours_id);
        }
        if ($module_id) {
            $commentaire->modules()->associate($module_id);
        }
        if ($cours_id) {
            $commentaire->cours()->associate($cours_id);
        }

        $commentaire->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return $commentaire;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        // Pas besoin d'update pour le commentaire
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
    }
}
