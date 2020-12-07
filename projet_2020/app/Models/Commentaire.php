<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cours() {
        return $this->belongsTo(Cours::class);
    }

    public function modules() {
        return $this->belongsTo(Module::class);
    }
}
