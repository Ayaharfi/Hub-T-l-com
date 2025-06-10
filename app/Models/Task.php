<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title','description', 'status'];
 /**
     * Définir la relation avec le modèle Description.
     */
    public function descriptions()
    {
        return $this->hasMany(Description::class); // Une tâche peut avoir plusieurs descriptions
    }
    
}
