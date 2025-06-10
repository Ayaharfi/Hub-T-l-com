<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesprojet extends Model
{
   protected $table = 'mesprojets';
 protected $fillable = [
        'nom',
        'admin_nom',
        'type',
        'description',
        'progression',
];
    public function taches()
    {
        return $this->hasMany(Tache::class,'mesprojet_id');
    }
}
