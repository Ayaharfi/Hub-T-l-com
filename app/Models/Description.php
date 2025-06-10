<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = ['description','content','task_id']; // Mass assignment

    /**
     * Définir la relation avec le modèle Task.
     */
    public function task()
    {
        return $this->belongsTo(Task::class); // Chaque description appartient à une tâche
    }
}
