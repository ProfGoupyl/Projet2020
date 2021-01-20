<?php

namespace App\Http\Controllers\Administration;

use App\Models\Cours;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::all();
        return view('admin.cours.index', [
            'cours_list' => $cours,
            'date' => "2020-01-31"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cours = new Cours();


        $date = date('y-m-d');
        $new = strtotime($date);
        
        
         
        
        
        $cours->titre = $request->has('titre') && strlen($request->titre) ? $request->titre : "Pas de titre";

        if($request->has('debut_du_cours') && strlen($request->debut_du_cours) && strtotime($request->debut_du_cours) > $new ) {
                $cours->debut_du_cours= $request->debut_du_cours;
            }else{
                $cours->debut_du_cours = 'pas de debut de cours';
            };


        if($request->has('fin_du_cours') && strlen($request->fin_du_cours) && strtotime($request->fin_du_cours) > strtotime($request->debut_du_cours)){
                $cours->fin_du_cours= $request->fin_du_cours;
            }else{
                $cours->fin_du_cours = 'pas de fin de cours';
            }
    
        
            
        



       


        $cours->save();
        return redirect('/admin/cours');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function show(Cours $cours, $id)
    {
        $cours = Cours::find($id);
        $modules = $cours->modules->sortBy('ordre');



        return view('admin.cours.show', ['cours' => $cours, 'modules' => $modules]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cours = Cours::find($id);
        $cours->titre = $request->has('titre') && strlen($request->titre) ? $request->titre : $cours->titre;
        $cours->debut_du_cours = $request->has('debut_du_cours') && strlen($request->debut_du_cours) ? $request->debut_du_cours : $cours->debut_du_cours;
        $cours->fin_du_cours = $request->has('fin_du_cours') && strlen($request->fin_du_cours) ? $request->fin_du_cours : $cours->fin_du_cours;
        $cours->save();
        return redirect('/admin/cours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cours $cours, $id)
    {
        $cours = Cours::find($id);
        $cours->delete();
        return redirect('/admin/cours');
    }
}
