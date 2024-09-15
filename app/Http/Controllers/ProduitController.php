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
            'LibelleProduit' => $request->LibelleProduit,
            // generer le  CodeProduit 
            'CodeProduit' => 'PROD' . rand(1000, 9999),
            'description' => $request->description,
            'prixVente' => $request->prixVente,
            'image' => $request->image,
            'Seuil' => $request->Seuil,
            'PrixAchat' => $request->PrixAchat,
            'Stock' => $request->Stock,
            'idCat' => $request->idCat,
        ]);

        return response()->json([
            'message' => 'Produit created successfully',
            'produit' => $produit
        ]);
    }

    public function getProduits()
    {
        $produit = Produit::all();
        return response()->json([
            'produits' => $produit
        ]);
    }

    public function updateProduit(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return response()->json([
                'message' => 'Produit not found'
            ], 404);
        }

        $produit->update([
            'LibelleProduit' => $request->LibelleProduit,
            // 'CodeProduit' => $request->CodeProduit,
            'description' => $request->description,
            'prixVente' => $request->prixVente,
            'image' => $request->image,
            'Seuil' => $request->Seuil,
            'PrixAchat' => $request->PrixAchat,
            'Stock' => $request->Stock,
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

        if (!$produit) {
            return response()->json([
                'message' => 'Produit not found'
            ], 404);
        }

        $produit->delete();

        return response()->json([
            'message' => 'Produit deleted successfully',
        ]);
    }

    // produit d'une categorie
    public function getProduitByCategorie($id)
    {
        $produits = Produit::where('idCat', $id)->get();

        // Vérifiez si des produits existent pour la catégorie donnée
        if ($produits->isEmpty()) {
            return response()->json([
                'message' => 'No products found for this category'
            ], 404);
        }

        return response()->json([
            'produits' => $produits
        ]);
    }

    // mis a jour  stock d'un produit
    public function updateStock(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return response()->json([
                'message' => 'Produit not found'
            ], 404);
        }

        $produit->update([
            'Stock' => $request->Stock,
        ]);

        return response()->json([
            'message' => 'Stock updated successfully',
            'produit' => $produit
        ]);
    }
}
