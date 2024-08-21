<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //lister et create 
    public function addCommande(Request $request)
    {
        $commande = Commande::create([
            'idClient' => $request->idClient,
            'dateCommande' => $request->dateCommande,
            'etat' => $request->etat,
            'total' => $request->total,
        ]);
        return response()->json([
            'message' => 'Commande created successfully',
            'commande' => $commande
        ]);
    }

    public function getCommandes()
    {
        $commande = Commande::all();
        return response()->json([
            'commande' => $commande
        ]);
    }

    public function updateCommande(Request $request, $id)
    {
        $commande = Commande::find($id);
        $commande->update([
            'idClient' => $request->idClient,
            'dateCommande' => $request->dateCommande,
            'etat' => $request->etat,
            'total' => $request->total,
        ]);
        return response()->json([
            'message' => 'Commande updated successfully',
            'commande' => $commande
        ]);
    }

    

    // delete
    public function deleteCommande($id)
    {
        $commande = Commande::find($id);
        $commande->delete();
        return response()->json([
            'message' => 'Commande deleted successfully',
        ]);
    }

}
