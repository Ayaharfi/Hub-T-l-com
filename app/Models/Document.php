<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Document extends Model
{
    use HasFactory;

    // Définir les champs que vous souhaitez rendre assignables en masse
    protected $fillable = [
        'name',
        'subject',
        'folder',
        'path',
        'file_path',
        'mime_type',
    ];

    // Activer les timestamps pour les champs `created_at` et `updated_at`
    public $timestamps = true;
     public function getFileSizeAttribute()
    {
        try {
            // Si le chemin du fichier est défini
            if ($this->file_path) {
                $path = 'documents/' . $this->file_path;
                
                // Vérifier si le fichier existe dans le stockage
                if (Storage::exists($path)) {
                    return Storage::size($path);
                }
                
                // Essayer avec le chemin complet
                if (file_exists(storage_path('app/' . $path))) {
                    return filesize(storage_path('app/' . $path));
                }
                
                // Essayer avec un chemin public
                $publicPath = public_path($this->file_path);
                if (file_exists($publicPath)) {
                    return filesize($publicPath);
                }
            }
            
            // Si on arrive ici, on n'a pas pu déterminer la taille
            Log::warning("Unable to retrieve file_size for file at location: {$this->file_path}");
            return 0;
        } catch (\Exception $e) {
            Log::error("Error retrieving file_size for {$this->file_path}: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Accesseur pour obtenir l'URL du fichier
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        try {
            if ($this->file_path) {
                return Storage::url('documents/' . $this->file_path);
            }
            return '#';
        } catch (\Exception $e) {
            Log::error("Error retrieving file URL: " . $e->getMessage());
            return '#';
        }
    }
}
