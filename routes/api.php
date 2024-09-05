<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function (){
    Route::get('user',[AuthController::class, 'user']);
    Route::post('logout',[AuthController::class, 'logout']);
    Route::post('loggedUserCommandes',[CommandeController::class, 'userCommandes']);
   

});

// route pour crud categorie
Route::post('addCategorie', [CategorieController::class, 'addCategorie']);
Route::get('getCategorie', [CategorieController::class, 'getCategorie']);
Route::put('updateCategorie/{id}', [CategorieController::class, 'updateCategorie']);
Route::delete('deleteCategorie/{id}', [CategorieController::class, 'deleteCategorie']);

// route pour commandes
Route::post('addCommande', [CommandeController::class, 'addCommande']);
Route::get('getCommandes', [CommandeController::class, 'getCommandes']);
Route::put('updateCommande/{id}', [CommandeController::class, 'updateCommande']);
Route::delete('deleteCommande/{id}', [CommandeController::class, 'deleteCommande']);
Route::put('annulerCommande/{id}', [CommandeController::class, 'annulerCommande']);
Route::put('validerCommande/{id}', [CommandeController::class, 'validerCommande']);










