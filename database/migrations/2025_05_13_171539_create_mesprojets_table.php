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
        Schema::create('mesprojets', function (Blueprint $table) {
            $table->id(); // Crée la colonne `id` (BIGINT UNSIGNED AUTO_INCREMENT)
            $table->string('nom'); // Crée la colonne `nom` de type VARCHAR(255)
            $table->string('admin_nom'); // Crée la colonne `admin_nom` de type VARCHAR(255)
            $table->string('type'); // Crée la colonne `type` de type VARCHAR(255)
            $table->text('description')->nullable(); // Crée la colonne `description` de type TEXT (nullable)
            $table->integer('progression')->default(0); // Crée la colonne `progression` avec une valeur par défaut de 0
            $table->timestamps(); // Crée les colonnes `created_at` et `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesprojets');
    }
};
