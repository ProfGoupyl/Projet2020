<?php

namespace App\Http\Controllers\Administration;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cours;
use Symfony\Component\HttpFoundation\JsonResponse;

class ModuleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.moduleAdmin'['modules' => $modules]);
    }

    public function update(Request $request, $id)
    {
        if (!$request->request->get('general-data')) {
            // Récupération du module dont l'odre a été modifié ainsi que du cours d'où l'on vient
            $module = Module::find($request->request->get('data')[0]);
            $modules = Cours::find($request->request->get('cours'))->modules;
            // Stockage de l'ancien ordre et du nouvel ordre du cours
            $order_old = $module->ordre;
            $order_new = +$request->request->get('data')[1];
            //=========================================================
            // Boucles sur les inputs dont il faut aussi modifié l'odre
            // ========================================================
            // Décrémente la valeur "ordre" des inputs compris entre l'ancienne valeur du module et la nouvelle valeur du module (exemple : si le module intro a pour ordre de base "3" et qu'il devient "7", les inputs "4" à "7" diminuent tous d'un cran)
            if ($order_new > $order_old) {
                foreach ($modules as $m) {
                    if ($m->ordre > $order_old && $m->ordre <= $order_new) {
                        $m->ordre--;
                        $m->save();
                    }
                }
            }
            // Incrémente la valeur "ordre" des inputs compris entre l'ancienne valeur du module et la nouvelle valeur du module (exemple : si le module intro a pour ordre de base "7" et qu'il devient "3", les inputs "3" à "6" augmentent tous d'un cran)
            else if ($order_new < $order_old) {
                foreach ($modules as $m) {
                    if ($m->ordre >= $order_new && $m->ordre < $order_old) {
                        $m->ordre++;
                        $m->save();
                    }
                }
            }
            // Change l'odre du module choisis pour sa nouvelle valeur
            $module->ordre = $order_new;
            $module->save();
            // Redirection vers la page du cours concerné
            return redirect('/admin/cours/' . $request->request->get('cours'));
        } else {
            // Modification des données d'un module

            return redirect('/admin/cours/' . $request->request->get('cours'));
        }
    }
}
