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
        Schema::table('Parcours', function (Blueprint $table) {
            $table->string('contract')->nullable();
            $table->string('grad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Parcours', function (Blueprint $table) {
            $table->dropColumn('contract');
            $table->dropColumn('grad');
        });
    }
};
