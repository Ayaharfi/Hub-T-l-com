<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des projets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta name="color-scheme" content="light">

        <style>
/* Variables CSS pour Hub Télécom */
:root {
    /* Couleurs principales Hub Télécom */
    --primary-color: #1e3a8a; /* Bleu principal */
    --primary-dark: #1e40af;
    --primary-light: #3b82f6;
    --accent-color: #38a169; /* Vert pour les accents */
    --accent-light: #48bb78;
    
    /* Couleurs de fond et surfaces */
    --bg-primary: #f7fafc;
    --bg-secondary: #ffffff;
    --bg-accent: #edf2f7;
    --bg-card: #ffffff;
    
    /* Couleurs du texte */
    --text-primary: #2d3748;
    --text-secondary: #4a5568;
    --text-muted: #3b82f6;
    --text-white: #ffffff;
    
    /* Couleurs d'état */
    --success-color: #38a169;
    --warning-color: #ed8936;
    --danger-color: #e53e3e;
    --info-color: #3182ce;
    
    /* Bordures et ombres */
    --border-color: #e2e8f0;
    --border-light: #f1f5f9;
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
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
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-accent) 100%);
    color: var(--text-primary);
    line-height: 1.6;
    min-height: 100vh;
    display: flex;
}

/* Contenu principal */
.main-content {
    margin-left: 285px; /* Retour à la valeur originale */
    flex: 1;
    padding: 1.5rem 2rem;
    transition: margin-left var(--transition-base);
}

/* Ajustement pour le contenu de la page */
body.bg-light {
    padding-left: 285px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    width: 100%;
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

/* Contenu de la page projets */
.container {
    max-width: calc(100vw - 290px);
    margin: 0;
    margin-left: 285px;
    padding: 1.5rem 2rem;
    width: auto;
}

/* En-tête de page */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-light);
}

.page-header h2 {
    color: var(--text-primary);
    font-size: 2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.page-header h2 i {
    color: var(--primary-color);
}

/* Boutons */
.btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all var(--transition-base);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    box-shadow: var(--shadow-sm);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--text-white);
}

.btn-success {
    background: linear-gradient(135deg, var(--success-color), var(--accent-light));
    color: var(--text-white);
}

.btn-info {
    background: linear-gradient(135deg, var(--info-color), #4299e1);
    color: var(--text-white);
}

.btn-secondary {
    background: var(--bg-accent);
    color: var(--text-secondary);
    border: 1px solid var(--border-color);
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

/* Cards */
.card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    margin-bottom: 1.5rem;
    margin-left: -200px;
}

.card-header {
    background: linear-gradient(135deg, var(--bg-accent), var(--border-light));
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border-color);
    font-weight: 600;
    color: var(--text-primary);
    font-size: 1.1rem;
    
}

.card-body {
    padding: 1.5rem;
}

/* Formulaires */
.form-label {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
    
}

.form-control,
.form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    transition: all var(--transition-base);
    background: var(--bg-secondary);
    color: var(--text-primary);
}

.form-control:focus,
.form-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(44, 82, 130, 0.1);
}

.form-control.is-invalid,
.form-select.is-invalid {
    border-color: var(--danger-color);
}

.invalid-feedback {
    color: var(--danger-color);
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Tableaux */
.table {
    width: 100%;
    border-collapse: collapse;
    background: var(--bg-card);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    margin-left: -150px;
    justify-content: center;
}

.table th,
.table td {
    padding: 1rem 1.5rem;
    text-align: left;
    border-bottom: 1px solid var(--border-light);
}

.table th {
    background: linear-gradient(135deg, var(--bg-accent), var(--border-light));
    font-weight: 600;
    color: var(--text-primary);
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.05em;
}

.table tbody tr {
    transition: background-color var(--transition-fast);
}

.table tbody tr:hover {
    background: var(--bg-accent);
}

/* Badges */
.badge {
    padding: 0.375rem 0.75rem;
    border-radius: var(--radius-md);
    color: var(--text-white);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.bg-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
}

.bg-success {
    background: linear-gradient(135deg, var(--success-color), var(--accent-light));
}

/* Alertes */
.alert {
    padding: 1rem 1.5rem;
    border-radius: var(--radius-lg);
    margin-bottom: 1.5rem;
    border: 1px solid transparent;
    font-weight: 500;
}

.alert-success {
    background: rgba(56, 161, 105, 0.1);
    border-color: var(--success-color);
    color: #22543d;
}

.alert-warning {
    background: rgba(237, 137, 54, 0.1);
    border-color: var(--warning-color);
    color: #744210;
}

/* Modals */
.modal-content {
    border: none;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    overflow: hidden;
    
}

.modal-header {
    background: linear-gradient(135deg, var(--bg-accent), var(--border-light));
    border-bottom: 1px solid var(--border-color);
    padding: 1.5rem;
}

.modal-title {
    color: var(--text-primary);
    font-weight: 700;
    font-size: 1.25rem;
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    background: var(--bg-accent);
    border-top: 1px solid var(--border-color);
    padding: 1.5rem;
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
}

/* Utilitaires d'espacement */
.mb-3 {
    margin-bottom: 1rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

.mt-4 {
    margin-top: 1.5rem;
}

.d-flex {
    display: flex;
}

.gap-2 {
    gap: 0.5rem;
}

.justify-content-between {
    justify-content: space-between;
}

.align-items-center {
    align-items: center;
}

.text-center {
    text-align: center;
}

.w-100 {
    width: 100%;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.open {
        transform: translateX(0);
    }
    
    .main-content {
        margin-left: 0;
    }
    
    body.bg-light {
        padding-left: 0;
    }
    
    .container {
        margin-left: 0;
        max-width: 100%;
        padding: 1rem;
    }
    
    .table {
        font-size: 0.875rem;
    }
    
    .table th,
    .table td {
        padding: 0.75rem;
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
                </li>
                
            </ul><br><br>
        </div>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="footer-button">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

<body class="bg-light text-dark">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-project-diagram"></i> Projets</h2>
        <button class="btn btn-primary" onclick="toggleForm()">
            <i class="fas fa-plus"></i> Nouveau projet
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulaire caché -->
    <div id="formulaireProjet" style="display: none;" class="mb-4">
        <div class="card">
            <div class="card-header">Créer un Projet</div>
            <div class="card-body">
                <form method="POST" action="{{ route('projets.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom du projet</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" required>
                        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom de l'administrateur</label>
                        <input type="text" name="admin_nom" class="form-control @error('admin_nom') is-invalid @enderror" >
                        @error('admin_nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Code Administrateur</label>
                    <input type="password" name="code_admin" class="form-control @error('code_admin') is-invalid @enderror" required>
                    @error('code_admin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="">Choisir</option>
                            <option value="normal">Normal</option>
                            <option value="quotidienne">Quotidienne</option>
                        </select>
                        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button class="btn btn-success w-100" type="submit">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Liste des projets -->
    @if($projets->isEmpty())
        <div class="alert alert-warning text-center">Aucun projet trouvé.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Admin</th>
                    <th>Type</th>
                    <th>Créé le</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projets as $projet)
                   <tr>
                        <td>{{ $projet->nom }}</td>
                        <td>{{ $projet->admin_nom }}</td>
                        <td><span class="badge {{ $projet->type == 'normal' ? 'bg-primary' : 'bg-success' }}">{{ $projet->type }}</span></td>
                        <td>{{ $projet->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                       <!-- Bouton pour ouvrir un formulaire de tâche -->
                       <div class="d-flex gap-2">
    <!-- Bouton pour ouvrir un formulaire de tâche -->
    <button class="btn btn-sm btn-info" style="font-size: 1rem; padding: 0.25rem 0.5rem;" data-bs-toggle="modal" data-bs-target="#modalAjouterTache{{ $projet->id }}">
        <i class="fas fa-plus"></i> Ajouter une Tâche
    </button>

    <a href="{{ route('taches.liste') }}" class="btn btn-sm btn-info" style="font-size: 1rem; padding: 0.25rem 0.5rem;">
        <i class="fas fa-eye"></i> Voir les tâches
    </a>
</div>

 <!-- Modal pour création de tâche -->
                        <div class="modal fade" id="modalAjouterTache{{ $projet->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $projet->id }}" aria-hidden="true"data-bs-backdrop="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $projet->id }}">
                                            <i class="fas fa-tasks mr-2"></i> Créer une tâche pour "{{ $projet->nom }}"
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('taches.store') }}" id="form-ajouter-tache{{ $projet->id }}">
                                            @csrf
                                            <input type="hidden" name="mesprojet_id" value="{{ $projet->id }}">

                                            <div class="form-group mb-3">
                                                <label for="titre{{ $projet->id }}">Titre de la tâche</label>
                                                <input id="titre{{ $projet->id }}" type="text" class="form-control @error('titre') is-invalid @enderror" 
                                                    name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>
                                                @error('titre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="description{{ $projet->id }}">Description</label>
                                                <textarea id="description{{ $projet->id }}" class="form-control @error('description') is-invalid @enderror" 
                                                    name="description" rows="4">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="statut{{ $projet->id }}">Statut</label>
                                                <select id="statut{{ $projet->id }}" class="form-control @error('statut') is-invalid @enderror" name="statut" required>
                                                    <option value="à faire" {{ old('statut') == 'à faire' ? 'selected' : '' }}>À faire</option>
                                                    <option value="en cours" {{ old('statut') == 'en cours' ? 'selected' : '' }}>En cours</option>
                                                    <option value="terminé" {{ old('statut') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                                                </select>
                                                @error('statut')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="date_limite{{ $projet->id }}">Date limite (optionnel)</label>
                                                <input id="date_limite{{ $projet->id }}" type="date" class="form-control @error('date_limite') is-invalid @enderror" 
                                                    name="date_limite" value="{{ old('date_limite') }}">
                                                @error('date_limite')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="responsable{{ $projet->id }}">Responsable (optionnel)</label>
                                                <input id="responsable{{ $projet->id }}" type="text" class="form-control @error('responsable') is-invalid @enderror" 
                                                    name="responsable" value="{{ old('responsable') }}">
                                                @error('responsable')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fas fa-times-circle mr-1"></i> Annuler
                                        </button>
                                        <button type="button" class="btn btn-success" onclick="document.getElementById('form-ajouter-tache{{ $projet->id }}').submit()">
                                            <i class="fas fa-save mr-1"></i> Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<!-- Bootstrap Bundle avec Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Puis votre script -->
<script src="{{ asset('js/projet-modals.js') }}"></script>
<script>
    function toggleForm() {
        const form = document.getElementById('formulaireProjet');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    }
     // Assurez-vous que ce code est inclus après l'inclusion de Bootstrap
// Il peut être placé dans un fichier JS séparé ou dans une balise <script> à la fin de votre page

document.addEventListener('DOMContentLoaded', function() {
    // Initialisez tous les modals Bootstrap
    var modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        new bootstrap.Modal(modal);
    });

    // Gestionnaire pour le bouton de soumission dans les modals
    document.querySelectorAll('[id^="form-ajouter-tache"]').forEach(function(form) {
        const submitButton = form.closest('.modal').querySelector('.btn-success');
        if (submitButton) {
            submitButton.addEventListener('click', function() {
                form.submit();
            });
        }
    });

    // Réinitialisez les formulaires quand un modal est fermé
    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function() {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });

    // Si des messages d'erreur de validation sont présents, ouvrez automatiquement le modal correspondant
    if (document.querySelectorAll('.is-invalid').length > 0) {
        const form = document.querySelector('.is-invalid').closest('form');
        if (form && form.id.startsWith('form-ajouter-tache')) {
            const modalId = form.closest('.modal').id;
            const modal = new bootstrap.Modal(document.getElementById(modalId));
            modal.show();
        }
    }
});
</script>
</body>
</html>