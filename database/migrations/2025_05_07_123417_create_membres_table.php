<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();  // Ajoute une clé primaire auto-incrémentée
            $table->string('nom');  // Exemple de champ : nom
            $table->string('email')->unique();  // Exemple de champ : email
            $table->timestamps();  // Ajoute les colonnes created_at et updated_at
        });
    }

    /**
     * Annuler la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
