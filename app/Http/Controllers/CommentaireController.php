<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    //crud 

    public function addCommentaire(Request $request)
    {
        // Valider la requête
        $request->validate([
            'idProduit' => 'required|integer|exists:produits,idProduit',
            'idUtilisateur' => 'required|integer|exists:utilisateurs,id',
            'Contenu' => 'required|string',
            // 'note' => 'nullable|integer|min=1|max=5',
        ]);

        // Créer le commentaire
        $commentaire = Commentaire::create([
                'idProduit' => $request->idProduit,
                'idUtilisateur' => $request->idUtilisateur,
                'Contenu' => $request->Contenu,
                'note' => $request->note,
            ]);

        return response()->json([
            'message' => 'Commentaire created successfully',
            'commentaire' => $commentaire
        ]);
    }

    public function getCommentaires()
    {
        $commentaire = Commentaire::all();
        return response()->json([
            'commentaire' => $commentaire
        ]);
    }

    public function updateCommentaire(Request $request, $id)
    {
        // Valider la requête
        $request->validate([
            'idProduit' => 'required|integer|exists:produits,idProduit',
            'idUtilisateur' => 'required|integer|exists:utilisateurs,id',
            'Contenu' => 'required|string',
            // 'note' => 'nullable|integer|min=1|max=5',
        ]);

        // Trouver le commentaire par son ID
        $commentaire = Commentaire::find($id);

        // Vérifier si le commentaire existe
        if (!$commentaire) {
            return response()->json([
                'message' => 'Commentaire not found'
            ], 404);
        }

        // Mettre à jour le commentaire
        $commentaire->update([
            'idProduit' => $request->idProduit,
            'idUtilisateur' => $request->idUtilisateur,
            'Contenu' => $request->Contenu,
            'note' => $request->note,
        ]);

        return response()->json([
            'message' => 'Commentaire updated successfully',
            'commentaire' => $commentaire
        ]);
    }

    public function deleteCommentaire($id)
    {
        $commentaire = Commentaire::find($id);
        if (!$commentaire) {
            return response()->json([
                'message' => 'Commentaire not found'
            ], 404);
        }
        
        $commentaire->delete();
        return response()->json([
            'message' => 'Commentaire deleted successfully',
        ]);
    }

    // les commentaires d'un produit
    public function getCommentaireByProduit($id)
    {
        $commentaires = Commentaire::where('idProduit', $id)->get();

        // Vérifiez si des commentaires existent pour le produit donné
        if ($commentaires->isEmpty()) {
            return response()->json([
                'message' => 'No comments found for this product'
            ], 404);
        }

        return response()->json([
            'commentaires' => $commentaires
        ]);
    }

    

    
}
