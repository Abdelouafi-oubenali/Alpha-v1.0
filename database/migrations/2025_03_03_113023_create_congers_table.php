<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('type_conge', ['conge_paye', 'rtt', 'sans_solde', 'maladie', 'maternite', 'autre']);
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */


    public function down(): void
    {
        Schema::dropIfExists('congers');
    }
};
