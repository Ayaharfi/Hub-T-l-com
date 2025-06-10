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
        Schema::create('card_tasks', function (Blueprint $table) {
            $table->id();  // La clé primaire de la carte de tâche
            $table->unsignedBigInteger('card_id');  // La clé étrangère vers la table 'cards'
            $table->text('content');  // Contenu de la carte de tâche
            $table->timestamps();  // Timestamp de la carte de tâche
    
            // Définir la clé étrangère pour la relation
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_tasks');
    }
};
