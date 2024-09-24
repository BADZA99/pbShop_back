<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
     // protected $table = 'produits';
    protected $primaryKey = 'idProduit';
    // fillable
    protected $fillable = [
        'LibelleProduit',
        'CodeProduit',
        'description',
        'prixVente',
        'image',
        'Seuil',
        'PrixAchat',
        'Stock',
        'idCat',
        'dateExp'
    ];
    // relation avec la table categories
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'idCat');
    }

    
}
