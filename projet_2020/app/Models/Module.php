<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faqs::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    protected $fillable = [
        'titre',
        'description',
        'ordre',
        'url_video',
        'cours_id'
    ];
}
