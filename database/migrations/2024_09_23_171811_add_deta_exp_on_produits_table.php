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
        //ajoute de la colonne dateExp apres la colonne prixVente
        Schema::table('produits', function (Blueprint $table) {
            $table->date('dateExp')->nullable()->after('prixVente');
        });
    
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //inverse
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn('dateExp');
        });
    
   
    }
};
