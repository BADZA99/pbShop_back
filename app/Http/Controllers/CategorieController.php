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

    public function getCategorie()
    {
        $categorie = Categorie::all();
        return response()->json([
            'categorie' => $categorie
        ]);
    }

    public function updateCategorie(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        $categorie->update([
            'NomCat' => $request->NomCat,
        ]);
        return response()->json([
            'message' => 'Categorie updated successfully',
            'categorie' => $categorie
        ]);
    }

    // delete
    public function deleteCategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return response()->json([
            'message' => 'Categorie deleted successfully',
        ]);
    }



}
