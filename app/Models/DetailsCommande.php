<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsCommande extends Model
{
    use HasFactory;
    protected $table = 'detailscommandes';
    

    protected $fillable = [
        'id',
        'idCommande', 'idProduit', 'Prixunitaire', 'quantiteProduit', 'total'];

}
