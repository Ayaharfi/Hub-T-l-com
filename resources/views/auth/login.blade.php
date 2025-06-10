<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eurafric Information - Connexion</title>
    <style>
        /* Importation de la police Inter depuis Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        /* Réinitialisation de base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        /* Déclaration des variables CSS pour les couleurs, ombres, etc. */
        :root {
            --primary-color: #0066cc;
            --primary-dark: #0052a3;
            --secondary-color: #f8fafc;
            --accent-color: #e11d48;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
            --error-color: #ef4444;
            --gradient-bg: linear-gradient(135deg, #edeff7 0%, #9b8bab 100%);
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        /* Style global du body */
        body {
            font-family: 'Inter', sans-serif;
            background: var(--gradient-bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        /* Image d’arrière-plan*/
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('background.png') }}");
            pointer-events: none;
        }
        /* Conteneur principal du formulaire de connexion */
        .login-container {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: var(--shadow-heavy);
            padding: 22px;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        /* En-tête de la société (logo + nom) */
        .company-header {
            text-align: center;
            margin-bottom: 35px;
        }
        /* Style du logo */
        .company-logo {
            width: 120px;
            height: 80px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }
        /* Image du logo */
        .logo-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        /* Nom de l'entreprise */
        .company-name {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.025em;
        }
        /* sous-titre */
        .company-subtitle {
            font-size: 16px;
            color: var(--text-secondary);
            font-weight: 400;
        }
        /* Onglets de connexion (ex: Utilisateur/Admin) */
        .login-tabs {
            display: flex;
            background: var(--secondary-color);
            border-radius: 12px;
            padding: 4px;
            margin-bottom: 30px;
            position: relative;
        }
        /* Boutons d’onglets */
        .tab-button {
            flex: 1;
            padding: 12px 20px;
            border: none;
            background: transparent;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }     
        /* Bouton actif */
        .tab-button.active {
            color: var(--primary-color);
            background: white;
            box-shadow: var(--shadow-light);
        }
        /* Sections de formulaire associées aux onglets */
        .form-section {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
        /* Section visible */
        .form-section.active {
            display: block;
        }
        /* Animation d’apparition */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Groupe d’entrée (label + champ) */
        .input-group {
            position: relative;
            margin-bottom: 24px;
        }
        /* Label du champ */
        .input-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        /* Conteneur pour l’icône et le champ */
        .input-wrapper {
            position: relative;
        }
        /* Icône d’entrée*/
        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: var(--text-secondary);
            z-index: 1;
        }
        /* Champ de saisie */
        .input-field {
            width: 100%;
            padding: 16px 16px 16px 50px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 16px;
            font-weight: 400;
            background: white;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        /* Effets au focus */
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
        }
        /* Placeholder personnalisé */
        .input-field::placeholder {
            color: #94a3b8;
        }
        /* Bouton d’affichage du mot de passe */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
            border-radius: 4px;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        /* Ligne contenant la case à cocher et le lien mot de passe oublié */
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        /* Case à cocher personnalisée */
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            position: relative;
            cursor: pointer;
        }
        
        .checkbox input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            cursor: pointer;
        }
        /* Style lorsqu’elle est cochée */
        .checkbox input:checked + .checkmark {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkbox input:checked + .checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .checkbox-label {
            font-size: 14px;
            color: var(--text-secondary);
            cursor: pointer;
        }
        /* Lien mot de passe oublié */
        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--primary-dark);
        }
        /* Bouton de connexion */
        .login-button {
            width: 100%;
            padding: 16px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-light);
        }
        
        .login-button:active {
            transform: translateY(0);
        }
        /* Animation brillante lors du hover */
        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .login-button:hover::before {
            left: 100%;
        }
        /* Lien vers la page d'inscription */
        .register-link {
            text-align: center;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
        }
        
        .register-text {
            color: var(--text-secondary);
            font-size: 14px;
        }
        
        .register-text a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
            transition: color 0.3s ease;
        }
        
        .register-text a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        /* Badge de sécurité*/
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            padding: 12px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 8px;
            color: var(--success-color);
            font-size: 13px;
            font-weight: 500;
        }
        /* Responsive pour petits écrans */
        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
                padding: 30px 25px;
            }
            
            .company-name {
                font-size: 24px;
            }
            
            .company-subtitle {
                font-size: 14px;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
     <!-- Conteneur principal de la page de connexion -->
    <div class="login-container">
         <!-- En-tête contenant le logo et le nom de la société -->
        <div class="company-header">
            <!-- Conteneur du logo de l'entreprise -->
            <div class="company-logo">
                <!-- Image du logo -->
                <img src="{{ asset('logologin.png') }}" alt="Logo" class="logo-image">
                <svg width="400" height="220" viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
                    <!-- Logo Icon Background -->
                    <rect x="120" y="40" width="250" height="150" rx="8" fill="#2563eb"/>
                    
                    <!-- EA Logo Elements -->
                    <!-- E lines -->
                    <rect x="150" y="70" width="50" height="8" fill="white"/>
                    <rect x="150" y="95" width="40" height="8" fill="white"/>
                    <rect x="150" y="120" width="50" height="8" fill="white"/>
                    
                    <!-- A letter -->
                    <polygon points="230,160 250,70 270,70 290,160 275,160 272,145 248,145 245,160" fill="white"/>
                    <rect x="252" y="125" width="16" height="8" fill="#2563eb"/>
                    
                    <!-- Accent element -->
                    <polygon points="300,70 320,70 340,160 320,160" fill="#0ea5e9"/>
                </svg>
            </div>
            <h1 class="company-name">Eurafric Information</h1>
            <p class="company-subtitle">Portail de connexion sécurisé</p>
        </div>
        <!-- Onglets de navigation entre "Membre" et "Administrateur" -->
        <div class="login-tabs">
            <button class="tab-button active" onclick="switchTab('member')">
                👤 Membre
            </button>
            <button class="tab-button" onclick="switchTab('admin')">
                🛡️ Administrateur
            </button>
        </div>
        
        <!-- Formulaire de connexion membre -->
        <div class="form-section active" id="member-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Protection CSRF de Laravel -->
                <!-- Groupe d'entrée pour l'adresse email -->
                <div class="input-group">
                    <label class="input-label">Adresse email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input type="email" class="input-field" name="email" placeholder="votre.email@eurafric.com" required>
                    </div>
                </div>
                <!-- Groupe d'entrée pour le mot de passe -->
                <div class="input-group">
                    <label class="input-label">Mot de passe</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔐</span>
                        <input type="password" class="input-field" name="password" placeholder="Votre mot de passe" required id="member-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('member-password')">👁️</button>
                    </div>
                </div>
                <!-- Section "se souvenir" et "mot de passe oublié" -->
                <div class="remember-forgot">
                    <div class="checkbox-wrapper">
                        <div class="checkbox">
                            <input type="checkbox" id="remember-member" name="remember">
                            <div class="checkmark"></div>
                        </div>
                        <label for="remember-member" class="checkbox-label">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('forgot-password') }}" class="forgot-link">Mot de passe oublié ?</a>
                </div>
                <!-- Bouton de connexion -->
                <button type="submit" class="login-button">
                    Se connecter
                </button>
            </form>
            <!-- Lien vers la création de compte -->
            <div class="register-link">
                <p class="register-text">
                    Nouveau chez Eurafric Information ?
                    <a href="{{ route('register') }}">Créer un compte</a>
                </p>
            </div>
        </div>
        
        <!-- Formulaire de connexion administrateur -->
        <div class="form-section" id="admin-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <label class="input-label">Email administrateur</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👨‍💼</span>
                        <input type="email" class="input-field" name="email" placeholder="admin@eurafric.com" required>
                    </div>
                </div>
                
                <div class="input-group">
                    <label class="input-label">Mot de passe administrateur</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🛡️</span>
                        <input type="password" class="input-field" name="password" placeholder="Mot de passe sécurisé" required id="admin-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('admin-password')">👁️</button>
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="checkbox-wrapper">
                        <div class="checkbox">
                            <input type="checkbox" id="remember-admin" name="remember">
                            <div class="checkmark"></div>
                        </div>
                        <label for="remember-admin" class="checkbox-label">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('forgot-password') }}" class="forgot-link">Mot de passe oublié ?</a>
                </div>
                
                <button type="submit" class="login-button">
                    Accès administrateur
                </button>
            </form>
        </div>
    </div>
    
    <script>
        // Fonction pour changer d'onglet entre membre et admin
        function switchTab(tabName) {
            // Supprimer les classes "active" sur les onglets et les sections
            document.querySelectorAll('.tab-button').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.form-section').forEach(form => {
                form.classList.remove('active');
            });
            
            // Ajouter la classe "active" à l’onglet et à la section sélectionnés
            event.target.classList.add('active');
            document.getElementById(tabName + '-form').classList.add('active');
        }
        // Fonction pour afficher ou masquer le mot de passe
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const button = event.target;
            // Changer le type de l'input entre "password" et "text"
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = '🙈';// Icône yeux fermés
            } else {
                input.type = 'password';
                button.textContent = '👁️';// Icône œil
            }
        }
        
        // Validation du formulaire avant soumission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const email = form.querySelector('input[name="email"]');
                const password = form.querySelector('input[name="password"]');
                // Vérifie si tous les champs sont remplis
                if (!email.value || !password.value) {
                    e.preventDefault();
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return;
                }
                // Vérifie si l'email est au bon format
                if (!isValidEmail(email.value)) {
                    e.preventDefault();
                    alert('Veuillez saisir une adresse email valide.');
                    return;
                }
            });
        });
        // Fonction pour valider une adresse email avec une expression régulière
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        // Auto-focus sur le premier champ de saisie du formulaire actif
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.querySelector('.form-section.active .input-field');
            if (firstInput) {
                firstInput.focus();
            }
        });
        
        // Navigation clavier améliorée : boucle sur les champs avec "Tab"
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                const activeForm = document.querySelector('.form-section.active');
                const inputs = activeForm.querySelectorAll('input, button');
                const currentIndex = Array.from(inputs).indexOf(document.activeElement);
                
                if (e.shiftKey && currentIndex === 0) {
                    e.preventDefault();
                    inputs[inputs.length - 1].focus();
                } else if (!e.shiftKey && currentIndex === inputs.length - 1) {
                    e.preventDefault();
                    inputs[0].focus();// Boucle avant
                }
            }
        });
    </script>
</body>
</html>