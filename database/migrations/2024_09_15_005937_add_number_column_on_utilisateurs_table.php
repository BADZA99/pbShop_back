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
        //ajoute la colonne numero apres email
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->string('telephone')->after('email');
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //inverse
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn('telephone');
        });
    
    }
};
