<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //crud categorie

    public function addCategorie(Request $request)
    {
        $categorie = Categorie::create([
            'NomCat' => $request->NomCat,
        ]);
        return response()->json([
            'message' => 'Categorie created successfully',
            'categorie' => $categorie
        ]);
    }

    public function getCategories()
    {
        $categories = Categorie::all();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function updateCategorie(Request $request, $id)
    {
        // verifier si l'id existe
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return response()->json([
                'message' => 'Categorie not found'
            ]);
        }else{
            $categorie->update([
                'NomCat' => $request->NomCat,
            ]);
            return response()->json([
                'message' => 'Categorie updated successfully',
                'categorie' => $categorie
            ]);
        }
    }

    // delete
    public function deleteCategorie($id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return response()->json([
                'message' => 'Categorie not found'
            ]);
        }
       
        $categorie->delete();
        return response()->json([
            'message' => 'Categorie deleted successfully',
        ]);
    }



}
