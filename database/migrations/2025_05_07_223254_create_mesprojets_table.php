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
        Schema::create('mesprojet', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('admin_nom')->after('nom');
            $table->enum('type', ['normal', 'quotidienne'])->after('admin_nom');
            $table->text('description')->nullable();
            $table->integer('progression')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesprojet');
    }
};
