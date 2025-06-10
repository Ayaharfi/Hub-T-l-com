<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Import manquant
use Illuminate\Database\Eloquent\Model;

class AdminCode extends Model
{
    use HasFactory;

    protected $fillable = ['code']; // vous pouvez ajouter d'autres colonnes si besoin
}
