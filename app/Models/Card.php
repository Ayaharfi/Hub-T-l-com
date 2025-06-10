<?php

namespace App\Http\Controllers;

use App\Models\Card; // Assurez-vous d'importer le modèle
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // Spécifie si tu as des colonnes non remplies automatiquement par Eloquent
    protected $fillable = ['name', 'description'];  // Adapté en fonction des colonnes de ta table
}

