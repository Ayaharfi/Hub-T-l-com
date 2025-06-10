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
   Schema::create('descriptions', function (Blueprint $table) {
            $table->id(); // ID unique
            $table->text('description'); // Description de la tâche
            $table->foreignId('task_id') // Colonne pour la clé étrangère vers tasks
                ->constrained('tasks') // Contrainte de clé étrangère sur la table 'tasks'
                ->onDelete('cascade'); // Supprimer les descriptions lorsque la tâche associée est supprimée
            $table->timestamps(); // Champs created_at et updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptions');
    }
};
