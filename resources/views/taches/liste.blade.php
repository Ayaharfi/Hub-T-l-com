<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les tâches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
:root {
    /* Couleurs principales Eurafric */
    --primary-color: #1e3a8a; /* Bleu professionnel Eurafric */
    --primary-dark: #1e40af;
    --primary-light: #3b82f6;
    --accent-color: #f59e0b; /* Orange/doré pour les accents */
    --accent-light: #fbbf24;
    
    /* Couleurs de fond et surfaces */
    --bg-primary: #f8fafc;
    --bg-secondary: #ffffff;
    --bg-accent: #f1f5f9;
    --bg-card: #ffffff;
    
    /* Couleurs du texte */
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --text-muted: #94a3b8;
    --text-white: #ffffff;
    
    /* Couleurs d'état */
    --success-color: #10b981;
    --warning-color: #f59e0b;
    --danger-color: #ef4444;
    
    /* Bordures et ombres */
    --border-color: #e2e8f0;
    --border-light: #f1f5f9;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    
    /* Rayons de bordure */
    --radius-sm: 0.375rem;
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;
    
    /* Transitions */
    --transition-fast: 0.15s ease-in-out;
    --transition-base: 0.2s ease-in-out;
    --transition-slow: 0.3s ease-in-out;
}

/* Reset et base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
}

/* Sidebar modernisée */
.sidebar {
    width: 280px;
    background: var(--bg-secondary);
    backdrop-filter: blur(10px);
    border-right: 1px solid var(--border-color);
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform var(--transition-base);
    box-shadow: var(--shadow-lg);
    z-index: 100;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
}

.sidebar.closed {
    transform: translateX(-100%);
    left: 0;
}

/* Brand section avec style Hub Télécom */
.sidebar-brand {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid var(--border-light);
    text-align: center;
}

.sidebar-brand h2 {
    font-size: 1.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0.75rem 0;
    letter-spacing: -0.025em;
}

.brand-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 2px solid #3d5a80;
        }

        .brand-icon:hover {
            transform: scale(1.05);
        }

        .brand-icon i {
            font-size: 2rem;
            color: var(--text-white);
        }


/* Menu de navigation */
.sidebar-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    margin-bottom: 0.5rem;
}

.sidebar-menu a {
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    border-radius: var(--radius-lg);
    transition: all var(--transition-base);
    position: relative;
    overflow: hidden;
}

.sidebar-menu a::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    transition: width var(--transition-base);
    z-index: -1;
}

.sidebar-menu a:hover::before,
.sidebar-menu .active a::before {
    width: 100%;
}

.sidebar-menu a i {
    margin-right: 0.875rem;
    font-size: 1.125rem;
    min-width: 24px;
    color: var(--primary-color);
    transition: all var(--transition-base);
}

.sidebar-menu a:hover,
.sidebar-menu .active a {
    color: var(--text-white);
    transform: translateX(8px);
    box-shadow: var(--shadow-md);
}

.sidebar-menu a:hover i,
.sidebar-menu .active a i {
    color: var(--text-white);
    transform: scale(1.1);
}

/* Footer de la sidebar */
.sidebar-footer {
    margin-top: auto;
    margin-bottom: 1rem;
}

.footer-button {
    background: linear-gradient(135deg, var(--danger-color), #c53030);
    color: var(--text-white);
    border: none;
    padding: 0.75rem 1rem;
    cursor: pointer;
    border-radius: var(--radius-lg);
    font-size: 0.9rem;
    font-weight: 500;
    width: 100%;
    transition: all var(--transition-base);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-sm);
}

.footer-button i {
    margin-right: 0.5rem;
    font-size: 1rem;
}

.footer-button:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}
/* Contenu principal */
.container {
    margin-left: 280px;
    padding: 2rem;
    min-height: 100vh;
}

.text-success {
    color: var(--success-color) !important;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.text-center {
    text-align: center;
}

.text-muted {
    color: var(--text-muted);
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

.mb-4 {
    margin-bottom: 2rem;
}

/* Bouton retour */
.btn-secondary {
    background-color: var(--text-secondary);
    border-color: var(--text-secondary);
    color: var(--text-white);
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-md);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: var(--transition-base);
    box-shadow: var(--shadow-sm);
}

.btn-secondary:hover {
    background-color: var(--text-primary);
    border-color: var(--text-primary);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.btn-secondary i {
    margin-right: 0.5rem;
}

/* Grille des cartes */
.content-wrapper {
    max-width: 1400px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    justify-content: center;
}

.col-md-6.col-lg-4 {
    flex: 0 0 auto;
    width: 100%;
    max-width: 350px;
}

/* Cartes des tâches */
.card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: var(--transition-base);
    height: fit-content;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.card-body {
    padding: 1.5rem;
}

.card-title {
    color: var(--primary-color);
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.card-text {
    color: var(--text-secondary);
    margin-bottom: 1rem;
    line-height: 1.6;
}

.card-body p {
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
}

.card-body p strong {
    color: var(--text-primary);
    font-weight: 600;
}

/* Boutons */
.btn {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border-radius: var(--radius-md);
    border: 1px solid;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
    transition: var(--transition-base);
    cursor: pointer;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
}

.btn i {
    margin-right: 0.375rem;
    font-size: 0.875rem;
}

.btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
    background-color: transparent;
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: var(--text-white);
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

.btn-danger {
    background-color: var(--danger-color);
    border-color: var(--danger-color);
    color: var(--text-white);
}

.btn-danger:hover {
    background-color: #dc2626;
    border-color: #dc2626;
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: var(--text-white);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
}

.btn-success {
    background-color: var(--success-color);
    border-color: var(--success-color);
    color: var(--text-white);
}

.btn-success:hover {
    background-color: #059669;
    border-color: #059669;
}

/* Modals */
.modal-content {
    border: none;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
}

.modal-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: var(--text-white);
    border-bottom: none;
    padding: 1.5rem;
    border-radius: var(--radius-xl) var(--radius-xl) 0 0;
}

.modal-title {
    font-weight: 600;
    font-size: 1.25rem;
}

.btn-close {
    filter: invert(1);
    opacity: 0.8;
}

.btn-close:hover {
    opacity: 1;
}

.modal-body {
    padding: 1.5rem;
    background-color: var(--bg-secondary);
}

.modal-footer {
    background-color: var(--bg-accent);
    border-top: 1px solid var(--border-light);
    padding: 1rem 1.5rem;
    border-radius: 0 0 var(--radius-xl) var(--radius-xl);
}

/* Formulaires */
.form-control {
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    padding: 0.75rem;
    font-size: 0.9rem;
    transition: var(--transition-base);
    background-color: var(--bg-secondary);
    color: var(--text-primary);
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
    outline: none;
}

label {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    display: block;
}

.mb-3 {
    margin-bottom: 1rem;
}

/* Statuts des tâches */
.card-body p:has(strong:contains('Statut')) {
    display: inline-flex;
    align-items: center;
    background-color: var(--bg-accent);
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 500;
}

/* Animation d'entrée pour les cartes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card {
    animation: fadeInUp 0.5s ease-out;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        transition: transform var(--transition-base);
    }
    
    .container {
        margin-left: 0;
        padding: 1rem;
    }
    
    .col-md-6.col-lg-4 {
        max-width: 100%;
    }
    
    .mb-4[style*="margin-left"] {
        margin-left: 0 !important;
        text-align: center;
    }
}
/* Scrollbar personnalisée */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--bg-accent);
    border-radius: var(--radius-lg);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: var(--radius-lg);
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
}
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                 <img src="{{ asset('logo.png') }}" alt="Logo" height="50">
            </div>
            <h2>Hub Télécom</h2>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li><br><br>
                <li class="nav-item">
                    <a href="{{ route('documents.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Documentation</span>
                    </a>
                </li><br><br>
                <li class="nav-item">
                    <a href="{{ route('salles.index') }}">
                        <i class="fas fa-video"></i>
                        <span>Parc Visio</span>
                    </a>
                </li><br><br>
                <li class="nav-item active">
                    <a href="{{ route('agences.index') }}">
                        <i class="fas fa-building"></i>
                        <span>BOA Agences</span>
                    </a>
                </li><br><br>
                <li class="nav-item">
                    <a href="{{ route('dossiers.index') }}">
                        <i class="fas fa-key"></i>
                        <span>Coffre Des Accès</span>
                    </a>
                </li><br><br>
                <li class="nav-item">
                    <a href="{{ route('projets.index') }}">
                        <i class="fas fa-tasks"></i>
                        <span>Notes Et Tâches</span>
                    </a>
                </li><br><br>
            </ul>
        </div>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="footer-button">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </div>
    </div>
    <div class="container py-5">
        <h2 class="text-success text-center mb-4">
            <i class="fas fa-tasks"></i> Gérer les tâches
        </h2>

        <p class="text-center text-muted">Liste des tâches créées par projet</p>
        <!-- Bouton "Retour" -->
        <div class="mb-4" style="margin-left: 1000px;">
    <a href="{{ route('projets.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

        <div class="content-wrapper">
        <div class="row justify-content-center">
            @foreach ($taches as $tache)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card p-3mx-auto" style="max-width: 350px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tache->titre }}</h5>
                            <p class="card-text">{{ $tache->description ?? 'Aucune description' }}</p>
                            <p><strong>Statut :</strong> {{ ucfirst($tache->statut) }}</p>

                            @if($tache->date_limite)
                                <p><strong>Date limite :</strong> {{ $tache->date_limite }}</p>
                            @endif
                            @if($tache->mesprojet_id)
                                <p><strong>ID du projet :</strong> {{ $tache->mesprojet_id  }}</p>
                            @endif
                            @if($tache->responsable)
                                <p><strong>Responsable :</strong> {{ $tache->responsable }}</p>
                            @endif

                            <!-- Bouton qui ouvre le modal de vérification -->
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerifierAdmin{{ $tache->id }}">
                                <i class="fas fa-edit"></i> Modifier
                            </button>

                            <!-- Modal de vérification admin -->
                            <div class="modal " id="modalVerifierAdmin{{ $tache->id }}" tabindex="-1"data-bs-backdrop="false" data-bs-keyboard="true"
     aria-labelledby="verificationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('taches.verifierCodeModal', $tache->id) }}" id="verifierCodeForm{{ $tache->id }}" data-tache-id="{{ $tache->id }}">

                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Vérification du code administrateur</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Code administrateur</label>
                                                    <input type="password" name="id_admin" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal de modification (initialement caché) -->
                            <div class="modal fade" id="modalEditTache{{ $tache->id }}" tabindex="-1" aria-labelledby="edittacheModalLabel"data-bs-backdrop="false" aria-hidden="true">>
                                <div class="modal-dialog modal-lg">
                                    <form method="POST" action="{{ route('taches.update', $tache->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier la tâche</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Titre</label>
                                                    <input type="text" name="titre" class="form-control" value="{{ $tache->titre }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $tache->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Statut</label>
                                                    <select name="statut" class="form-control">
                                                        <option {{ $tache->statut == 'à faire' ? 'selected' : '' }}>à faire</option>
                                                        <option {{ $tache->statut == 'en cours' ? 'selected' : '' }}>en cours</option>
                                                        <option {{ $tache->statut == 'terminé' ? 'selected' : '' }}>terminé</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('taches.destroy', $tache->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette tâche ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
   document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form[id^="verifierCodeForm"]');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    id_admin: form.querySelector('input[name="id_admin"]').value,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Fermeture du modal de vérification
                    var modalVerifierAdmin = new bootstrap.Modal(document.getElementById('modalVerifierAdmin' + form.dataset.tacheId));
                    modalVerifierAdmin.hide();

                    // Ouvrir le modal de modification
                    var modalEditTache = new bootstrap.Modal(document.getElementById('modalEditTache' + form.dataset.tacheId));
                    modalEditTache.show();
                } else {
                    // Afficher un message d'erreur si le code est incorrect
                    alert(data.message || 'Le code administrateur est incorrect.');
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
});
    </script>
</body>
</html>