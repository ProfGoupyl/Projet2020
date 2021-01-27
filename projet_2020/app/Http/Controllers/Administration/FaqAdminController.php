<?php

namespace App\Http\Controllers\Administration;

use App\Models\Faqs;
use Illuminate\Http\Request;
use App\Models\Module;
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
        $faqs = Faqs::all();
        return view('admin.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        // $faqs = Faqs::create($request->validate([
        //     'question' => 'required',
        //     'reponse' => 'required']));
        // $module = new Module();
        // $module->module_id = $request->get('module_id');
        // $faqs = new Module;
        // $faqs = Module::find($request->request->get('cours'))->module;
        // $module->cours_id = $cours;
        //     return redirect('/admin/faqs');

        $faq = new Faqs;
        $module = Module::find($request->request->get('modules'));

        $faq->module_id = $module->id;

        $faq->question = $request->has('question') && strlen($request->question) ? $request->question : $faq->question;
        $faq->reponse = $request->has('reponse') && strlen($request->reponse) ? $request->reponse : $faq->reponse;   
        
        $faq->save();
        return redirect('/admin/faqs');

           
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show($id)
    {
     $faqs=Faqs::where('module_id','=',$id)->get();
     return view('admin.faqs.index',[
         'faqs'=>$faqs
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
    public function update(Request $request,$id)
    {
       $request->validate([
            'question' => 'required',
            'reponse' => 'required',
            
            ]);
            $faq = new Faqs(
                [
                    'question' => $request->get('question'),
                    'reponse' => $request->get('reponse'),
                    ]
                );
                $faq->save();
        return redirect('/admin/faqs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();

        return redirect('/admin/faqs');
    }
}
?>