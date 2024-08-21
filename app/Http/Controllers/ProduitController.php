<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //crud produit

    public function addProduit(Request $request)
    {
        $produit = Produit::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'idCat' => $request->idCat,
        ]);
        return response()->json([
            'message' => 'Produit created successfully',
            'produit' => $produit
        ]);
    }

    public function getProduit()
    {
        $produit = Produit::all();
        return response()->json([
            'produit' => $produit
        ]);
    }

    public function updateProduit(Request $request, $id)
    {
        $produit = Produit::find($id);
        $produit->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'idCat' => $request->idCat,
        ]);
        return response()->json([
            'message' => 'Produit updated successfully',
            'produit' => $produit
        ]);
    }


    public function deleteProduit($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return response()->json([
            'message' => 'Produit deleted successfully',
        ]);
    }


   
    


}
