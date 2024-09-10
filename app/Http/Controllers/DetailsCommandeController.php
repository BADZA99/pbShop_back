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
        if (!$detailsCommande) {
            return response()->json([
                'message' => 'DetailsCommande non trouvé'
            ]);
        }
       
        return response()->json([
            'detailsCommande' => $detailsCommande
        ]);
    }

    // add
    public function addDetailsCommande(Request $request)
    {
        $detailsCommande = DetailsCommande::create([
            'idCommande' => $request->idCommande,
            'idProduit' => $request->idProduit,
            'Prixunitaire' => $request->Prixunitaire,
            'quantiteProduit' => $request->quantiteProduit,
            'total' => $request->Prixunitaire * $request->quantiteProduit,
            

        ]);
        // response
        return response()->json([
            'message' => 'DetailsCommande créé avec succès',
            'detailsCommande' => $detailsCommande
        ]);
    }


    // delete
    public function deleteDetailsCommande($id)
    {

        $detailsCommande = DetailsCommande::find($id);
        // verification
        if (!$detailsCommande) {
            return response()->json([
                'message' => 'DetailsCommande non trouvé'
            ]);
        }
        
        $detailsCommande->delete();
        return response()->json([
            'message' => 'DetailsCommande supprimé avec succès'
        ]);
    }

    // details commande d'une commande par son id
    public function getDetailsCommandeByCommandeId($id)
    {
        $detailsCommande = DetailsCommande::where('idCommande', $id)->get();
        if (!$detailsCommande) {
            return response()->json([
                'message' => 'DetailsCommande non trouvé'
            ]);
        }
       
        
        return response()->json([
            'detailsCommande' => $detailsCommande
        ]);
    }



}
