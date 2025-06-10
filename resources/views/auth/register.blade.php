<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eurafric Information - Inscription</title>
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
        /* Conteneur principal du formulaire de register */
        .register-container {
            width: 100%;
            max-width: 480px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: var(--shadow-heavy);
            padding: 35px;
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
            margin-bottom: 10px;
        }
        
        .form-title {
           font-size: 24px; /* Taille de la police pour le titre du formulaire */
           font-weight: 600; /* Gras semi-lourd pour donner de l'importance */
           color: var(--text-primary); /* Couleur principale du texte via variable CSS */
           margin-bottom: 8px; /* Espacement en bas pour séparer du sous-titre */
           text-align: center; /* Centrer le texte */
        }
        .form-subtitle {
            font-size: 14px;/* Taille pour le sous-titre */
            color: var(--text-secondary);/* Couleur secondaire du texte */
            margin-bottom: 30px;/* Plus grand espace pour bien séparer du contenu suivant */
            text-align: center;/* Centrage du texte */
        }
        
        .input-group {
            position: relative;/* Permet un positionnement absolu pour les icônes */
            margin-bottom: 24px;/* Espacement entre les champs */
        }
        
        .input-label {
            display: block;/* Pour forcer le label à s'afficher sur une ligne complète */
            font-size: 14px;/* Taille standard pour un label */
            font-weight: 500; /* Poids moyen, pour lisibilité */
            color: var(--text-primary); /* Couleur principale */
            margin-bottom: 8px; /* Espacement entre le label et l’input */
        }
        
        .input-wrapper {
            position: relative; /* Nécessaire pour placer les icônes ou boutons à l’intérieur */
        }
        
        .input-icon {
            position: absolute; /* Positionnement fixe dans le champ */
            left: 16px; /* Décalage à gauche */
            top: 50%; /* Centré verticalement */
            transform: translateY(-50%); /* Correction de centrage vertical */
            font-size: 18px; /* Taille de l’icône */
            color: var(--text-secondary); /* Couleur secondaire*/
            z-index: 1; /* S'assurer que l'icône est au-dessus du champ */
        }
        
        .input-field, .form-select {
            width: 100%; /* Champ occupe toute la largeur */
            padding: 16px 16px 16px 50px; /* Espacement intérieur  */
            border: 2px solid var(--border-color); /* Bordure avec couleur personnalisée */
            border-radius: 12px; /* Coins arrondis */
            font-size: 16px; /* Taille de texte lisible */
            font-weight: 400; /* Poids normal */
            background: white; /* Fond blanc */
            color: var(--text-primary); /* Couleur principale */
            transition: all 0.3s ease; /* Animation fluide sur interaction */
        }
        
        .input-field:focus, .form-select:focus {
            outline: none;/* Supprime le contour par défaut du navigateur */
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);/* Effet d’ombre subtil pour focus */
        }
        
        .input-field::placeholder {
            color: #94a3b8;
        }
        
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
        }
        
        .password-toggle {
            position: absolute;/* Position absolue dans l'input */
            right: 16px;
            top: 50%;/* Centré verticalement */
            transform: translateY(-50%);/* Ajustement vertical */
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;/* Curseur en forme de main */
            font-size: 18px;
            padding: 4px;
            border-radius: 4px;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .register-button {
            width: 100%;/* Prend toute la largeur */
            padding: 16px; /* Espacement intérieur confortable */
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;/* Texte bien visible */
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;/* Espacement en bas */
        }
        
        .register-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-light);
        }
        
        .register-button:active {
            transform: translateY(0);
        }
        
        .register-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .register-button:hover::before {
            left: 100%;
        }
        
        .login-link {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
        }
        
        .login-text {
            color: var(--text-secondary);
            font-size: 14px;
        }
        
        .login-text a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
            transition: color 0.3s ease;
        }
        
        .login-text a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .security-badge {
            display: flex; /* Affichage flexible pour alignement */
            align-items: center;
            justify-content: center;
            gap: 8px; /* Espace entre les éléments */
            margin-top: 20px; /* Espacement supérieur */
            padding: 12px; /* Espacement intérieur */
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 8px;
            color: var(--success-color);
            font-size: 13px;
            font-weight: 500; /* Moyennement gras */
        }
        
        .password-strength {
            margin-top: 8px; /* Espace au-dessus */
            font-size: 12px;
            color: var(--text-secondary);
        }
        
        .strength-meter {
            height: 4px; /* Barre très fine */
            background: var(--border-color);
            border-radius: 2px;
            margin-top: 4px;
            overflow: hidden; /* Cache débordements */
        }
        
        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-weak { background: var(--error-color); width: 25%; }
        .strength-medium { background: #f59e0b; width: 50%; }
        .strength-good { background: #10b981; width: 75%; }
        .strength-strong { background: var(--success-color); width: 100%; }
        
        @media (max-width: 480px) {
            .register-container {
                margin: 10px;
                padding: 30px 25px;
            }
            
            .company-name {
                font-size: 24px;
            }
            
            .company-subtitle {
                font-size: 14px;
            }
            
            .form-title {
                font-size: 20px;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .register-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <!-- Conteneur principal du formulaire d'inscription -->
    <div class="register-container">
        <!-- En-tête avec logo et nom de l'entreprise -->
        <div class="company-header">
            <div class="company-logo">
                <img src="{{ asset('logologin.png') }}" alt="Logo" class="logo-image">
            </div>
            <h1 class="company-name">Eurafric Information</h1>
            <p class="company-subtitle">Portail d'inscription sécurisé</p>
        </div>
        <!-- Titre du formulaire -->
        <div class="form-title">Créer un compte</div>
        <div class="form-subtitle">Rejoignez notre plateforme en quelques étapes</div>
        <!-- Formulaire d'inscription -->
        <form method="POST" action="{{ route('register') }}">
            @csrf <!-- Jeton CSRF pour sécurité Laravel -->
        <!-- Champ Nom complet -->
            <div class="input-group">
                <label class="input-label">Nom complet</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input type="text" class="input-field" name="name" placeholder="Votre nom complet" required>
                </div>
                 @error('name')
        <span class="error-text" style="color: red;">{{ $message }}</span>
                 @enderror
            </div>
        <!-- Champ Adresse email -->
            <div class="input-group">
                <label class="input-label">Adresse email</label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" class="input-field" name="email" placeholder="votre.email@eurafric.com" required>
                </div>
                 @error('email')
        <span class="error-text" style="color: red;">{{ $message }}</span>
                 @enderror
            </div>
        <!-- Champ Mot de passe avec indicateur de sécurité -->
            <div class="input-group">
                <label class="input-label">Mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔐</span>
                    <input type="password" class="input-field" name="password" placeholder="Créez un mot de passe sécurisé" required id="password-field">
                    <!-- Bouton pour afficher/masquer le mot de passe -->
                    <button type="button" class="password-toggle" onclick="togglePassword('password-field')">👁️</button>
                </div>
                <div class="password-strength">
                    <div class="strength-meter">
                        <div class="strength-fill" id="strength-fill"></div>
                    </div>
                    <span id="strength-text">Saisissez votre mot de passe</span>
                </div>
            </div>

            <div class="input-group">
                <label class="input-label">Confirmer le mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" class="input-field" name="password_confirmation" placeholder="Confirmez votre mot de passe" required id="confirm-password-field">
                    <button type="button" class="password-toggle" onclick="togglePassword('confirm-password-field')">👁️</button>
                </div>
            </div>

            <div class="input-group">
                <label class="input-label">Rôle</label>
                <div class="input-wrapper">
                    <span class="input-icon">🎯</span>
                    <select name="role" class="form-select" required>
                        <option value="" disabled selected>Sélectionnez votre rôle</option>
                        <option value="membre">👤 Membre</option>
                        <option value="admin">🛡️ Administrateur</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="register-button">
                Créer mon compte
            </button>

            <div class="login-link">
                <p class="login-text">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}">Se connecter</a>
                </p>
            </div>
        </form>
    </div>
    
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const button = event.target;
            
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = '🙈';
            } else {
                input.type = 'password';
                button.textContent = '👁️';
            }
        }
        
        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = '';
            
            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
            if (password.match(/\d/)) strength += 1;
            if (password.match(/[^a-zA-Z\d]/)) strength += 1;
            
            const strengthFill = document.getElementById('strength-fill');
            const strengthText = document.getElementById('strength-text');
            
            switch (strength) {
                case 0:
                case 1:
                    strengthFill.className = 'strength-fill strength-weak';
                    feedback = 'Mot de passe faible';
                    break;
                case 2:
                    strengthFill.className = 'strength-fill strength-medium';
                    feedback = 'Mot de passe moyen';
                    break;
                case 3:
                    strengthFill.className = 'strength-fill strength-good';
                    feedback = 'Bon mot de passe';
                    break;
                case 4:
                    strengthFill.className = 'strength-fill strength-strong';
                    feedback = 'Mot de passe fort';
                    break;
            }
            
            strengthText.textContent = feedback;
        }
        
        // Enhanced form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = this.querySelector('input[name="name"]');
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');
            const passwordConfirm = this.querySelector('input[name="password_confirmation"]');
            const role = this.querySelector('select[name="role"]');
            
            if (!name.value || !email.value || !password.value || !passwordConfirm.value || !role.value) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
                return;
            }
            
            if (!isValidEmail(email.value)) {
                e.preventDefault();
                alert('Veuillez saisir une adresse email valide.');
                return;
            }
            
            if (password.value !== passwordConfirm.value) {
                e.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
                return;
            }
            
            if (password.value.length < 8) {
                e.preventDefault();
                alert('Le mot de passe doit contenir au moins 8 caractères.');
                return;
            }
        });
        
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        // Auto-focus on first input
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.querySelector('.input-field');
            if (firstInput) {
                firstInput.focus();
            }
            
            // Add password strength checker
            const passwordField = document.getElementById('password-field');
            passwordField.addEventListener('input', function() {
                checkPasswordStrength(this.value);
            });
        });
        
        // Enhanced keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const activeElement = document.activeElement;
                if (activeElement.tagName === 'INPUT' || activeElement.tagName === 'SELECT') {
                    const form = activeElement.closest('form');
                    const inputs = Array.from(form.querySelectorAll('input, select, button'));
                    const currentIndex = inputs.indexOf(activeElement);
                    
                    if (currentIndex < inputs.length - 1) {
                        e.preventDefault();
                        inputs[currentIndex + 1].focus();
                    }
                }
            }
        });
        
        // Real-time password confirmation check
        document.getElementById('confirm-password-field').addEventListener('input', function() {
            const password = document.getElementById('password-field').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.style.borderColor = 'var(--error-color)';
            } else if (confirmPassword && password === confirmPassword) {
                this.style.borderColor = 'var(--success-color)';
            } else {
                this.style.borderColor = 'var(--border-color)';
            }
        });
    </script>
</body>
</html>