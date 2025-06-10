<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    // Spécifier les champs qui peuvent être remplis en masse
    protected $fillable = ['titre', 'description', 'projet_id'];

    /**
     * Relation inverse entre une carte et son projet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id'); // La clé étrangère est 'projet_id'
    }
}
