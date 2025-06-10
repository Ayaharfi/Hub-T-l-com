<?php
// app/Http/Controllers/ServerController.php
namespace App\Http\Controllers;

use App\Models\Server; // Assurez-vous que le modèle Server est correctement importé
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Affiche la liste des serveurs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Récupérer les serveurs liés à ce dossier (par exemple)
            $serveurs = Dossier::find($dossierId)->serveurs;
            return response()->json($serveurs);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Serveurs non trouvés'], 404);
        }

        // Retourner la vue avec la liste des serveurs
        return view('servers.index', compact('servers'));
    }
}
