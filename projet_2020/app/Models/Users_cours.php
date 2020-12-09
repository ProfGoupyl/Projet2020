<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_at',
        'end_at',
        'user_id',
        'cours_id'
    ];
}
