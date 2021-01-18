<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use resources\csv;
use App\Models\User;
use Illuminate\Support\Str;

class CsvController extends Controller
{
  public function index(Request $request)
  {
    return view('admin.csv');
  }
  public function get_csv(Request $request)
  {
    $res = fopen(request('file'), "r");
    while (!feof($res)) {
      $tabLigne = explode(';', fgets($res));
      if (!$tabLigne[0]) break;
      $usr = new User;
      $usr->name = $tabLigne[0];
      $usr->prenom = $tabLigne[1];
      $usr->email = $tabLigne[2];
      $usr->password = Str::random(40);
      $usr->save();
    }
    fclose($res);
    return redirect('admin/users');
  }

  public function add_to_cours(Request $request)
  {
    $res = fopen(request('file'), 'r');
    $cours = Cours::find($request->request->get('cours'));
    while (!feof($res)) {
      $tabLigne = explode(';', fgets($res));
      if (!$tabLigne[0]) break;
      $user = User::where('email', '=', $tabLigne[2])->firstOrFail();
      $user->cours()->attach($cours);
    }
  }
}
