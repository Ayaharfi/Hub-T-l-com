<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coffre des Accès</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-accent) 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        .app-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--text-white);
            padding: 2rem 0;
            box-shadow: 0 8px 32px rgba(30, 58, 138, 0.15);
            position: relative;
            overflow: hidden;
        }

        .app-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            opacity: 0.1;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .company-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: var(--accent-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--text-white);
            font-weight: bold;
        }

        .company-name {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .back-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-white);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            color: var(--text-white);
            transform: translateY(-2px);
        }

        .app-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--text-white) 0%, var(--accent-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .app-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 400;
        }

        .main-content {
            padding: 3rem 0;
            min-height: calc(100vh - 180px);
        }

        .sidebar {
            background: var(--bg-card);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(30, 58, 138, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(30, 58, 138, 0.05);
        }

        .content-area {
            background: var(--bg-card);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(30, 58, 138, 0.1);
            padding: 2rem;
            border: 1px solid rgba(30, 58, 138, 0.05);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        .dossier-container {
            margin-bottom: 1rem;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(30, 58, 138, 0.08);
        }

        .dossier-header {
            padding: 1rem 1.25rem;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.05) 0%, rgba(59, 130, 246, 0.05) 100%);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dossier-header:hover {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
            transform: translateY(-1px);
        }

        .dossier-item {
            font-weight: 600;
            color: var(--text-primary);
            flex-grow: 1;
        }

        .sous-dossier-list {
            background: var(--bg-secondary);
            border-top: 1px solid rgba(30, 58, 138, 0.08);
            display: none;
            padding: 1rem;
        }

        .sous-dossier-item {
            padding: 0.875rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: 1px solid transparent;
        }

        .sous-dossier-item:hover {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(251, 191, 36, 0.05) 100%);
            border-color: var(--accent-color);
            transform: translateX(4px);
        }

        .sous-dossier-item i {
            color: var(--accent-color);
            font-size: 0.9rem;
        }

        .tree-toggler {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: var(--primary-color);
        }

        .tree-toggler:hover {
            background: rgba(30, 58, 138, 0.1);
        }

        .tree-toggler.open {
            transform: rotate(90deg);
            color: var(--accent-color);
        }

        .table-container {
            margin-top: 2rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.08);
            border: 1px solid rgba(30, 58, 138, 0.08);
        }

        .details-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .details-table thead th {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--text-white);
            font-weight: 600;
            padding: 1.25rem;
            text-align: left;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .details-table tbody td {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(30, 58, 138, 0.05);
            color: var(--text-primary);
        }

        .details-table tbody tr:last-child td {
            border-bottom: none;
        }

        .details-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.02) 0%, rgba(59, 130, 246, 0.02) 100%);
        }

        .pwd-field {
            position: relative;
        }

        .pwd-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            padding: 4px;
            border-radius: 4px;
        }

        .pwd-toggle:hover {
            color: var(--primary-color);
            background: rgba(30, 58, 138, 0.1);
        }

        .copy-btn {
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            padding: 6px;
            border-radius: 6px;
            margin-right: 0.5rem;
        }

        .copy-btn:hover {
            color: var(--accent-color);
            background: rgba(245, 158, 11, 0.1);
            transform: scale(1.1);
        }

        .btn-action {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: var(--text-white);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
            color: var(--text-white);
        }

        .btn-add-sous-dossier {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .form-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 58, 138, 0.1);
            backdrop-filter: blur(8px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-container {
            background: var(--bg-card);
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(30, 58, 138, 0.2);
            border: 1px solid rgba(30, 58, 138, 0.1);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-title {
            margin-bottom: 2rem;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-color);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid rgba(30, 58, 138, 0.1);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
            outline: none;
        }

        .notification {
            position: fixed;
            top: 2rem;
            right: 2rem;
            padding: 1.25rem 1.75rem;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: var(--text-white);
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.3);
            z-index: 2000;
            transform: translateX(120%);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border-left: 4px solid var(--accent-color);
        }

        .notification.show {
            transform: translateX(0);
        }

        .content-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--primary-color);
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--accent-color);
            position: relative;
        }

        .content-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--accent-color);
        }

        .no-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            text-align: center;
            color: var(--text-muted);
        }

        .no-content i {
            font-size: 4rem;
            margin-bottom: 2rem;
            color: var(--accent-color);
            opacity: 0.7;
        }

        .no-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .password-field {
            position: relative;
        }

        .password-input {
            padding-right: 3rem;
        }

        .password-eye {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            padding: 4px;
            border-radius: 4px;
        }

        .password-eye:hover {
            color: var(--primary-color);
            background: rgba(30, 58, 138, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 58, 138, 0.3);
        }

        .btn-secondary {
            background: var(--bg-accent);
            border: 2px solid rgba(30, 58, 138, 0.1);
            color: var(--text-primary);
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: var(--bg-primary);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        /* Styles responsifs */
        @media (max-width: 768px) {
            .app-title {
                font-size: 2rem;
            }
            
            .main-content {
                padding: 1.5rem 0;
            }
            
            .sidebar, .content-area {
                margin-bottom: 1rem;
            }
            
            .form-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .header-top {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
  <header class="app-header">
        <div class="container">
            <div class="header-content">
                <div class="header-top">
                    <div class="company-logo">
                        <div class="logo-icon">E</div>
                        <div class="company-name">EURAFRIC Information</div>
                    </div>
                    <a href="#" class="back-button" onclick="history.back()">
                        <i class="fas fa-arrow-left"></i>
                        Retour
                    </a>
                </div>
                <h1 class="app-title">Coffre des Accès</h1>
                <p class="app-subtitle">Gestionnaire sécurisé de vos identifiants d'entreprise</p>
            </div>
        </div>
    </header>

     <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar avec l'arbre des dossiers -->
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="section-title mb-0">
                                <i class="fas fa-folder-tree"></i>
                                Dossiers
                            </h3>
                            <button id="btn-add-dossier" class="btn btn-action btn-add">
                                <i class="fas fa-plus"></i>
                                Nouveau Dossier
                            </button>
                        </div>
                    
                <div id="dossier-tree">
                    @foreach($dossiers as $dossier)
                    <div class="dossier-container">
                        <div class="d-flex align-items-center dossier-header">
                            <span class="tree-toggler" data-id="{{ $dossier->id }}">
                                <i class="fas fa-caret-right"></i>
                            </span>
                            <div class="dossier-item flex-grow-1" data-id="{{ $dossier->id }}">
                                {{ $dossier->nom }}
                            </div>
                        </div>
                        <div class="sous-dossier-list" id="sous-dossier-list-{{ $dossier->id }}">
                            @foreach($dossier->sousDossiers as $sousDossier)
                            <div class="sous-dossier-item" data-id="{{ $sousDossier->id }}" data-dossier-id="{{ $dossier->id }}">
                                <i class="fas fa-key"></i>
                                <span>{{ $sousDossier->nom }}</span>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-end mt-2">
                                <button class="btn btn-action btn-add btn-add-sous-dossier" data-dossier-id="{{ $dossier->id }}">
                                    <i class="fas fa-plus"></i> Sous-dossier
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
         <!-- Zone de contenu principal -->
                <div class="col-lg-8 col-md-12">
                    <div class="content-area">
                        <div id="default-content">
                            <div class="no-content">
                                <i class="fas fa-shield-halved"></i>
                                <h3>Sélectionnez un accès</h3>
                                <p>Cliquez sur un sous-dossier dans la barre latérale pour consulter les détails d'accès sécurisés.</p>
                            </div>
                        </div>
                        
                
                <div id="sous-dossier-content" style="display: none;">
                    <h2 class="content-title" id="sous-dossier-title">Titre du sous-dossier</h2>
                    
                    <div class="table-container">
                        <table class="details-table">
                            <thead>
                                <tr>
                                     <th><i class="fas fa-tag me-2"></i>Nom</th>
                                            <th><i class="fas fa-user me-2"></i>Utilisateur</th>
                                            <th><i class="fas fa-lock me-2"></i>Mot de passe</th>
                                            <th><i class="fas fa-network-wired me-2"></i>Code IP</th>
                                            <th><i class="fas fa-sticky-note me-2"></i>Notes</th>
                                            <th><i class="fas fa-cogs me-2"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="sous-dossier-details">
                                <!-- Le contenu sera rempli dynamiquement -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification toast -->
<div class="notification" id="notification"></div>

<!-- Formulaire pour ajouter un dossier -->
<div class="form-overlay" id="dossier-form-overlay">
    <div class="form-container">
        <h4 class="form-title" id="dossier-form-title">Ajouter un dossier</h4>
        <form id="dossier-form">
            <input type="hidden" id="dossier-id" value="">
            
            <div class="mb-4">
                    <label for="dossier-nom" class="form-label">
                        <i class="fas fa-tag me-2"></i>Nom du dossier
                    </label>
                    <input type="text" class="form-control" id="dossier-nom" required>
                    <div class="invalid-feedback" id="dossier-nom-error"></div>
                </div>
            
             <div class="mb-4">
                    <label for="dossier-description" class="form-label">
                        <i class="fas fa-align-left me-2"></i>Description
                    </label>
                    <textarea class="form-control" id="dossier-description" rows="3" placeholder="Description optionnelle du dossier..."></textarea>
                    <div class="invalid-feedback" id="dossier-description-error"></div>
                </div>
            
           <div class="d-flex justify-content-between gap-3">
                    <button type="button" class="btn btn-secondary btn-cancel flex-fill">
                        <i class="fas fa-times me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary flex-fill">
                        <i class="fas fa-save me-2"></i>Enregistrer
                    </button>
           </div>
        </form>
    </div>
</div>

<!-- Formulaire pour ajouter un sous-dossier -->
<div class="form-overlay" id="sous-dossier-form-overlay">
    <div class="form-container">
        <h4 class="form-title" id="sous-dossier-form-title">Ajouter un sous-dossier</h4>
        <form id="sous-dossier-form">
            <input type="hidden" id="sous-dossier-id" value="">
            <input type="hidden" id="sous-dossier-dossier-id" value="">
            
            <div class="mb-3">
                <label for="sous-dossier-nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="sous-dossier-nom" required>
                <div class="invalid-feedback" id="sous-dossier-nom-error"></div>
            </div>
            
            <div class="mb-3">
                <label for="sous-dossier-nom-user" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="sous-dossier-nom-user" required>
                <div class="invalid-feedback" id="sous-dossier-nom-user-error"></div>
            </div>
            
            <div class="mb-3">
                <label for="sous-dossier-mot-passe" class="form-label">Mot de passe</label>
                <div class="password-field">
                    <input type="password" class="form-control password-input" id="sous-dossier-mot-passe" required>
                    <i class="fas fa-eye password-eye"></i>
                </div>
                <div class="invalid-feedback" id="sous-dossier-mot-passe-error"></div>
            </div>
            
            <div class="mb-3">
                <label for="sous-dossier-code-ip" class="form-label">Code IP</label>
                <input type="text" class="form-control" id="sous-dossier-code-ip" required>
                <div class="invalid-feedback" id="sous-dossier-code-ip-error"></div>
            </div>
            
            <div class="mb-3">
                <label for="sous-dossier-notes" class="form-label">Notes</label>
                <textarea class="form-control" id="sous-dossier-notes" rows="3"></textarea>
                <div class="invalid-feedback" id="sous-dossier-notes-error"></div>
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary btn-cancel">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des actions des dossiers
    const dossierTree = document.getElementById('dossier-tree');
    const togglers = dossierTree.querySelectorAll('.tree-toggler');
    
    togglers.forEach(toggler => {
        toggler.addEventListener('click', function() {
            const dossierId = this.getAttribute('data-id');
            const sousDossierList = document.getElementById(`sous-dossier-list-${dossierId}`);
            
            if (sousDossierList.style.display === 'block') {
                sousDossierList.style.display = 'none';
                this.querySelector('i').classList.remove('fa-caret-down');
                this.querySelector('i').classList.add('fa-caret-right');
                this.classList.remove('open');
            } else {
                sousDossierList.style.display = 'block';
                this.querySelector('i').classList.remove('fa-caret-right');
                this.querySelector('i').classList.add('fa-caret-down');
                this.classList.add('open');
            }
        });
    });
    
    // Gestion des clics sur les sous-dossiers
    const sousDossierItems = document.querySelectorAll('.sous-dossier-item');
    
    sousDossierItems.forEach(item => {
        item.addEventListener('click', function() {
            const sousDossierId = this.getAttribute('data-id');
            const sousDossierName = this.querySelector('span').textContent;
            
            // Mettre à jour le titre
            document.getElementById('sous-dossier-title').textContent = sousDossierName;
            
            // Récupérer les détails du sous-dossier depuis la base de données via Ajax
            fetch(`/sous-dossier/${sousDossierId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        const details = document.getElementById('sous-dossier-details');
                        details.innerHTML = `
                            <tr>
                                <td>${data.nom}</td>
                                <td>${data.nom_user}</td>
                                <td class="pwd-field">
                                    <input type="password" class="form-control-plaintext" readonly value="${data.mot_passe}">
                                    <i class="fas fa-eye pwd-toggle"></i>
                                </td>
                                <td>${data.code_ip}</td>
                                <td>${data.notes}</td>
                                <td>
                                    <i class="fas fa-copy copy-btn" title="Copier le nom d'utilisateur"></i>
                                    <i class="fas fa-key copy-btn ms-2" title="Copier le mot de passe"></i>
                                   <i class="fas fa-edit copy-btn ms-2 verifier-code-btn" title="Modifier" data-id="${sousDossierId}"></i>
                                </td>
                            </tr>
                        `;
                         // Ajouter l'événement pour le bouton modifier avec vérification du code
        details.querySelector('.verifier-code-btn').addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            verifierCode(id);
        });

                        // Ajouter les événements pour afficher/masquer les mots de passe
                        const pwdToggles = details.querySelectorAll('.pwd-toggle');
                        pwdToggles.forEach(toggle => {
                            toggle.addEventListener('click', function() {
                                const input = this.previousElementSibling;
                                if (input.type === 'password') {
                                    input.type = 'text';
                                    this.classList.remove('fa-eye');
                                    this.classList.add('fa-eye-slash');
                                } else {
                                    input.type = 'password';
                                    this.classList.remove('fa-eye-slash');
                                    this.classList.add('fa-eye');
                                }
                            });
                        });
                        
                        // Ajouter les événements pour copier les informations
                        const copyButtons = details.querySelectorAll('.copy-btn');
                        copyButtons.forEach((btn, index) => {
                            btn.addEventListener('click', function() {
                                let textToCopy = "";
                                if (index === 0) {
                                    // Copier le nom d'utilisateur
                                    textToCopy = data.nom_user;
                                } else if (index === 1) {
                                    // Copier le mot de passe
                                    textToCopy = data.mot_passe;
                                } else if (index === 2) {
                                    // Modifier le sous-dossier
                                    editSousDossier(sousDossierId, data);
                                    return;
                                }
                                
                                navigator.clipboard.writeText(textToCopy)
                                    .then(() => {
                                        showNotification('Copié dans le presse-papier');
                                    })
                                    .catch(err => {
                                        showNotification('Erreur lors de la copie');
                                        console.error('Erreur lors de la copie:', err);
                                    });
                            });
                        });
                        
                        // Afficher le contenu du sous-dossier
                        document.getElementById('default-content').style.display = 'none';
                        document.getElementById('sous-dossier-content').style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données:', error);
                    showNotification('Erreur lors de la récupération des données');
                });
        });
    });

    function verifierCode(id) {
        const code = prompt("Veuillez entrer le code de vérification pour ce sous-dossier :");
        if (!code) return;

        fetch(`/verifier-code`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ id, code })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                editSousDossier(result.data.id, result.data);
            } else {
                alert("Code incorrect. Veuillez réessayer.");
            }
        })
        .catch(() => {
            alert("Une erreur est survenue. Veuillez réessayer.");
        });
    }

    
    // Fonction pour éditer un sous-dossier
    function editSousDossier(id, data) {
        document.getElementById('sous-dossier-id').value = id;
        document.getElementById('sous-dossier-dossier-id').value = data.dossier_id;
        document.getElementById('sous-dossier-nom').value = data.nom;
        document.getElementById('sous-dossier-nom-user').value = data.nom_user;
        document.getElementById('sous-dossier-mot-passe').value = data.mot_passe;
        document.getElementById('sous-dossier-code-ip').value = data.code_ip;
        document.getElementById('sous-dossier-notes').value = data.notes;
        
        document.getElementById('sous-dossier-form-title').textContent = 'Modifier un sous-dossier';
        document.getElementById('sous-dossier-form-overlay').style.display = 'flex';
    }
    
    // Gestion des formulaires
    const btnAddDossier = document.getElementById('btn-add-dossier');
    const dossierFormOverlay = document.getElementById('dossier-form-overlay');
    const sousDossierFormOverlay = document.getElementById('sous-dossier-form-overlay');
    
    btnAddDossier.addEventListener('click', function() {
        // Réinitialiser le formulaire
        document.getElementById('dossier-id').value = '';
        document.getElementById('dossier-nom').value = '';
        document.getElementById('dossier-description').value = '';
        document.getElementById('dossier-form-title').textContent = 'Ajouter un dossier';
        dossierFormOverlay.style.display = 'flex';
    });
    
    const btnAddSousDossiers = document.querySelectorAll('.btn-add-sous-dossier');
    btnAddSousDossiers.forEach(btn => {
        btn.addEventListener('click', function() {
            const dossierId = this.getAttribute('data-dossier-id');
            // Réinitialiser le formulaire
            document.getElementById('sous-dossier-id').value = '';
            document.getElementById('sous-dossier-dossier-id').value = dossierId;
            document.getElementById('sous-dossier-nom').value = '';
            document.getElementById('sous-dossier-nom-user').value = '';
            document.getElementById('sous-dossier-mot-passe').value = '';
            document.getElementById('sous-dossier-code-ip').value = '';
            document.getElementById('sous-dossier-notes').value = '';
            
            document.getElementById('sous-dossier-form-title').textContent = 'Ajouter un sous-dossier';
            sousDossierFormOverlay.style.display = 'flex';
        });
    });
    
    const btnCancels = document.querySelectorAll('.btn-cancel');
    btnCancels.forEach(btn => {
        btn.addEventListener('click', function() {
            dossierFormOverlay.style.display = 'none';
            sousDossierFormOverlay.style.display = 'none';
        });
    });
    
    // Gestion des soumissions de formulaires
    document.getElementById('dossier-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupération des données du formulaire
        const nom = document.getElementById('dossier-nom').value;
        const description = document.getElementById('dossier-description').value;
        const dossierId = document.getElementById('dossier-id').value;
        
        // Création de l'objet de données à envoyer
        const formData = {
            nom: nom,
            description: description
        };
        
        // URL et méthode en fonction de si c'est une création ou une mise à jour
        const url = dossierId ? `/dossiers/${dossierId}` : '/dossiers';
        const method = dossierId ? 'PUT' : 'POST';
        
        // Envoi des données au serveur
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            showNotification(dossierId ? 'Dossier modifié avec succès' : 'Dossier ajouté avec succès');
            dossierFormOverlay.style.display = 'none';
            this.reset();
            
            // Recharger la page pour afficher les modifications
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Une erreur est survenue');
        });
    });
    
    document.getElementById('sous-dossier-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupération des données du formulaire
        const nom = document.getElementById('sous-dossier-nom').value;
        const nomUser = document.getElementById('sous-dossier-nom-user').value;
        const motPasse = document.getElementById('sous-dossier-mot-passe').value;
        const codeIp = document.getElementById('sous-dossier-code-ip').value;
        const notes = document.getElementById('sous-dossier-notes').value;
        const dossierId = document.getElementById('sous-dossier-dossier-id').value;
        const sousDossierId = document.getElementById('sous-dossier-id').value;
        
        // Création de l'objet de données à envoyer
        const formData = {
            nom: nom,
            nom_user: nomUser,
            mot_passe: motPasse,
            code_ip: codeIp,
            notes: notes,
            dossier_id: dossierId
        };
        
        // URL et méthode en fonction de si c'est une création ou une mise à jour
        const url = sousDossierId ? `/sous-dossiers/${sousDossierId}` : '/sous-dossiers';
        const method = sousDossierId ? 'PUT' : 'POST';
        
        // Envoi des données au serveur
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            showNotification(sousDossierId ? 'Sous-dossier modifié avec succès' : 'Sous-dossier ajouté avec succès');
            sousDossierFormOverlay.style.display = 'none';
            this.reset();
            
            // Recharger la page pour afficher les modifications
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur:', error);
            showNotification('Une erreur est survenue');
        });
    });
    // Gestion des affichages de mots de passe dans le formulaire
    const passwordEyes = document.querySelectorAll('.password-eye');
    passwordEyes.forEach(eye => {
        eye.addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
    
    // Fonction pour afficher les notifications
    function showNotification(message) {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }
});

</script>
</body>
</html>