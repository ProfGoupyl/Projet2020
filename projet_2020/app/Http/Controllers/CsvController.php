<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Cours;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;


class CsvController extends Controller
{
  public function index(Request $request)
  {
    return view('admin.csv');
  }
  public function get_csv(Request $request)
  {
    $date = new DateTime();
    $res = fopen(request('file'), "r");
    while (!feof($res)) {
      $tabLigne = explode(';', fgets($res));
      if (!$tabLigne[0]) break;
      $this->generate_user($tabLigne[2], $tabLigne[0], $tabLigne[1]);
    }
    fclose($res);
    return redirect('/admin/users');
  }

  public function add_to_cours(Request $request)
  {
    $res = fopen(request('file'), 'r');
    $cours = Cours::find($request->request->get('cours'));
    while (!feof($res)) {
      $tabLigne = explode(';', fgets($res));
      if (!$tabLigne[0]) break;

      $this->generate_user($tabLigne[2], $tabLigne[0], $tabLigne[1]);

      $user = User::where('email', '=', str_replace("\r\n", '', $tabLigne[2]))->get()[0];

      $existing = Cours::whereHas('users', function ($q) use ($user) {
        $q->where('users.id', '=', $user->id);
      })->get();
      if (!empty($existing[0])) {
        $user->cours()->sync($cours, ['start_at' => $cours->debut_du_cours, 'end_at' => $cours->fin_du_cours]);
      } else {
        $user->cours()->attach($cours, ['start_at' => $cours->debut_du_cours, 'end_at' => $cours->fin_du_cours]);
      }

      // ENVOI EMAIL
      $data = [
        'subject' => "Invitation aux cours",
        'name' => $user->name,
        'email' => str_replace("\r\n", '', $user->email),
        'content' => [
          'message' => "Vous avez été invité au cours" . $cours->titre . ". Bienvenue !"
        ]
      ];
      Mail::send('admin.email.invitation-cours-template', $data, function ($message) use ($data) {
        $message->to($data['email'])
          ->subject($data['subject']);
      });
    }
    fclose($res);
    return redirect('/admin/cours');
  }




  protected function generate_user($email_raw, $name, $firstname)
  {
    $email = str_replace("\r\n", '', $email_raw);
    $existing = User::where('email', '=', $email)->get();
    if (!isset($existing[0])) {
      $user = new User();
      $date = new DateTime();
      $register_token = Str::random(40) . $date->getTimestamp();
      // insert users
      $user->name = $name;
      $user->prenom = $firstname;
      $user->email = $email;
      $user->admin = false;
      $user->password = "undefined";
      $user->api_token = $register_token;
      $user->save();

      // ENVOI EMAIL
      $data = [
        'subject' => "Invitation aux cours",
        'name' => $user->name = $name,
        'email' => $user->email = $email,
        'content' => [
          'message' => "Cliquez sur le lien suivant pour accepter l'invitation au cours de Goupyl:",
          'link' => route('register') . '?token=' . $register_token
        ]
      ];
      Mail::send('admin.email.invitation-template', $data, function ($message) use ($data) {
        $message->to($data['email'])
          ->subject($data['subject']);
      });
    }
  }
}
