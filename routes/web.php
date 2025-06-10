<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\CardTaskController;
use App\Http\Controllers\CoffreDesAccesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\mesProjetController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\SousDossierController;
use App\Http\Controllers\TacheController;
use Illuminate\Http\Request;


Route::get('/sous-dossier/{id}', [SousDossierController::class, 'show']);


Route::get('/', [DossierController::class, 'index'])->name('dossiers.index');

Route::resource('dossiers', DossierController::class);

Route::resource('dossiers', DossierController::class);

Route::get('dossiers/{dossier}/sous-dossiers/create', [SousDossierController::class, 'create'])->name('sous_dossiers.create');
Route::post('dossiers/{dossier}/sous-dossiers', [SousDossierController::class, 'store'])->name('sous_dossiers.store');
Route::get('dossiers/{dossier}/sous-dossiers/{sousDossier}/edit', [SousDossierController::class, 'edit'])->name('sous_dossiers.edit');
Route::put('dossiers/{dossier}/sous-dossiers/{sousDossier}', [SousDossierController::class, 'update'])->name('sous_dossiers.update');
Route::delete('dossiers/{dossier}/sous-dossiers/{sousDossier}', [SousDossierController::class, 'destroy'])->name('sous_dossiers.destroy');
Route::post('/dossiers', [DossierController::class, 'store']);
Route::put('/dossiers/{id}', [DossierController::class, 'update']);

Route::post('/sous-dossiers', [SousDossierController::class, 'store']);
Route::put('/sous-dossiers/{id}', [SousDossierController::class, 'update']);
Route::post('/verifier-code', [SousDossierController::class, 'verifierCode']);





Route::get('/coffre-des-acces', [CoffreDesAccesController::class, 'index'])->name('coffre-des-acces.index');
Route::get('/get-serveurs/{dossierId}', [CoffreDesAccesController::class, 'getServeurs']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
Route::get('/profile', function () {
    return view('profile'); // Crée la vue resources/views/profile.blade.php
})->name('profile')->middleware('auth');

// Dans web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Autres routes admin...
});


Route::get('/salles/parCategorie/{categorie}', function($categorie) {
    return \App\Models\Salle::where('category', $categorie)->get();
})->name('salles.parCategorie');


Route::get('/verifier-admin', function (Illuminate\Http\Request $request) {
    $code = $request->get('code');
    $user = \App\Models\User::where('admin_code', $code)->where('is_admin', true)->first();

    return response()->json(['valid' => !!$user]);
});

Route::get('/aya', [DashboardController::class, 'index'])->name('aya.index');

Route::get('/projets/{id}', [DashboardController::class, 'showProjet'])->name('projets.show');

Route::post('/document', [DashboardController::class, 'storeDocument'])->name('document.store');

Route::post('/notes', [DashboardController::class, 'storeNote'])->name('notes.store');
Route::patch('/notes/{note}', [DashboardController::class, 'updateNote'])->name('notes.update');
Route::delete('/notes/{note}', [DashboardController::class, 'destroyNote'])->name('notes.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Projets normaux (pour retourner)
Route::get('/projets/ajax', [ProjetController::class, 'indexAjax']);

// Projets quotidiens
Route::get('/projets/quotidienne', [ProjetController::class, 'ProjetsQuotidiens'])->name('projets.quotidienne');




Route::get('/', function () {
    return redirect()->route('projets.index');
});

// Routes pour les projets
Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
Route::get('/projets/create', [ProjetController::class, 'create'])->name('projets.create');
Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
Route::get('/projets/{id}', [ProjetController::class, 'show'])->name('projets.details');

// Routes pour les tâches
Route::get('/taches/create', [TacheController::class, 'create'])->name('taches.create');
Route::post('/taches/store', [TacheController::class, 'store'])->name('taches.store');
Route::get('/taches', [TacheController::class, 'index'])->name('projets.index');
// Route pour afficher la liste des tâches
Route::get('/taches', [TacheController::class, 'liste'])->name('taches.liste');
Route::get('/taches/{tache}/edit', [TacheController::class, 'edit'])->name('taches.edit');
Route::delete('/taches/{tache}', [TacheController::class, 'destroy'])->name('taches.destroy');
Route::post('/taches/{id}/verifier-code', [TacheController::class, 'verifierCodeModal'])->name('taches.verifierCodeModal');
Route::put('taches/{id}/update', [TacheController::class, 'update'])->name('taches.update');
















// Pour enregistrer (updateOrCreate)
Route::post('/description/save', [DescriptionController::class, 'save'])->name('description.save');

// Pour toutes les autres actions REST
Route::resource('descriptions', DescriptionController::class);


// Routes pour Commentaire
Route::resource('comments', CommentController::class)->except(['create', 'edit']);

// Routes pour Checklist
Route::resource('checklist-items', ChecklistItemController::class)->except(['create', 'edit']);

// Routes pour CardTasks
Route::resource('cardTasks', CardTaskController::class)->except(['create', 'edit']);

// Si tu veux aussi afficher la liste des cartes de tâches depuis la route /cards
Route::get('/cards', [CardTaskController::class, 'index'])->name('cards.index');

Route::get('/tasks/{taskId}/descriptions', [DescriptionController::class, 'index']); // Récupérer les descriptions d'une tâche
Route::post('/tasks/{taskId}/descriptions', [DescriptionController::class, 'store']); // Ajouter une description à une tâche


// Pages Auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Routes Agences (CRUD complet)
// Tu peux ajouter ->middleware('auth') si tu veux sécuriser
Route::get('/agences', [AgenceController::class, 'index'])->name('agences.index');
Route::post('/agences', [AgenceController::class, 'store'])->name('agences.store');
Route::get('/agences/{id}/edit', [AgenceController::class, 'edit'])->name('agences.edit');
Route::patch('/agences/{id}', [App\Http\Controllers\AgenceController::class, 'update'])->name('agences.update');
Route::delete('/agences/{id}', [AgenceController::class, 'destroy'])->name('agences.destroy');
Route::get('/agence/{cdf}', [AgenceController::class, 'show'])->name('agence.index');
Route::get('/agences/{id}', [AgenceController::class, 'show'])->name('agences.show');
Route::post('/agences/verify-code/{id}', function(Request $request, $id){
    $agence = \App\Models\Agence::findOrFail($id);

    if ($request->code_verification === $agence->code_verification) {
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
});
// Route pour vérifier le code
Route::post('/agences/{agence}/verifyCode', [AgenceController::class, 'verifyCode'])
    ->name('agences.verifyCode');

// Route pour récupérer les données d'une agence
Route::get('/agences/{agence}/getData', [AgenceController::class, 'getData'])
    ->name('agences.getData');
Route::get('/agences/{id}', function($id){
    $agence = \App\Models\Agence::findOrFail($id);
    return response()->json($agence);
});
Route::get('/agences/{id}/utilisateurs', [AgenceController::class, 'getUtilisateurs']);


Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{id}/view', [DocumentController::class, 'view'])->name('documents.view');
Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
Route::get('/salles/{category?}', [SalleController::class, 'index'])->name('salles.index');
// Route pour stocker une nouvelle salle
Route::post('/salles/store', [SalleController::class, 'store'])->name('salles.store');
Route::delete('/salles/{id}', [SalleController::class, 'destroy'])->name('salles.destroy');
Route::post('/salles/{id}/verify-code', [SalleController::class, 'verifyCode']);
Route::get('/salles/{id}/edit', [SalleController::class, 'edit'])->name('salles.edit');
Route::put('/salles/{id}', [SalleController::class, 'update'])->name('salles.update');
Route::get('/eurafric', function () {
    return view('eurafric');
})->name('eurafric');
Route::post('/documents/import', [DocumentController::class, 'import'])->name('documents.import');










Route::get('/projets', [mesProjetController::class, 'index'])->name('projets.index');
Route::post('/projets', [mesProjetController::class, 'store'])->name('projets.store');

// Route Ajax pour cocher/décocher une tâche
Route::post('/taches/{tache}/update', [mesProjetController::class, 'updateTache'])->name('taches.update');
// Route pour afficher le formulaire (qui envoie $membres)
Route::get('/projets/create', [mesProjetController::class, 'create'])->name('projets.create');
