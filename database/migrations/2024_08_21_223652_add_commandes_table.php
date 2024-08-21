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
        //
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('idCommande');
            $table->date('DateCommande');
            $table->double('MontantCommande');
            $table->string('MethodePaiement');
            $table->date('DateLivraison');
            $table->string('Adresse');
            $table->string('Telephone');
            $table->boolean('isPaid');
            $table->string('deliverTo');
            $table->string('numCommande');
            $table->unsignedBigInteger('idClient');
            $table->foreign('idClient')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('command
        es
        ');

    }
};
