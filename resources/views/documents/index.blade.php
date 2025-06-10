<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Documentaire - Hub Banque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            display: flex;
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
            display: none;
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
        .content-wrapper {
            margin-left: 280px;
            padding: 2rem;
            width: calc(100% - 280px);
            transition: all var(--transition-base);
        }

        /* En-tête de page */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border-bottom: 4px solid var(--accent-color);
        }

        .header-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .header-title i {
            margin-right: 1rem;
            font-size: 2rem;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Cards modernisées */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: none;
            transition: all var(--transition-base);
            margin-bottom: 2rem;
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .card-header {
            background: linear-gradient(135deg, var(--bg-accent), var(--bg-secondary));
            border-bottom: 1px solid var(--border-light);
            padding: 1.5rem 2rem;
            font-weight: 600;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }

        .card-header i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
            color: var(--accent-color);
        }

        .card-body {
            padding: 2rem;
        }

        /* Formulaires modernisés */
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .form-control, .form-select {
            border-radius: var(--radius-lg);
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            transition: all var(--transition-base);
            background: var(--bg-secondary);
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
            outline: none;
            transform: translateY(-1px);
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group-text {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--text-white);
            border: 2px solid var(--primary-color);
            font-weight: 500;
        }

        /* Boutons modernisés */
        .btn {
            border-radius: var(--radius-lg);
            padding: 0.875rem 1.5rem;
            font-weight: 500;
            transition: all var(--transition-base);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            color: var(--text-white);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: var(--text-white);
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--text-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline-success {
            border: 2px solid var(--success-color);
            color: var(--success-color);
            background: transparent;
        }

        .btn-outline-success:hover {
            background: var(--success-color);
            color: var(--text-white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Zone d'upload modernisée */
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload-label {
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 3rem 2rem;
            border-radius: var(--radius-xl);
            border: 3px dashed var(--primary-color);
            transition: all var(--transition-base);
            text-align: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--bg-accent), var(--bg-secondary));
            color: var(--text-secondary);
            flex-direction: column;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .file-upload-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.05), rgba(59, 130, 246, 0.05));
            opacity: 0;
            transition: opacity var(--transition-base);
        }

        .file-upload-label:hover::before {
            opacity: 1;
        }

        .file-upload-label:hover {
            border-color: var(--primary-light);
            color: var(--primary-color);
            transform: scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Tableau modernisé */
        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-card);
            box-shadow: var(--shadow-lg);
            border-radius: var(--radius-xl);
            overflow: hidden;
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: var(--text-white);
            font-weight: 600;
            border: none;
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            background: var(--bg-card);
            transition: all var(--transition-base);
            border-bottom: 1px solid var(--border-light);
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: var(--bg-accent);
            transform: scale(1.001);
        }

        .table td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        /* Badges modernisés */
        .badge {
            padding: 0.5rem 1rem;
            font-weight: 500;
            border-radius: 50px;
            font-size: 0.8rem;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            color: var(--text-white);
            box-shadow: var(--shadow-sm);
        }

        /* Alertes modernisées */
        .alert {
            border-radius: var(--radius-xl);
            padding: 1.5rem 2rem;
            border: none;
            display: flex;
            align-items: center;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .alert::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 4px;
            background: var(--success-color);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            color: var(--success-color);
        }

        .alert i {
            margin-right: 1rem;
            font-size: 1.25rem;
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

        /* Responsive design */
        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
                padding: 1rem;
                width: 100%;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .toggle-btn {
                display: flex;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .file-upload-label {
                padding: 2rem 1rem;
            }
        }

        /* Animation de fadeIn */
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

        .card, .alert {
            animation: fadeInUp 0.6s ease-out;
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

    <!-- Contenu principal -->
    <main class="content-wrapper">
        <div class="page-header">
            <h1 class="header-title">
                <i class="fas fa-file-import"></i> Importation des Documents
            </h1>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <!-- Notifications -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        <div class="row">
            <!-- Formulaire d'importation -->
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-upload"></i> Importer des Documents
                    </div>
                    <div class="card-body">
                        <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Sujet</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <select name="subject" id="subject" class="form-select" onchange="toggleNewSubject(this)">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                                        @endforeach
                                        <option value="other">Autre...</option>
                                    </select>
                                </div>
                            </div>

                            <div id="new_subject_div" class="mb-3" style="display:none;">
                                <label for="new_subject_name" class="form-label">Nouveau Sujet</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-plus-circle"></i></span>
                                    <input type="text" name="new_subject_name" id="new_subject_name" class="form-control" placeholder="Entrez le nom du nouveau sujet">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="folder" class="form-label">Nom du dossier</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                                    <input type="text" name="folder" id="folder" class="form-control" placeholder="Nom du dossier" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="files" class="form-label">Fichiers</label>
                                <div class="file-upload">
                                    <label class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                        <span>Sélectionner des fichiers</span>
                                        <small class="text-muted">Glissez-déposez ou cliquez pour parcourir</small>
                                        <input type="file" name="files[]" id="files" class="file-upload-input" multiple required>
                                    </label>
                                </div>
                                <div id="selected-files" class="mt-2 small text-muted"></div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-upload"></i> Importer les documents
                                </button>
                            </div>
                            
                            <!-- Bouton pour afficher le tableau -->
                            <div class="d-grid">
                                <button type="button" class="btn btn-outline-primary" onclick="showTable()">
                                    <i class="fas fa-list"></i> Afficher les documents
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des documents - maintenant affiché en dessous -->
        <div id="documentTable" class="row mt-4" style="display: none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <i class="fas fa-file-alt"></i> Liste des Documents
                            </div>
                            <div class="input-group" style="width: 250px;">
                                <input type="text" id="searchDocs" class="form-control" placeholder="Rechercher...">
                                <button class="btn btn-outline-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-hashtag"></i> ID</th>
                                        <th><i class="fas fa-file"></i> Nom</th>
                                        <th><i class="fas fa-tag"></i> Sujet</th>
                                        <th><i class="fas fa-folder"></i> Dossier</th>
                                        <th><i class="fas fa-download"></i> Actions</th>
                                        <th><i class="fas fa-calendar"></i> Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $doc)
                                        <tr>
                                            <td>{{ $doc->id }}</td>
                                            <td>{{ $doc->name }}</td>
                                            <td>
                                                <span class="badge bg-info">{{ $doc->subject }}</span>
                                            </td>
                                            <td>{{ $doc->folder }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('documents.view', $doc->id) }}" target="_blank" class="btn btn-outline-primary" title="Visualiser">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $doc->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <i class="fas fa-folder-open fa-2x mb-2 text-muted"></i>
                                                <p class="mb-0">Aucun document trouvé.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fonction pour afficher le tableau
    function showTable() {
        document.getElementById('documentTable').style.display = 'block';
    }
    
    // Afficher ou masquer le champ de nouveau sujet
    function toggleNewSubject(select) {
        document.getElementById('new_subject_div').style.display = (select.value === 'other') ? 'block' : 'none';
    }
    
    // Afficher les noms des fichiers sélectionnés
    document.getElementById('files').addEventListener('change', function(e) {
        const fileList = Array.from(e.target.files).map(file => file.name).join(', ');
        document.getElementById('selected-files').innerHTML = fileList ? 
            `<i class="fas fa-check-circle text-success me-1"></i> ${e.target.files.length} fichier(s) sélectionné(s): ${fileList}` : '';
    });
    
    // Filtrer les documents
    document.getElementById('searchDocs').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

</script>
</body>
</html>