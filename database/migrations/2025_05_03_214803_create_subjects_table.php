<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // N'oubliez pas d'inclure cette ligne pour utiliser DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Création de la table subjects
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Colonne 'name', de type string, non null par défaut
            $table->timestamps();
        });

        // Insertion des sujets prédéfinis
        DB::table('subjects')->insert([
            ['name' => 'Dossier ingénierie'],
            ['name' => 'Dossier exploitation'],
            ['name' => 'Dossier présentation'],
            ['name' => 'Dossier technique'],
        ]);
    }
};
