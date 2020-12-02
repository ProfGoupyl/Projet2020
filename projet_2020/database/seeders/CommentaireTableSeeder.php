<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class CommentaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "1";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "2";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "19";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "20";
        $ommentaire->user_id = "4";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "15";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "11";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "12";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "18";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "28";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "17";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "27";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "7";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "23";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "14";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "21";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "2";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "21";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "13";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "8";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "8";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "4";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "92";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "28";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "11";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "1";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "26";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = "1";
        $ommentaire->cours_id = null;
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "1";
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "2";
        $ommentaire->user_id = "2";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "3";
        $ommentaire->user_id = "11";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "4";
        $ommentaire->user_id = "14";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "5";
        $ommentaire->user_id = "3";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "6";
        $ommentaire->user_id = "16";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "7";
        $ommentaire->user_id = "19";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "8";
        $ommentaire->user_id = "4";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "9";
        $ommentaire->user_id = "15";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "10";
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "11";
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "12";
        $ommentaire->user_id = "2";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "13";
        $ommentaire->user_id = "11";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "14";
        $ommentaire->user_id = "14";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "15";
        $ommentaire->user_id = "3";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "16";
        $ommentaire->user_id = "16";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "17";
        $ommentaire->user_id = "19";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "18";
        $ommentaire->user_id = "4";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "19";
        $ommentaire->user_id = "15";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();

        $ommentaire = new Commentaire();
        $ommentaire->text = "Ici du texte";
        $ommentaire->module_id = null;
        $ommentaire->cours_id = "20";
        $ommentaire->user_id = "1";
        $ommentaire->created_at = now();
        $ommentaire->updated_at = now();
        $ommentaire->save();
    }
}
