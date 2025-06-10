<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SousDossier extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'dossier_id', 'nom_user', 'code_ip', 'notes'];

    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossier::class);
    }
}