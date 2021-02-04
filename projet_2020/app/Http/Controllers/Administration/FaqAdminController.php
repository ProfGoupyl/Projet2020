<?php

namespace App\Http\Controllers\Administration;

use App\Models\Faqs;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\users;
use App\Http\Controllers\Controller;

class FaqAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  App\Models\Faqs;
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {

        // return view('admin.faqs.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {


        $faq = new Faqs;

        $module = Module::find($request->request->get('modules'));

        $faq->module_id = $module->id;


        $faq->question = $request->has('question') && strlen($request->question) ? $request->question : $faq->question;
        $faq->reponse = $request->has('reponse') && strlen($request->reponse) ? $request->reponse : $faq->reponse;

        $faq->save();
        return redirect('/admin/faqs/' . $module->id);
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show($id)
    {
        $faqs = Faqs::where('module_id','=', $id)->get();
    
        $module= Module::find($id);
        
        return view('admin.faqs.index', [
            'faqs' => $faqs,
            'id' => $id,
            'module'=>$module
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit(Faqs $faq)
    {

        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * 
     */
    public function update(Request $request, $id)
    {

        $faq = Faqs::find($id);
        $faq->question = $request->has('question') && strlen($request->question) ? $request->question : $faq->question;
        $faq->reponse = $request->has('reponse') && strlen($request->reponse) ? $request->reponse : $faq->reponse;
        $faq->save();
        return redirect('/admin/faqs/' . $faq->module_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();
        return redirect('/admin/faqs/' . $faq->module_id);
    }
}
