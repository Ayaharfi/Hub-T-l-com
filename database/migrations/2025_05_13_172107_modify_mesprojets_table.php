<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class ModifyMesprojetsTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mesprojets', function (Blueprint $table) {
            // Donne une valeur par défaut à `admin_nom`
            $table->string('admin_nom')->default('Non spécifié')->change();
            $table->string('type')->default('Non spécifié')->change();
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mesprojets', function (Blueprint $table) {
            // Annule la modification et supprime la valeur par défaut
            $table->string('admin_nom')->default(null)->change();
        });
    }
}
