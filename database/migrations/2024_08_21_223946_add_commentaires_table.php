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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id('idCom');
            $table->integer('note');
            $table->text('Contenu');
            $table->unsignedBigInteger('idProduit');
            $table->foreign('idProduit')->references('idProduit')->on('produits');
            $table->unsignedBigInteger('idUtilisateur');
            $table->foreign('idUtilisateur')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
