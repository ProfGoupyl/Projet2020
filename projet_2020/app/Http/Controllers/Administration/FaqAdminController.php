<?php

namespace App\Http\Controllers\Administration;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs =Faq::latest()->paginate(5);
    
        return view('admin.faqs.index',compact('faqs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'reponse' => 'required',
        ]);
    
       Faq::create($request->all());
     
        return redirect()->route('admin.faqs.index')
                        ->with('success','(ง^o^) good job');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faqs)
    {
        return view('admin.faqs.show',compact('faq'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faqs)
    {
        return view('admin.faqs.edit',compact('faq'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'reponse' => 'required',
        ]);
    
        $faq->update($request->all());
    
        return redirect()->route('admin.faqs.index')
                        ->with('success','(ง^o^) good job');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
    
        return redirect()->route('admin.faqs.index')
                        ->with('success','(ง^o^) good job');
    }
}