<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable = [
        'cdf',
        'nom_agence',
        'type_agence',
        'lignes',
        'utilisateurs',
        'noms_utilisateurs',
        'role',
        'plan_de_num',
        'type',
        'groupe',
        'ville',
        'region',
        'code_verification'
    ];
  public function utilisateurs()
{
    return $this->hasMany(Utilisateur::class);
}
  
}
