<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }


    protected $fillable = [
        'text',
        'module_id',
        'user_id',
        'cours_id'
    ];
}
