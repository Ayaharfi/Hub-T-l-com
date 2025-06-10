<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Définir les champs que vous souhaitez rendre assignables en masse
    protected $fillable = ['name'];
}
