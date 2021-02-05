<?php

namespace App\Http\Controllers\Administration;

use App\Models\user;
use App\Models\Cours;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursUsersController  extends Controller {

    public function delete(Request $request){
        
        $users = User::find($request->request->get('users'));
        $cours = Cours::find($request->request->get('cours'));
        
        foreach($users as $user){
            $user->cours()->detach($cours);
        }
       
        return redirect('/admin/cours/' .$cours->id);

}

}
