<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function upload(Request $request) {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/users'), $imageName);

        return response()->json(['success' => 'Photo de profil modifiée.']);
    }
}
