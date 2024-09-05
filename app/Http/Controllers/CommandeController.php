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
            'montantCommande' => $request->montantCommande,
            'MethodePaiement' => $request->MethodePaiement,
            'DateLivraison' => $request->DateLivraison,
            'Adresse' => $request->Adresse,
            'Telephone' => $request->Telephone,
            'isPaid' => $request->isPaid,
            'deliverTo' => $request->deliverTo,
            // generer numCommande
            'numCommande' => 'CMD' . time(),    
            'etat' => 'en cours',
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

        if (!$commande) {
            return response()->json([
                'message' => 'Commande not found'
            ], 404);
        }

        $commande->update([
            'idClient' => $request->idClient,
            'dateCommande' => $request->dateCommande,
            'montantCommande' => $request->montantCommande,
            'MethodePaiement' => $request->MethodePaiement,
            'DateLivraison' => $request->DateLivraison,
            'Adresse' => $request->Adresse,
            'Telephone' => $request->Telephone,
            'isPaid' => $request->isPaid,
            'deliverTo' => $request->deliverTo,
            'etat' => $request->etat,
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

    // fonction qui change la valeur de l'attribut etat de commande en annule
    public function annulerCommande($id)
    {
        $commande = Commande::find($id);

        if (!$commande) {
            return response()->json([
                'message' => 'Commande not found'
            ], 404);
        }

        // mettre l'etat de commande en annule
        $commande->update([
            'etat' => 'annulee',
        ]);
        return response()->json([
            'message' => 'Commande annulee',
        ]);
    }

    // valider commande
    public function validerCommande($id)
    {
        $commande = Commande::find($id);

        if (!$commande) {
            return response()->json([
                'message' => 'Commande not found'
            ], 404);
        }

        // mettre l'etat de commande en annule
        $commande->update([
            'etat' => 'validee',
        ]);
        return response()->json([
            'message' => 'Commande validee',
        ]);
    }


    // les commandes d'un user
    public function userCommandes(Request $request)
    {
        $commandes = Commande::where('idClient', $request->user()->id)->get();
        return response()->json([
            'commandes' => $commandes
        ]);
    }




}
