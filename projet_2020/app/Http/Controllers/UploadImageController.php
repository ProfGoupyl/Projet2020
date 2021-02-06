<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function upload(Request $request) {
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/users'), $imageName);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $root = $_SERVER['DOCUMENT_ROOT'];
        $file = $root.'/images/users/user'.$id.'.png';

        if(file_exists($file)) {
            unlink($file);
        }
    }
}
