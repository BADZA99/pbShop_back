<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // protected $table = 'commandes';


    protected $primaryKey = 'idCommande';

    protected $fillable = [
        'idCommande', 
        'dateCommande',
        'idClient',
        'montantCommande',
        'MethodePaiement',
        'DateLivraison',
        'Adresse',
        'Telephone',
        'isPaid',
        'deliverTo',
        'numCommande', 
        'etat'
    ];

}
