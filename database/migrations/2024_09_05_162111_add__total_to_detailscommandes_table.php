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
        Schema::table('detailscommandes', function (Blueprint $table) {
            //ajoute la colonne total
            $table->double('total');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detailscommandes', function (Blueprint $table) {
            //
            $table->dropColumn('total');
        
        
        });
    }
};
