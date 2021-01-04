<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function faqs()
    {
        return $this->hasMany(Faqs::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prenom',
        'pseudo',
        'admin',
        'email',
        //'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
