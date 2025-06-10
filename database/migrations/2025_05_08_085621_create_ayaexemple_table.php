<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ayaexemple', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nom de la tâche
            $table->enum('status', ['todo', 'doing', 'done'])->default('todo'); // Etat
            $table->text('description')->nullable(); // Description principale

            $table->json('checklist')->nullable(); // Checklist JSON
            $table->json('comments')->nullable();  // Commentaires JSON
            $table->json('members')->nullable();   // Membres JSON
            $table->json('attachments')->nullable(); // Pièces jointes JSON

            $table->date('due_date')->nullable();  // Date limite
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ayaexemple');
    }
};
