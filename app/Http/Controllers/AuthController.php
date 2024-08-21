<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Client;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;



class AuthController extends Controller
{
    //register
    public function Register(Request $request)
    {


          $user=Utilisateur::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
                'statut' => 'active',
          ]);
        


        return response()->json([
            'message' => 'User created successfully',
            // 'user' => $user
         

        ],  Response::HTTP_CREATED);
    }




}
