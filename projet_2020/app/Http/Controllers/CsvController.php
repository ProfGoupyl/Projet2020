<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use resources\csv;
class CsvController extends Controller{
  public function index(Request $request){
    return view('administration.csv');
  }
  public function get_csv(Request $request){
    $res=fopen(request('file'), "r");
    while(!feof($res)){
      $tabLigne=explode(';', fgets($res));
      foreach($tabLigne as &$v){
        echo $v.'<br>';
      }
      echo '<br>';
    }
    fclose($res);
  }
}
