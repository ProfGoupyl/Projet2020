<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use resources\csv;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DateTime;

class CsvController extends Controller{
  public function index(Request $request){
    return view('admin.csv');
  }
  public function get_csv(Request $request){
    $res=fopen(request('file'), "r");
    while(!feof($res)){
      $tabLigne=explode(';', fgets($res));
      if(!$tabLigne[0]) break;
      $usr=new User();
      $date = new DateTime();
      $register_token = Str::random(40) . $date->getTimestamp();
        // insert users
      $usr->name=$tabLigne[0];
      $usr->prenom=$tabLigne[1];
      $usr->email=$tabLigne[2];
      $usr->admin =$tabLigne[3];
      $usr->password=$tabLigne[4];
      $usr->api_token = $register_token;
      $usr->save();

         // ENVOI EMAIL
       $data = [
        'subject' => "Invitation aux cours",
        'name' => $usr->name=$tabLigne[0],
        'email' => $usr->email=$tabLigne[2],
        'content' => [
            'message' => "Cliquez sur le lien suivant pour accepter l'invitation au cours de Goupyl:",
            'link' => route('register').'?token='.$register_token
        ]
    ];
    Mail::send('admin.email.invitation-template',$data, function($message) use ($data) {
        $message->to($data['email'])
                ->subject($data['subject']);
    });

    }
    fclose($res);
    return redirect('/admin/users');
  }
}




