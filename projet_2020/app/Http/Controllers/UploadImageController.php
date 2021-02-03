<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function upload(Request $request) {
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/users'), $imageName);
    }
}
