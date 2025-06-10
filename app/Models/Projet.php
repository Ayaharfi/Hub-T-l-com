<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type','description','admin_nom','code_admin',];
     /**
     * Récupère les tâches associées à ce projet
     */
    public function taches()
    {
        return $this->hasMany(Tache::class,'mesprojet_id');
    }
}