<?php
namespace App\Http\Controllers;
use DateTime;
use resources\csv;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CsvController extends Controller{
  public function index(Request $request){
    return view('admin.csv');
  }
  public function get_csv(Request $request){
    $date = new DateTime();
    $res=fopen(request('file'), "r");
    while(!feof($res)){
      $tabLigne=explode(';', fgets($res));
      if(!$tabLigne[0]) break;
      $usr=new User;
      $usr->name=$tabLigne[0];
      $usr->prenom=$tabLigne[1];
      $usr->email=$tabLigne[2];
      $usr->password= Str::random(40);
      $usr->register_token = Str::random(40) . $date->getTimestamp();
      $usr->save();
    }
    fclose($res);
    return redirect('admin/users');
  }
}
