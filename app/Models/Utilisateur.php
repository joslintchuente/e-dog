<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'mot_de_passe',
        'ville'
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'utilisateur';
}
