<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sous_dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('dossier_id');
            $table->string('nom_user');
            $table->string('code_ip');
            $table->text('notes')->nullable();
            $table->string('verification_code')->nullable();
            $table->timestamps();
            
            $table->foreign('dossier_id')->references('id')->on('dossiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_dossiers');
    }
};