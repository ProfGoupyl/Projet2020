<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'debut du cours',
        'fin du cours'
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }


}
