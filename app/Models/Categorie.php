<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories'; 

 
    protected $primaryKey = 'idCat';
    use HasFactory;
    // fillable
    protected $fillable = ['NomCat'];
}
