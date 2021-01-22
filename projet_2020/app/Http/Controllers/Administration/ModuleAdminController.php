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
     * @param  \App\Models\Cours  $cours
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.moduleAdmin'['modules' => $modules]);
    }

    public function destroy(Module $module)
    {
        $modules = Cours::find($module->cours->id)->modules;

        $order_old = $module->ordre;

        foreach ($modules as $m) {
            if ($m->ordre > $module->ordre) {
                $m->ordre--;
                $m->save();
            }
        }
    }

    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        if (!$request->request->get('general-data')) {
            // Récupération du module dont l'odre a été modifié ainsi que du cours d'où l'on vient

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
        } else {
            // Modification des données d'un module
            $module->titre = $request->has('titre') && strlen($request->titre) ? $request->titre : $module->titre;
            $module->description = $request->has('description') && strlen($request->description) ? $request->description : $module->description;
            $module->url_video = $request->has('url_video') && strlen($request->url_video) ? $request->url_video : $module->url_video;
            $module->save();
        }
        // Redirection vers la page du cours concerné
        return redirect('/admin/cours/' . $request->request->get('cours'));
    }

    public function store(Request $request)
    {
        $module = new Module;
        $cours = Cours::find($request->request->get('cours'))->module;
        dd($cours);
        $module->cours_id = $cours;

        $module->titre = $request->has('titre') && strlen($request->titre) ? $request->titre : $module->titre;
        $module->description = $request->has('description') && strlen($request->description) ? $request->description : $module->description;
        $module->url_video = $request->has('url_video') && strlen($request->url_video) ? $request->url_video : $module->url_video;
        $module->ordre = $request->has('ordre') && strlen($request->ordre) ? $request->ordre : $module->ordre;
        $module->save();

        return redirect('/admin/cours');
    }
}
