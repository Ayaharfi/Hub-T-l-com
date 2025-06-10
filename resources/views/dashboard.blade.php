<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB TELECOM - Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a365d;
            --primary-light: #2d4a6b;
            --primary-dark: #0f2a44;
            --secondary-color: #0077be;
            --accent-color: #00a6d6;
            --accent-light: #4fb3d9;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --text-light: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --bg-white: #ffffff;
            --bg-light: #f8fafc;
            --bg-secondary: #f1f5f9;
            --bg-sidebar: #ffffff;
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #1a365d 0%, #2d4a6b 100%);
            --gradient-accent: linear-gradient(135deg, #0077be 0%, #00a6d6 100%);
            --gradient-card: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            --transition-speed: 0.3s;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --box-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --box-shadow-card: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --border-radius: 12px;
            --border-radius-lg: 16px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-dark);
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        /* Header and Navigation */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--gradient-primary);
            padding: 0;
            box-shadow: var(--box-shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
        }
        
        .branding {
            display: flex;
            align-items: center;
            padding: 16px 32px;
            height: 80px;
        }
        
        .logo {
            width: 56px;
            height: 56px;
            margin-right: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            box-shadow: 0 8px 16px rgba(0, 119, 190, 0.3);
            transition: var(--transition-speed);
        }
        
        .logo:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 119, 190, 0.4);
        }
        
        .logo i {
            font-size: 28px;
            color: white;
            background: linear-gradient(45deg, #ffffff, #e0f2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .brand-name {
            color: white;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .nav-actions {
            display: flex;
            align-items: center;
            padding-right: 32px;
        }
        
        .search-bar {
            position: relative;
            margin-right: 32px;
        }
        
        .search-bar input {
            width: 320px;
            padding: 12px 20px 12px 48px;
            border: none;
            border-radius: var(--border-radius);
            outline: none;
            transition: var(--transition-speed);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: var(--box-shadow-card);
            font-size: 15px;
        }
        
        .search-bar input:focus {
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.1), var(--box-shadow);
            transform: translateY(-1px);
        }
        
        .search-bar input::placeholder {
            color: var(--text-muted);
        }
        
        .search-bar i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 16px;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 12px 16px;
            border-radius: var(--border-radius);
            transition: var(--transition-speed);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .user-profile:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }
        
        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--gradient-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .avatar i {
            font-size: 20px;
            color: white;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 15px;
            color: white;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        /* Main Content Area */
        .main-container {
            display: flex;
            padding-top: 80px;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 300px;
            height: calc(100vh - 80px);
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            position: fixed;
            top: 80px;
            left: 0;
            padding: 32px 0;
            box-shadow: var(--box-shadow);
            backdrop-filter: blur(20px);
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0 24px;
        }
        
        .sidebar-menu .nav-item {
            margin-bottom: 8px;
        }
        
        .sidebar-menu .nav-item a {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: var(--text-dark);
            text-decoration: none;
            transition: var(--transition-speed);
            border-radius: var(--border-radius);
            font-weight: 500;
            font-size: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-menu .nav-item a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--gradient-accent);
            transition: var(--transition-speed);
            z-index: -1;
        }
        
        .sidebar-menu .nav-item a:hover::before,
        .sidebar-menu .nav-item.active a::before {
            width: 100%;
        }
        
        .sidebar-menu .nav-item a:hover,
        .sidebar-menu .nav-item.active a {
            color: white;
            transform: translateX(8px);
            box-shadow: var(--box-shadow);
        }
        
        .sidebar-menu .nav-item i {
            margin-right: 16px;
            width: 24px;
            text-align: center;
            font-size: 18px;
            transition: var(--transition-speed);
        }
        
        /* Content Area */
        .content {
            flex: 1;
            margin-left: 300px;
            padding: 40px;
            overflow-y: auto;
        }
        
        .page-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 32px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .page-title i {
            margin-right: 16px;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Dashboard Quick Access */
        .quick-access {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 28px;
            margin-bottom: 40px;
        }
        
        .access-card {
            background: var(--gradient-card);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--box-shadow-card);
            padding: 32px;
            transition: var(--transition-speed);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        .access-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
        }
        
        .access-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(0, 119, 190, 0.03) 0%, transparent 70%);
            transition: var(--transition-speed);
            transform: scale(0);
        }
        
        .access-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--box-shadow-hover);
        }
        
        .access-card:hover::after {
            transform: scale(1);
        }
        
        .access-card h3 {
            font-size: 20px;
            margin-bottom: 16px;
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        
        .access-card p {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 24px;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }
        
        .access-card .card-icon {
            position: absolute;
            top: 28px;
            right: 28px;
            font-size: 32px;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0.8;
            transition: var(--transition-speed);
        }
        
        .access-card:hover .card-icon {
            transform: scale(1.1);
            opacity: 1;
        }
        
        .access-card .action-link {
            display: inline-flex;
            align-items: center;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            position: relative;
            z-index: 1;
            transition: var(--transition-speed);
        }
        
        .access-card .action-link:hover {
            color: var(--accent-color);
            transform: translateX(4px);
        }
        
        .access-card .action-link i {
            margin-left: 8px;
            font-size: 14px;
            transition: var(--transition-speed);
        }
        
        .access-card:hover .action-link i {
            transform: translateX(4px);
        }
        
        /* Stats Section */
        .stats-section {
            margin-top: 48px;
        }
        
        .stats-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 24px;
            color: var(--primary-color);
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }
        
        .stat-item {
            padding: 28px 24px;
            background: var(--gradient-card);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--box-shadow-card);
            transition: var(--transition-speed);
            text-align: center;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }
        
        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient-accent);
        }
        
        .stat-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--box-shadow-hover);
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 15px;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Enhanced animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .access-card {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .access-card:nth-child(1) { animation-delay: 0.1s; }
        .access-card:nth-child(2) { animation-delay: 0.2s; }
        .access-card:nth-child(3) { animation-delay: 0.3s; }
        .access-card:nth-child(4) { animation-delay: 0.4s; }
        .access-card:nth-child(5) { animation-delay: 0.5s; }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .quick-access {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                padding: 24px 0;
            }
            
            .sidebar-menu .nav-item span {
                display: none;
            }
            
            .sidebar-menu .nav-item i {
                margin-right: 0;
                font-size: 22px;
            }
            
            .sidebar-menu .nav-item a {
                justify-content: center;
                padding: 18px;
            }
            
            .content {
                margin-left: 80px;
                padding: 32px 24px;
            }
        }
        
        @media (max-width: 768px) {
            .branding {
                padding: 16px 20px;
            }
            
            .brand-name {
                font-size: 20px;
            }
            
            .search-bar {
                display: none;
            }
            
            .quick-access {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .access-card {
                padding: 24px;
            }
            
            .user-name {
                display: none;
            }
            
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .page-title {
                font-size: 28px;
            }
        }
        
        @media (max-width: 480px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform var(--transition-speed);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .content {
                margin-left: 0;
                padding: 20px 16px;
            }
            
            .stats {
                grid-template-columns: 1fr;
            }
        }
        
        /* Loading animation */
        .loading {
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out 0.2s forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="branding">
            <a href="{{ route('eurafric') }}" target="_blank" class="brand-link">
           <span class="brand-name">HUB TELECOM</span>
        </a>
        </div>
        
        <div class="nav-actions">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher...">
            </div>
            
           <div class="user-profile dropdown">
    <div class="avatar dropdown-toggle">
        @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="avatar-img">
        @else
            <i class="fas fa-user"></i>
        @endif
    </div>
    <span class="user-name">{{ Auth::user()->name ?? 'Utilisateur' }}</span>
    </header>
    
    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <ul class="sidebar-menu">
                <li class="nav-item active">
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
                <li class="nav-item">
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
                <li class="nav-item">
                    <a href="{{ route('eurafric') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- Content Area -->
        <main class="content">
            <h1 class="page-title">
                <i class="fas fa-tachometer-alt"></i>
                Tableau de Bord
            </h1>
            
            <!-- Quick Access Cards -->
            <div class="quick-access">
                <div class="access-card">
                    <i class="fas fa-file-alt card-icon"></i>
                    <h3>Documentation</h3>
                    <p>Accédez à tous les documents techniques, guides d'installation et manuels d'utilisation.</p>
                    <a href="{{ route('documents.index') }}" class="action-link">Voir la documentation <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="access-card">
                    <i class="fas fa-video card-icon"></i>
                    <h3>Parc Visioconférence</h3>
                    <p>Gérez les salles de visioconférence et leurs équipements dans toutes les agences.</p>
                    <a href="{{ route('salles.index') }}" class="action-link">Gérer le parc <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="access-card">
                    <i class="fas fa-building card-icon"></i>
                    <h3>BOA Agences</h3>
                    <p>Vue d'ensemble des agences BOA avec leurs informations techniques et contacts.</p>
                    <a href="{{ route('agences.index') }}" class="action-link">Voir les agences <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="access-card">
                    <i class="fas fa-key card-icon"></i>
                    <h3>Coffre des Accès</h3>
                    <p>Stockage sécurisé des mots de passe et identifiants d'accès aux systèmes.</p>
                    <a href="{{ route('dossiers.index') }}" class="action-link">Accéder au coffre <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="access-card">
                    <i class="fas fa-tasks card-icon"></i>
                    <h3>Notes et Tâches</h3>
                    <p>Gérez vos projets, notes importantes et suivi des tâches en cours.</p>
                    <a href="{{ route('projets.index') }}" class="action-link">Voir les tâches <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            
        </main>
    </div>
    
</body>
</html>