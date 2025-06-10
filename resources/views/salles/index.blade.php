<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parc Visio - HUB TELECOMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
/* Variables CSS pour Eurafric Information */
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
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-accent) 100%);
  color: var(--text-primary);
  line-height: 1.6;
  min-height: 100vh;
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
  overflow-y: auto;
}

.sidebar.closed {
  transform: translateX(-100%);
}

/* Brand section avec style Eurafric */
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

        .brand-icon i {
            font-size: 30px;
            color: #ffffff;
        }


.brand-icon:hover {
  transform: scale(1.05);
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
  background: linear-gradient(135deg, var(--danger-color), #dc2626);
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

/* Bouton toggle sidebar */
.toggle-btn {
  background: var(--bg-secondary);
  color: var(--primary-color);
  border: 1px solid var(--border-color);
  padding: 0.75rem 1rem;
  cursor: pointer;
  border-radius: var(--radius-lg);
  font-size: 0.9rem;
  font-weight: 500;
  position: fixed;
  top: 1.5rem;
  left: 1.5rem;
  z-index: 1000;
  display: flex;
  align-items: center;
  transition: all var(--transition-base);
  box-shadow: var(--shadow-md);
  backdrop-filter: blur(10px);
}

.toggle-btn i {
  margin-right: 0.5rem;
}

.toggle-btn:hover {
  background: var(--primary-color);
  color: var(--text-white);
  transform: scale(1.05);
}

/* Contenu principal */
main {
  margin-left: 280px;
  padding: 2rem;
  min-height: 100vh;
  transition: margin-left var(--transition-base);
}

/* Titre principal */
h2 {
  font-size: 2rem;
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 2rem;
  text-align: center;
  position: relative;
}

h2::after {
  content: '';
  position: absolute;
  bottom: -0.5rem;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 4px;
  background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
  border-radius: var(--radius-sm);
}

/* Boutons de catégorie avec style Eurafric */
.category-btns {
  margin: 2rem 0;
  gap: 1rem;
}

.category-btn {
  width: 100%;
  padding: 1.25rem 1.5rem;
  margin-bottom: 0;
  background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
  color: var(--text-white);
  border: none;
  border-radius: var(--radius-xl);
  cursor: pointer;
  font-size: 1rem;
  font-weight: 600;
  transition: all var(--transition-base);
  box-shadow: var(--shadow-md);
  position: relative;
  overflow: hidden;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.category-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

.category-btn:hover::before {
  left: 100%;
}

.category-btn:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: var(--shadow-xl);
}

/* Styles de tableau modernisés */
.table {
  width: 100%;
  border-collapse: collapse;
  background: var(--bg-card);
  box-shadow: var(--shadow-lg);
  border-radius: var(--radius-xl);
  overflow: hidden;
  font-size: 0.9rem;
  margin-bottom: 2rem;
}

.table thead {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
  color: var(--text-white);
}

.table th {
  padding: 1.25rem 1rem;
  text-align: left;
  font-weight: 600;
  font-size: 0.875rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border: none;
}

.table td {
  padding: 1rem;
  border-top: 1px solid var(--border-light);
  vertical-align: middle;
}

.table tbody tr {
  transition: all var(--transition-base);
}

.table tbody tr:hover {
  background: var(--bg-accent);
  transform: scale(1.001);
}

/* Boutons modernisés */
.btn {
  padding: 0.625rem 1.25rem;
  border: none;
  border-radius: var(--radius-lg);
  cursor: pointer;
  font-size: 0.875rem;
  font-weight: 500;
  transition: all var(--transition-base);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  box-shadow: var(--shadow-sm);
}

.btn-primary {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
  color: var(--text-white);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

.btn-secondary {
  background: linear-gradient(135deg, var(--text-secondary), #64748b);
  color: var(--text-white);
}

.btn-secondary:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

.btn-warning {
  background: linear-gradient(135deg, var(--warning-color), var(--accent-light));
  color: var(--text-white);
}

.btn-warning:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

.btn-danger {
  background: linear-gradient(135deg, var(--danger-color), #dc2626);
  color: var(--text-white);
}

.btn-danger:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

.btn-sm {
  padding: 0.375rem 0.75rem;
  font-size: 0.8rem;
}

/* Styles de modal */
.modal-content {
  border-radius: var(--radius-xl);
  border: none;
  box-shadow: var(--shadow-xl);
  backdrop-filter: blur(10px);
}

.modal-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
  color: var(--text-white);
  border-bottom: none;
  border-radius: var(--radius-xl) var(--radius-xl) 0 0;
  padding: 1.5rem;
}

.modal-title {
  font-weight: 600;
  font-size: 1.25rem;
}

.modal-body {
  padding: 2rem;
}

.modal-footer {
  padding: 1.5rem 2rem;
  border-top: 1px solid var(--border-light);
}

.btn-close {
  color: var(--text-white);
  opacity: 1;
  font-size: 1.5rem;
}

.btn-close:hover {
  opacity: 0.8;
}

/* Styles de formulaire */
.form-label {
  font-weight: 500;
  margin-bottom: 0.5rem;
  color: var(--text-primary);
  font-size: 0.9rem;
}

.form-control {
  width: 100%;
  padding: 0.875rem 1rem;
  border: 2px solid var(--border-color);
  border-radius: var(--radius-lg);
  margin-bottom: 1rem;
  transition: all var(--transition-base);
  font-size: 0.9rem;
  background: var(--bg-secondary);
}

.form-control:focus {
  border-color: var(--primary-color);
  outline: none;
  box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
  transform: translateY(-1px);
}

/* Zone d'upload modernisée */
.upload-area {
  border: 2px dashed var(--primary-color);
  border-radius: var(--radius-xl);
  padding: 3rem 2rem;
  text-align: center;
  background: linear-gradient(135deg, var(--bg-accent), var(--bg-secondary));
  margin-bottom: 1.5rem;
  transition: all var(--transition-base);
}

.upload-area:hover {
  border-color: var(--primary-light);
  background: var(--bg-accent);
  transform: scale(1.02);
}

.upload-icon {
  font-size: 3rem;
  color: var(--primary-color);
  margin-bottom: 1rem;
}

.upload-text {
  margin-top: 0.75rem;
  color: var(--text-secondary);
  font-weight: 500;
}

/* Container principal */
.main-content {
  background: var(--bg-card);
  border-radius: var(--radius-xl);
  padding: 2rem;
  box-shadow: var(--shadow-lg);
  margin-bottom: 2rem;
}

/* Classes utilitaires */
.hidden {
  display: none !important;
}

.text-center {
  text-align: center;
}

/* Animation de chargement */
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.7; }
}

.loading {
  animation: pulse 2s infinite;
}

/* Responsive design */
@media (max-width: 768px) {
  main {
    margin-left: 0;
    padding: 1rem;
  }
  
  .sidebar {
    transform: translateX(-100%);
  }
  
  .sidebar.active {
    transform: translateX(0);
  }
  
  .toggle-btn {
    display: flex;
  }
  
  .category-btns {
    flex-direction: column;
  }
  
  .category-btn {
    margin-bottom: 1rem;
  }
  
  h2 {
    font-size: 1.5rem;
  }
  
  .table {
    font-size: 0.8rem;
  }
  
  .table th,
  .table td {
    padding: 0.5rem;
  }
}

@media (max-width: 576px) {
  .modal-dialog {
    margin: 1rem;
  }
  
  .modal-body {
    padding: 1rem;
  }
  
  .btn {
    font-size: 0.8rem;
    padding: 0.5rem 1rem;
  }
}

/* Effet de brillance sur les éléments interactifs */
.shine-effect {
  position: relative;
  overflow: hidden;
}

.shine-effect::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
  transition: left 0.6s;
}

.shine-effect:hover::after {
  left: 100%;
}

/* Amélioration de l'accessibilité */
.btn:focus,
.form-control:focus {
  outline: 2px solid var(--primary-color);
  outline-offset: 2px;
}

/* Scrollbar personnalisée */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: var(--bg-accent);
}

::-webkit-scrollbar-thumb {
  background: var(--primary-color);
  border-radius: var(--radius-lg);
}

::-webkit-scrollbar-thumb:hover {
  background: var(--primary-dark);
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
            </ul>
        </div><br><br>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="footer-button">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h2 class="text-center">Liste des Salles - Catégorie : <span id="category-title">Sélectionner une catégorie</span></h2><br>

                <!-- Catégories sous forme de boutons (3 par ligne) -->
                <div class="row category-btns justify-content-center">
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('EURAFRIC')">EURAFRIC</button>
                    </div>
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('BOA_SIEGE')">BOA SIEGE</button>
                    </div>
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('BOA_REGION')">BOA REGION</button>
                    </div>
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('SALLES_VIRTUELLES')">SALLES VIRTUELLES</button>
                    </div>
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('BOA_AGENCE')">BOA AGENCE</button>
                    </div>
                    <div class="col-md-4">
                        <button class="category-btn" onclick="loadCategory('PARTENAIRES')">PARTENAIRES</button>
                    </div>
                </div>

                <!-- Affichage du tableau seulement après sélection d'une catégorie -->
                  <div id="table-container" class="main-content hidden">
                    <h3>Terminaux : <span id="category-name"></span></h3><br>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Salle</th>
                                <th>Nom Salle</th>
                                <th>IP</th>
                                <th>Codec</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données de la table seront ajoutées ici via JavaScript -->
                        </tbody>
                    </table>
                    <!-- Le bouton Go Back -->
                    <div class="mt-3">
                    <button class="btn btn-secondary" onclick="goBack()">Go Back</button>
                  </div>
                  <br>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSalleModal">Ajouter une salle</button>
                    <!-- Modal pour ajouter une salle -->
                    <div class="modal fade" id="addSalleModal" tabindex="-1" aria-labelledby="addSalleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSalleModalLabel">Ajouter une salle</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('salles.store') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="category" id="category-input">
                                        <div class="mb-3">
                                            <label for="IdSalle" class="form-label">ID</label>
                                            <input type="number" class="form-control" id="idSalle" name="idSalle" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomSalle" class="form-label">Nom de la salle</label>
                                            <input type="text" class="form-control" id="nomSalle" name="nomSalle" required>
                                        </div>
                                         <div class="mb-3">
                                            <label for="CODE" class="form-label">Code de vérification</label>
                                            <input type="number" class="form-control" id="code" name="verification_code" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ip" class="form-label">IP</label>
                                            <input type="text" class="form-control" id="ip" name="ip" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="codec" class="form-label">Codec</label>
                                            <input type="text" class="form-control" id="codec" name="codec" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<!-- Modal Vérification Code -->
<div class="modal fade" id="verifyCodeModal" tabindex="-1" aria-labelledby="verifyCodeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Vérification du code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Veuillez entrer le code de vérification pour éditer cette salle :</p>
        <input type="password" class="form-control" id="verificationCodeInput" placeholder="Code de vérification">
        <div id="verificationError" style="color: red; margin-top: 8px; display: none;">Code incorrect</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="verifyCodeBtn">Valider</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edition Salle -->
<div class="modal fade" id="editSalleModal" tabindex="-1" aria-labelledby="editSalleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editSalleForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier la salle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editIdSalle" name="idSalle">
        <div class="mb-3">
          <label for="editNomSalle" class="form-label">Nom de la salle</label>
          <input type="text" class="form-control" id="editNomSalle" name="nomSalle" required>
        </div>
        <div class="mb-3">
          <label for="editIp" class="form-label">IP</label>
          <input type="text" class="form-control" id="editIp" name="ip" required>
        </div>
        <div class="mb-3">
          <label for="editCodec" class="form-label">Codec</label>
          <input type="text" class="form-control" id="editCodec" name="codec" required>
        </div>
        <div class="mb-3">
          <label for="editLocation" class="form-label">Location</label>
          <input type="text" class="form-control" id="editLocation" name="location" required>
        </div>
        <div class="mb-3">
          <label for="editCode" class="form-label">Code de vérification</label>
          <input type="text" class="form-control" id="editCode" name="code" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
let currentEditingSalle = null; // Stocke la salle en cours d'édition
let sallesData = []; // Stocke les salles chargées pour accès facile

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('closed');
}

function toggleTheme() {
    document.body.classList.toggle('light');
}

// Charger les salles selon la catégorie
function loadCategory(category) {
    document.getElementById('category-title').innerText = category;
    document.querySelector('.category-btns').style.display = 'none';
    document.getElementById('table-container').classList.remove('hidden');
    document.getElementById('category-name').innerText = category;
    document.getElementById('category-input').value = category;

    fetch(`/salles/parCategorie/${category}`)
        .then(response => {
            if (!response.ok) throw new Error('Erreur réseau');
            return response.json();
        })
        .then(data => {
            sallesData = data; // mémorise pour édition/suppression
            const tbody = document.querySelector('table tbody');
            tbody.innerHTML = '';

            data.forEach(salle => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', salle.id);
                row.innerHTML = `
                    <td>${salle.id}</td>
                    <td>${salle.nom_salle}</td>
                    <td>${salle.ip}</td>
                    <td>${salle.codec}</td>
                    <td>${salle.location}</td>
                    <td>
                        <button class="btn btn-warning btn-sm me-1" onclick="openVerificationModal(${salle.id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteSalle(${salle.id})">Supprimer</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => alert('Erreur lors du chargement des salles : ' + error.message));
}
// Bouton Go Back — revient à la sélection des catégories
function goBack() {
    document.getElementById('table-container').classList.add('hidden');
    document.querySelector('.category-btns').style.display = 'flex';
    document.getElementById('category-title').innerText = 'Sélectionner une catégorie';
    sallesData = [];
    currentEditingSalle = null;
    document.querySelector('table tbody').innerHTML = '';
}

// Ouvre la modal de vérification du code avant édition
function openVerificationModal(salleId) {
    currentEditingSalle = sallesData.find(s => s.id === salleId);
    if (!currentEditingSalle) return alert('Salle non trouvée');

    document.getElementById('verificationCodeInput').value = '';
    document.getElementById('verificationError').style.display = 'none';
    const verifyModal = new bootstrap.Modal(document.getElementById('verifyCodeModal'));
    verifyModal.show();
}

// Vérification du code de la salle pour autoriser édition
document.getElementById('verifyCodeBtn').addEventListener('click', () => {
    const inputCode = document.getElementById('verificationCodeInput').value;
    const salleId = currentEditingSalle.id;

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/salles/${salleId}/verify-code`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ code: inputCode })
    })
    .then(response => {
        if (!response.ok) throw new Error("Code incorrect");
        return response.json();
    })
    .then(data => {
        const verifyModal = bootstrap.Modal.getInstance(document.getElementById('verifyCodeModal'));
        verifyModal.hide();

        const salle = data.salle;

        // Pré-remplir le formulaire d'édition
        document.getElementById('editIdSalle').value = salle.id;
        document.getElementById('editNomSalle').value = salle.nom_salle;
        document.getElementById('editIp').value = salle.ip;
        document.getElementById('editCodec').value = salle.codec;
        document.getElementById('editLocation').value = salle.location;
        document.getElementById('editCode').value = salle.verification_code;

        const editModal = new bootstrap.Modal(document.getElementById('editSalleModal'));
        editModal.show();
    })
    .catch(err => {
        console.error(err);
        document.getElementById('verificationError').style.display = 'block';
    });
});


// Envoi formulaire édition (à adapter selon backend)
document.getElementById('editSalleForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const id = document.getElementById('editIdSalle').value;
    const nom = document.getElementById('editNomSalle').value;
    const ip = document.getElementById('editIp').value;
    const codec = document.getElementById('editCodec').value;
    const location = document.getElementById('editLocation').value;
    const code = document.getElementById('editCode').value;

    const formData = new FormData();
    formData.append('nom_salle', nom);
    formData.append('ip', ip);
    formData.append('codec', codec);
    formData.append('location', location);
    formData.append('verification_code', code);
    formData.append('_method', 'PUT');
    // Récupérer le jeton CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/salles/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json' // Important: demande une réponse JSON
        },
        body: formData
    })
.then(response => {
        if (!response.ok) {
            if (response.headers.get('content-type')?.includes('application/json')) {
                return response.json().then(json => { throw new Error(json.message || 'Erreur serveur'); });
            } else {
                return response.text().then(text => { throw new Error('Erreur serveur'); });
            }
        }
        return response.json();
    })
    .then(updatedSalle => {
        // Mettre à jour les données locales
        const index = sallesData.findIndex(s => s.id == id);
        if (index !== -1) sallesData[index] = updatedSalle;
        
        // Recharger la catégorie pour actualiser l'affichage
        loadCategory(document.getElementById('category-input').value);
        
        // Fermer la modal
        const editModal = bootstrap.Modal.getInstance(document.getElementById('editSalleModal'));
        editModal.hide();
        
        // Afficher un message de succès
        alert('Salle mise à jour avec succès!');
    })
    .catch(err => {
        console.error(err);
        alert("Erreur lors de la mise à jour : " + err.message);
    });
});


// Suppression de salle (avec confirmation)
function deleteSalle(id) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')) return;

    fetch(`/salles/${id}`, { method: 'DELETE' })
        .then(response => {
            if (!response.ok) throw new Error('Erreur lors de la suppression');
            // Retirer salle de la liste locale
            sallesData = sallesData.filter(s => s.id !== id);
            loadCategory(document.getElementById('category-input').value);
        })
        .catch(error => alert(error.message));
}


    </script>
</body>

</html>