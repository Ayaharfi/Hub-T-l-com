<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{use HasFactory;

    protected $fillable = [
        'mesprojet_id',
        'titre',
        'description',
        'statut',
        'date_limite',
        'responsable',
    ];

    /**
     * Récupère le projet associé à cette tâche
     */
    public function projet()
    {
        return $this->belongsTo(MesProjet::class, 'mesprojet_id');
    }
}
