<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    // fillable
    protected $fillable = ['nom', 'prix', 'quantite', 'idCat'];
    // relation avec la table categories
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCat');
    }

    
}
