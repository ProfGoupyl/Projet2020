<?php

namespace App\Http\Controllers;

use DateTime;
use resources\csv;
use App\Models\User;
use App\Models\Cours;
use App\Models\Cours_user;
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
      $usr = new User();
      $date = new DateTime();
      $register_token = Str::random(40) . $date->getTimestamp();
      // insert users
      $usr->name = $tabLigne[0];
      $usr->prenom = $tabLigne[1];
      $usr->email = $tabLigne[2];
      $usr->admin = $tabLigne[3];
      $usr->password = $tabLigne[4];
      $usr->api_token = $register_token;
      $usr->save();

      // ENVOI EMAIL
      $data = [
        'subject' => "Invitation aux cours",
        'name' => $usr->name = $tabLigne[0],
        'email' => $usr->email = $tabLigne[2],
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
      $user = User::where('email', '=', $tabLigne[2])->firstOrFail();
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
}
