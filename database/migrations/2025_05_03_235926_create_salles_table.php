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
    Schema::create('salles', function (Blueprint $table) {
        $table->id();
        $table->string('nom_salle');
        $table->integer('verification_code')->nullable();
        $table->string('ip');
        $table->string('codec');
        $table->string('location');
        $table->string('category');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salles');
        $table->dropColumn('verification_code');
    }
};
