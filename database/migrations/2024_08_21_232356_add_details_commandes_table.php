<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailsCommandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCommande');
            $table->foreign('idCommande')->references('idCommande')->on('commandes');
            $table->unsignedBigInteger('idProduit');
            $table->foreign('idProduit')->references('idProduit')->on('produits');
            $table->double('Prixunitaire');
            $table->integer('quantiteProduit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //inv
        Schema::dropIfExists('detailsCommandes');
    
    }
};
