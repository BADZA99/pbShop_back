<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $table = 'utilisateurs'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'email',
        'password',
        'type',
        'statut',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
 

    
// constructeur utilisateur
    public function __construct($nom, $email, $password)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->statut = 'active';
    }


  
    // public function commandes()
    // {
    //     return $this->hasMany(Commande::class, 'id_utilisateur');
    // }

    // public function commentaires()
    // {
    //     return $this->hasMany(Commentaire::class, 'id_utilisateur');
    // }
}
