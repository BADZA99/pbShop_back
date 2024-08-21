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
        $commentaire = Commentaire::create([
            'idProduit' => $request->idProduit,
            'idUtilisateur' => $request->idUtilisateur,
            'contenu' => $request->contenu,
        ]);
        return response()->json([
            'message' => 'Commentaire created successfully',
            'commentaire' => $commentaire
        ]);
    }

    public function getCommentaire()
    {
        $commentaire = Commentaire::all();
        return response()->json([
            'commentaire' => $commentaire
        ]);
    }

    public function updateCommentaire(Request $request, $id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->update([
            'idProduit' => $request->idProduit,
            'idUtilisateur' => $request->idUtilisateur,
            'contenu' => $request->contenu,
        ]);
        return response()->json([
            'message' => 'Commentaire updated successfully',
            'commentaire' => $commentaire
        ]);
    }

    public function deleteCommentaire($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return response()->json([
            'message' => 'Commentaire deleted successfully',
        ]);
    }
    

    
}
