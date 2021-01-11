<?php

namespace App\Http\Controllers\Administration;

use App\Models\Faqs;
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
        $faqs = Faqs::latest()->paginate(5);

        return view('admin.faqs.index', compact('faqs'))
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

        Faqs::create($request->all());

        return redirect('/admin/faqs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqs $faq)
    {
        $request->validate([
            'question' => 'required',
            'reponse' => 'required',
        ]);

        $faq->update($request->all());

        return redirect('/admin/faqs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $faq)
    {
        $faq->delete();

        return redirect('/admin/faqs');
    }
}
