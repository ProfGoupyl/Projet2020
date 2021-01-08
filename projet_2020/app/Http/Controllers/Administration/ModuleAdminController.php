<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // return view('admin.moduleAdmin'['modules' => $modules]);
    }

    public function update(Request $request,$id)
    {
       
       
    }


}
