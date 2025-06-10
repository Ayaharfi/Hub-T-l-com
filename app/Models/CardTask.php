<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardTask extends Model
{
    // Les champs modifiables de ce modèle
    protected $fillable = ['card_id', 'content'];

    // Définir la relation inverse : une tâche de carte appartient à une carte
    public function card()
    {
        return $this->belongsTo(Card::class);  // Il est important que 'card_id' soit présent dans 'card_tasks'
    }

    // Relation entre une carte de tâche et les descriptions
    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    // Relation entre une carte de tâche et les éléments de la checklist
    public function checklistItems()
    {
        return $this->hasMany(ChecklistItem::class);
    }

    // Relation entre une carte de tâche et les commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
