<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailsCommande;
use Illuminate\Http\Request;

class DetailsCommandeController extends Controller
{
    //LISTER ET DETAILS COMMANDE D1 UTILISATEUR
    public function getDetailsCommande()
    {
        $detailsCommande = DetailsCommande::all();
        return response()->json([
            'detailsCommande' => $detailsCommande
        ]);
    }

    public function getDetailsCommandeById($id)
    {
        $detailsCommande = DetailsCommande::find($id);
        return response()->json([
            'detailsCommande' => $detailsCommande
        ]);
    }

}
