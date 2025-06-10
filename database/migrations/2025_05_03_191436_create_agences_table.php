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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('cdf')->unique();
            $table->string('nom_agence');
            $table->enum('type_agence', ['Cube', 'Gateway'])->nullable();
            $table->integer('lignes')->nullable();
            $table->integer('utilisateurs')->nullable();
            $table->text('noms_utilisateurs');
            $table->integer('role')->nullable();
            $table->string('plan_de_num')->nullable();
            $table->string('type');
            $table->string('groupe')->nullable();
            $table->string('ville')->nullable();
            $table->string('region')->nullable();
            $table->string('code_verification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agences');
    }
};
