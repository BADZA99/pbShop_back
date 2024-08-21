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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('idProduit');
            $table->string('LibelleProduit');
            $table->string('CodeProduit');
            $table->text('description');
            $table->double('prixVente');
            $table->string('image')->nullable();
            $table->double('Seuil');
            $table->double('Stock');
            $table->double('PrixAchat');
            $table->unsignedBigInteger('idCat');
            $table->foreign('idCat')->references('idCat')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('produits
        ');
    
    
    }
};
