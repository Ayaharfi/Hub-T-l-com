<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eurafric Information - Nouveau mot de passe</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
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
            --warning-color: #f59e0b;
            --gradient-bg: linear-gradient(135deg, #edeff7 0%, #9b8bab 100%);
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
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
        
        .reset-container {
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: var(--shadow-heavy);
            padding: 40px;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }
        
        .company-header {
            margin-bottom: 30px;
        }
        
        .company-logo {
            width: 80px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
        }
        
        .logo-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        
        .company-name {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 5px;
            letter-spacing: -0.025em;
        }
        
        .reset-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
            box-shadow: var(--shadow-light);
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 15px;
            letter-spacing: -0.025em;
        }
        
        .page-subtitle {
            font-size: 16px;
            color: var(--text-secondary);
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 24px;
            text-align: left;
        }
        
        .input-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: var(--text-secondary);
            z-index: 1;
        }
        
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
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
        }
        
        .input-field::placeholder {
            color: #94a3b8;
        }
        
        .code-input {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-bottom: 24px;
        }
        
        .code-digit {
            width: 50px;
            height: 50px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            background: white;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        
        .code-digit:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
        }
        
        .submit-button {
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
            margin-bottom: 20px;
        }
        
        .submit-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-light);
        }
        
        .submit-button:active {
            transform: translateY(0);
        }
        
        .submit-button:disabled {
            background: var(--text-secondary);
            cursor: not-allowed;
            transform: none;
        }
        
        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .submit-button:hover::before {
            left: 100%;
        }
        
        .back-button {
            width: 100%;
            padding: 14px;
            background: transparent;
            color: var(--text-secondary);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }
        
        .back-button:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .info-card {
            background: rgba(59, 130, 246, 0.1);
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
            text-align: left;
        }
        
        .info-card p {
            margin: 0;
            font-size: 14px;
            color: var(--text-secondary);
            line-height: 1.5;
        }
        
        .success-message {
            background: rgba(16, 185, 129, 0.1);
            border: 2px solid rgba(16, 185, 129, 0.3);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
            color: var(--success-color);
            font-size: 14px;
            font-weight: 500;
            display: none;
            text-align: center;
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
            color: var(--error-color);
            font-size: 14px;
            font-weight: 500;
            display: none;
            text-align: center;
        }
        
        @media (max-width: 480px) {
            .reset-container {
                margin: 10px;
                padding: 30px 25px;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .code-input {
                gap: 8px;
            }
            
            .code-digit {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
        }
        
        .reset-container {
            animation: fadeIn 0.6s ease-out;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="company-header">
            <div class="company-logo">
                <img src="{{ asset('logologin.png') }}" alt="Logo" class="logo-image">
            </div>
            <div class="company-name">Eurafric Information</div>
        </div>
        
        <div class="reset-icon pulse">
            🔑
        </div>
        
        <h1 class="page-title">Nouveau mot de passe</h1>
        <p class="page-subtitle">
            Saisissez le code de récupération et votre nouveau mot de passe
        </p>
        
        <form method="POST" action="{{ route('register') }}" id="reset-form">
            @csrf
            <div class="info-card">
                <p>Saisissez votre nouveau mot de passe.</p>
            </div>
            <div class="input-group">
                <label class="input-label">Nouveau mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" class="input-field" name="password" placeholder="Saisissez votre nouveau mot de passe" required minlength="8">
                </div>
            </div>
            
            <div class="input-group">
                <label class="input-label">Confirmer le mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" class="input-field" name="password_confirmation" placeholder="Confirmez votre nouveau mot de passe" required minlength="8">
                </div>
            </div>
            
            <div class="success-message" id="success-message">
                ✅ Mot de passe mis à jour avec succès ! Redirection...
            </div>
            
            <div class="error-message" id="error-message">
                ❌ Erreur lors de la mise à jour. Vérifiez vos informations.
            </div>
            
            <button type="submit" class="submit-button" id="reset-btn">
                Mettre à jour le mot de passe
            </button>
        </form>
        
        <a href="{{ route('login') }}" class="back-button">
            ← Retour à la connexion
        </a>
    </div>
    
    <script>
        // Code input handling
        const codeInputs = document.querySelectorAll('.code-digit');
        codeInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                // Only allow numbers
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                
                if (e.target.value.length === 1 && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
                
                // Update hidden field
                updateRecoveryCode();
            });
            
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    codeInputs[index - 1].focus();
                }
            });
            
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text');
                if (pastedData.length === 6 && /^\d{6}$/.test(pastedData)) {
                    codeInputs.forEach((inp, i) => {
                        inp.value = pastedData[i];
                    });
                    codeInputs[5].focus();
                    updateRecoveryCode();
                }
            });
        });
        
        function updateRecoveryCode() {
            const code = Array.from(codeInputs).map(input => input.value).join('');
            document.getElementById('recovery_code').value = code;
        }
        
        function showMessage(type, elementId, message = '') {
            hideMessages();
            const element = document.getElementById(elementId);
            if (message) {
                element.innerHTML = message;
            }
            element.style.display = 'block';
            
            if (type === 'success') {
                setTimeout(() => {
                    element.style.display = 'none';
                }, 3000);
            } else {
                setTimeout(() => {
                    element.style.display = 'none';
                }, 5000);
            }
        }
        
        function hideMessages() {
            document.querySelectorAll('.success-message, .error-message').forEach(msg => {
                msg.style.display = 'none';
            });
        }
        
        // Form validation
        function validatePasswords() {
            const password = document.querySelector('input[name="password"]').value;
            const confirmation = document.querySelector('input[name="password_confirmation"]').value;
            
            if (password.length < 8) {
                showMessage('error', 'error-message', '❌ Le mot de passe doit contenir au moins 8 caractères.');
                return false;
            }
            
            if (password !== confirmation) {
                showMessage('error', 'error-message', '❌ Les mots de passe ne correspondent pas.');
                return false;
            }
            
            return true;
        }
        
        // Form submission
        document.getElementById('reset-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const code = document.getElementById('recovery_code').value;
            
            if (code.length !== 6) {
                showMessage('error', 'error-message', '❌ Le code de récupération doit contenir 6 chiffres.');
                return;
            }
            
            if (!validatePasswords()) {
                return;
            }
            
            // Disable button and show loading
            const submitBtn = document.getElementById('reset-btn');
            submitBtn.textContent = 'Mise à jour en cours...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual form submission)
            setTimeout(() => {
                // Here you would normally submit the form to your Laravel backend
                // For demonstration, we'll show success message
                showMessage('success', 'success-message');
                
                setTimeout(() => {
                    // Redirect to login page
                    window.location.href = "{{ route('login') }}";
                }, 2000);
                
                // Reset button state
                submitBtn.textContent = 'Mettre à jour le mot de passe';
                submitBtn.disabled = false;
            }, 2000);
            
            // Uncomment this line for actual form submission:
            // this.submit();
        });
        
        // Auto-focus on first code input
        document.addEventListener('DOMContentLoaded', function() {
            if (codeInputs[0]) {
                codeInputs[0].focus();
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.location.href = "{{ route('login') }}";
            }
        });
        
        // Real-time password confirmation validation
        document.querySelector('input[name="password_confirmation"]').addEventListener('input', function() {
            const password = document.querySelector('input[name="password"]').value;
            const confirmation = this.value;
            
            if (confirmation && password !== confirmation) {
                this.style.borderColor = 'var(--error-color)';
            } else {
                this.style.borderColor = 'var(--border-color)';
            }
        });
    </script>
</body>
</html>