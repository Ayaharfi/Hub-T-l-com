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
    Schema::create('cartes', function (Blueprint $table) {
        $table->id(); // Identifiant unique pour chaque carte
        $table->foreignId('projet_id')->constrained('projets'); // Lien avec la table projets
        $table->string('titre'); // Titre de la carte
        $table->text('description')->nullable(); // Description de la carte
        $table->timestamps(); // Pour gérer les dates de création et de mise à jour
    });
}

public function down()
{
    Schema::dropIfExists('cartes');
}
};
