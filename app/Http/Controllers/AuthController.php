<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Client;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;



class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        $user = Utilisateur::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'statut' => 'active',
        ]);

        if ($user) {

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ],  Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'User not created',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)
        ) {
            return response()->json(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24); // 1 day

        return response()->json(['message' => 'Login successful', 'token' => $token], Response::HTTP_OK)->withCookie($cookie);
    }



    // user
    public function user(Request $request)
    {     
        if ($request->user()) {
            return $request->user();
        } else {
            return response()->json(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        
        }
               
       
        
    }




    //logout

    public function Logout()
    {
        $cookie = Cookie::forget('jwt');
        if ($cookie) {
            return response()->json(['message' => 'logout successfull'], Response::HTTP_OK)->withCookie($cookie);
        } else {
            return response()->json(['message' => 'logout failed'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

}


