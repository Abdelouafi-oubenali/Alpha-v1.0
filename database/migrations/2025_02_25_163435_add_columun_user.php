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
        Schema::table('users', function (Blueprint $table) {
            $table->text('photo_profil')->nullable();  
            $table->string('téléphone')->nullable();   
            $table->unsignedBigInteger('entreprise_id'); 
            $table->string('type_contrat')->nullable();   
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo_profil');
            $table->dropColumn('téléphone');
            $table->dropColumn('entreprise_id');
            $table->dropColumn('type_contrat');
            $table->dropForeign(['entreprise_id']);
        });
    }
};
