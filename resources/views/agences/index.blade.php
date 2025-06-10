<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bank Of Africa') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
/* Variables CSS pour Eurafric Information - Style Moderne */
:root {
    /* Couleurs principales Eurafric */
    --primary-color: #1e3a8a;
    --primary-dark: #1e40af;
    --primary-light: #3b82f6;
    --secondary-color: #f59e0b;
    --secondary-light: #fbbf24;
    
    /* Couleurs de fond */
    --bg-primary: #f8fafc;
    --bg-accent: #f1f5f9;
    --bg-card: #ffffff;
    --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
     --bg-light-secondary: #ffffff;
    
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
    --radius-2xl: 1.5rem;
    
    /* Transitions */
    --transition-fast: 0.15s ease-in-out;
    --transition-base: 0.2s ease-in-out;
    --transition-slow: 0.3s ease-in-out;
    
    /* Espacements */
    --spacing-xs: 0.25rem;
    --spacing-sm: 0.5rem;
    --spacing-md: 1rem;
    --spacing-lg: 1.5rem;
    --spacing-xl: 2rem;
    --spacing-2xl: 3rem;
}

/* Reset et base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: var(--bg-gradient);
    color: var(--text-primary);
    line-height: 1.6;
    min-height: 100vh;
    display: flex;
    transition: all var(--transition-base);
}

/* Sidebar modernisée avec style Eurafric */
.sidebar {
    width: 280px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-right: 1px solid var(--border-color);
    padding: var(--spacing-lg);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-xl);
    z-index: 100;
    height: 100vh;
    position: fixed;
    overflow-y: auto;
}

.sidebar.closed {
    transform: translateX(-100%);
}

/* Brand section avec animation */
.sidebar-brand {
    margin-bottom: var(--spacing-xl);
    padding-bottom: var(--spacing-lg);
    border-bottom: 2px solid var(--border-light);
    text-align: center;
    animation: fadeInDown 0.6s ease-out;
}

.sidebar-brand h2 {
    font-size: 1.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: var(--spacing-md) 0;
    letter-spacing: -0.025em;
    text-transform: uppercase;
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

.brand-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.brand-icon:hover::before {
    left: 100%;
}

.brand-icon:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: var(--shadow-xl);
}

.brand-icon i {
    font-size: 2rem;
    color: var(--text-white);
    z-index: 1;
}

/* Menu de navigation avec animations fluides */
.sidebar-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu li {
    margin-bottom: var(--spacing-sm);
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.sidebar-menu li:nth-child(1) { animation-delay: 0.1s; }
.sidebar-menu li:nth-child(2) { animation-delay: 0.2s; }
.sidebar-menu li:nth-child(3) { animation-delay: 0.3s; }
.sidebar-menu li:nth-child(4) { animation-delay: 0.4s; }
.sidebar-menu li:nth-child(5) { animation-delay: 0.5s; }

.sidebar-menu a {
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    padding: var(--spacing-md) var(--spacing-md);
    border-radius: var(--radius-xl);
    transition: all var(--transition-base);
    position: relative;
    overflow: hidden;
    border: 1px solid transparent;
}

.sidebar-menu a::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    transition: width var(--transition-slow);
    z-index: -1;
    border-radius: var(--radius-xl);
}

.sidebar-menu a:hover::before,
.sidebar-menu .active a::before {
    width: 100%;
}

.sidebar-menu a i {
    margin-right: var(--spacing-md);
    font-size: 1.125rem;
    min-width: 24px;
    color: var(--primary-color);
    transition: all var(--transition-base);
}

.sidebar-menu a:hover,
.sidebar-menu .active a {
    color: var(--text-white);
    transform: translateX(8px) scale(1.02);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-light);
}

.sidebar-menu a:hover i,
.sidebar-menu .active a i {
    color: var(--text-white);
    transform: scale(1.2) rotate(5deg);
}

/* Footer de la sidebar avec style moderne */
.sidebar-footer {
    margin-top: auto;
    margin-bottom: var(--spacing-md);
    animation: fadeInUp 0.6s ease-out 0.8s both;
}

.footer-button {
    background: linear-gradient(135deg, var(--danger-color), #dc2626);
    color: var(--text-white);
    border: none;
    padding: var(--spacing-md) var(--spacing-md);
    cursor: pointer;
    border-radius: var(--radius-xl);
    font-size: 0.9rem;
    font-weight: 600;
    width: 100%;
    transition: all var(--transition-base);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-md);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.footer-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.footer-button:hover::before {
    left: 100%;
}

.footer-button i {
    margin-right: var(--spacing-sm);
    font-size: 1rem;
}

.footer-button:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-xl);
}

/* Bouton toggle avec design moderne */
.toggle-btn {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
    padding: var(--spacing-md) var(--spacing-lg);
    cursor: pointer;
    border-radius: var(--radius-xl);
    font-size: 0.9rem;
    font-weight: 600;
    position: fixed;
    top: var(--spacing-lg);
    left: var(--spacing-lg);
    z-index: 1000;
    display: flex;
    align-items: center;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-lg);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.toggle-btn i {
    margin-right: var(--spacing-sm);
    font-size: 1rem;
}

.toggle-btn:hover {
    background: var(--primary-color);
    color: var(--text-white);
    transform: scale(1.05) rotate(2deg);
    box-shadow: var(--shadow-xl);
}

/* Contenu principal avec design premium */
.main-content {
    flex: 1;
    padding: var(--spacing-xl);
    margin-left: 280px;
    transition: margin-left var(--transition-base);
    max-width: 100%;
    background: transparent;
}

.main-content.expanded {
    margin-left: 0;
}

/* En-tête de page avec style Eurafric */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-xl);
    padding: var(--spacing-xl);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-xl);
    border: 1px solid var(--border-color);
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    letter-spacing: -0.025em;
    text-transform: uppercase;
}

.page-actions {
    display: flex;
    gap: var(--spacing-md);
}

/* Boutons d'action modernisés */
.action-button {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--text-white);
    border: none;
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--radius-xl);
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-md);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.action-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.action-button:hover::before {
    left: 100%;
}

.action-button i {
    margin-right: var(--spacing-sm);
}

.action-button:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-xl);
    background: linear-gradient(135deg, var(--primary-light), var(--secondary-color));
}

/* Styles de cartes avec effet glassmorphism */
.card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-xl);
    margin-bottom: var(--spacing-xl);
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(30, 58, 138, 0.1);
    position: relative;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-xl), 0 25px 50px rgba(30, 58, 138, 0.15);
}

.card-header {
    padding: var(--spacing-xl);
    background: linear-gradient(135deg, rgba(30, 58, 138, 0.05), rgba(59, 130, 246, 0.02));
    border-bottom: 1px solid var(--border-light);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    margin: 0;
    font-size: 1.25rem;
    color: var(--primary-color);
    font-weight: 700;
    display: flex;
    align-items: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-header-icon {
    margin-right: var(--spacing-md);
    color: var(--primary-color);
    font-size: 1.5rem;
}

.card-body {
    padding: var(--spacing-xl);
}

/* Styles de formulaire modernisés */
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-lg);
}

.form-group {
    margin-bottom: var(--spacing-lg);
}

.form-group label {
    display: block;
    margin-bottom: var(--spacing-sm);
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--primary-color);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-control, .form-select {
    width: 100%;
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--radius-xl);
    border: 2px solid var(--border-color);
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    color: var(--text-primary);
    font-size: 0.95rem;
    font-weight: 500;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-sm);
}

.form-control:focus,
.form-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(30, 58, 138, 0.1), var(--shadow-md);
    transform: translateY(-2px);
}

/* Boutons avec styles améliorés */
.btn {
    padding: var(--spacing-md) var(--spacing-xl);
    border-radius: var(--radius-xl);
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-base);
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: var(--shadow-md);
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

.btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-xl);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--text-white);
}

.btn-secondary {
    background: linear-gradient(135deg, var(--secondary-color), var(--secondary-light));
    color: var(--text-white);
}

.btn-success {
    background: linear-gradient(135deg, var(--success-color), #34d399);
    color: var(--text-white);
}

.btn-danger {
    background: linear-gradient(135deg, var(--danger-color), #f87171);
    color: var(--text-white);
}

.btn-icon {
    margin-right: var(--spacing-sm);
    font-size: 1rem;
}

.btn-sm {
    padding: var(--spacing-sm) var(--spacing-md);
    font-size: 0.8rem;
}

.btn-group {
    display: flex;
    gap: var(--spacing-sm);
}

/* Styles de tableau premium */
.table-responsive {
    overflow-x: auto;
    margin-top: var(--spacing-lg);
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: v8px;
    overflow: hidden;
     background: linear-gradient(135deg, var(--bg-dark-secondary), rgba(255, 255, 255, 0.02));
}
body.light .table {
    background: linear-gradient(135deg, var(--bg-light-secondary), rgba(10, 59, 102, 0.02));
}
.table th, .table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid rgba(219, 180, 142, 0.2);
    transition: all var(--transition-speed);
}
body.light .table th,
body.light .table td {
    border-bottom: 1px solid rgba(10, 59, 102, 0.1);
}
.table th {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--text-white);
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 0.85rem;
    text-transform: uppercase;
    box-shadow: inset 0 -2px 4px rgba(0, 0, 0, 0.1);
}

.table tbody tr {
    transition: all var(--transition-base);
    border-left: 4px solid transparent;
}

.table tbody tr:hover {
    background: rgba(30, 58, 138, 0.05);
    border-left-color: var(--primary-color);
    transform: translateX(8px) scale(1.005);
}

.table td a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all var(--transition-base);
    position: relative;
}

.table td a:hover {
    color: var(--primary-light);
    text-shadow: 0 1px 3px rgba(30, 58, 138, 0.3);
}

/* Styles de modal modernisés */
.modal {
    display: none;
    position: fixed;
    z-index: 1050;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s;
}

.modal-content {
    background: linear-gradient(135deg, var(#16213e), rgba(219, 180, 142, 0.1));
    margin: 50px auto;
    padding: 0;
    width: 80%;
    max-width: 700px;
    border-radius: 8px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    border: 1px solid #dbb48e;
    animation: slideIn 0.3s;
}
body.light .modal-content {
    background: linear-gradient(135deg, #ffffff, rgba(10, 59, 102, 0.05));
    border: 1px solid #0a3b66;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}
.modal-header {
    padding: 20px;
    background: linear-gradient(135deg, #062240, #dbb48e);
    border-bottom: 1px solid #2c7a57;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 8px 8px 0 0;
}

.modal-header h3,
.modal-header h5 {
    margin: 0;
    color: var(--text-white);
    font-weight: 700;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.close-modal,
.btn-close {
    background: transparent;
    border: none;
    font-size: 1.5rem;
    color: var(--text-white);
    cursor: pointer;
    transition: all var(--transition-base);
    padding: var(--spacing-sm);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.close-modal:hover,
.btn-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(90deg) scale(1.1);
}

.modal-body {
    padding: var(--spacing-xl);
    max-height: 70vh;
    overflow-y: auto;
}

.modal-footer {
    padding: var(--spacing-lg) var(--spacing-xl);
    border-top: 1px solid var(--border-light);
    display: flex;
    justify-content: flex-end;
    gap: var(--spacing-md);
    background: rgba(30, 58, 138, 0.02);
}

/* Animations modernes */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { 
        transform: translateY(-50px) scale(0.9); 
        opacity: 0; 
    }
    to { 
        transform: translateY(0) scale(1); 
        opacity: 1; 
    }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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

/* État vide avec style premium */
.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: var(--spacing-2xl);
    text-align: center;
    background: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-2xl);
    border: 2px dashed var(--primary-color);
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: var(--spacing-lg);
    color: var(--primary-color);
    opacity: 0.7;
    animation: pulse 2s infinite;
}

.empty-state h4 {
    margin-bottom: var(--spacing-md);
    font-size: 1.5rem;
    color: var(--primary-color);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.empty-state p {
    margin-bottom: var(--spacing-lg);
    max-width: 400px;
    color: var(--text-secondary);
    font-size: 1rem;
    line-height: 1.6;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.1); opacity: 1; }
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

/* Design responsive amélioré */
@media (max-width: 992px) {
    .sidebar {
        width: 80px;
        padding: var(--spacing-lg) var(--spacing-sm);
    }
    
    .sidebar-brand h2,
    .sidebar-menu a span,
    .footer-button span {
        display: none;
    }
    
    .sidebar-menu a {
        justify-content: center;
        padding: var(--spacing-md);
    }
    
    .sidebar-menu a i {
        margin-right: 0;
        font-size: 1.25rem;
    }
    
    .footer-button i {
        margin-right: 0;
    }
    
    .brand-icon {
        width: 50px;
        height: 50px;
    }
    
    .main-content {
        margin-left: 80px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .page-header {
        flex-direction: column;
        gap: var(--spacing-md);
        text-align: center;
    }
    
    .page-actions {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: var(--spacing-md);
        margin-left: 0;
    }
    
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .toggle-btn {
        top: var(--spacing-md);
        left: var(--spacing-md);
    }
    
    .modal-content {
        width: 95%;
        margin: 10px auto;
    }
    
    .table-responsive {
        font-size: 0.85rem;
    }
    
    .table th,
    .table td {
        padding: var(--spacing-md) var(--spacing-sm);
    }
    
    .btn {
        padding: var(--spacing-sm) var(--spacing-md);
        font-size: 0.85rem;
    }
    
    .action-button {
        padding: var(--spacing-sm) var(--spacing-md);
        font-size: 0.8rem;
    }
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
                </li><br>
            </ul>
        </div>
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
    <div class="main-content" id="main-content">
        <div class="page-header">
            <h1 class="page-title">Agences Bank Of Africa</h1>
            <div class="page-actions">
                <button class="action-button" onclick="toggleFilterCard()">
                    <i class="fas fa-filter"></i> Filtres
                </button>
               <button class="action-button" data-bs-toggle="modal" data-bs-target="#ajouterAgenceModal">
                     <i class="fas fa-plus"></i> Nouvelle Agence
               </button>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade light-theme" id="ajouterAgenceModal" tabindex="-1" data-bs-backdrop="false" data-bs-keyboard="true"
    aria-labelledby="verificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{ route('agences.store') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterAgenceModalLabel">Ajouter une Agence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label for="cdf" class="form-label">ID CDF</label>
            <input type="text" name="cdf" class="form-control" >
          </div>
          <div class="col-md-6">
            <label for="nom_agence" class="form-label">Nom Agence</label>
            <input type="text" name="nom_agence" class="form-control" >
          </div>
          <div class="col-md-6">
            <label for="type_agence" class="form-label">Type Agence</label>
            <select name="type_agence" class="form-select">
              <option value="cube">Cube</option>
              <option value="gateway">Gateway</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="lignes" class="form-label">Lignes</label>
            <input type="number" name="lignes" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="utilisateurs" class="form-label">Nombre d'utilisateurs</label>
            <input type="number" name="utilisateurs" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="noms_utilisateurs" class="form-label">Nom(s) utilisateur(s)</label>
            <input type="text" name="noms_utilisateurs" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" class="form-select">
              <option value="CC">CC</option>
              <option value="DA">DA</option>
              <option value="CAC">CAC</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="plan_de_num" class="form-label">Plan de num</label>
            <input type="text" name="plan_de_num" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-select">
              <option value="interne">Interne</option>
              <option value="externe">Externe</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="groupe" class="form-label">Groupe</label>
            <input type="text" name="groupe" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="region" class="form-label">Région</label>
            <input type="text" name="region" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="code_verification" class="form-label">Code de vérification</label>
            <input type="text" name="code_verification" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>
        <!-- Filter Card -->
        <div class="card" id="filter-card">
            <div class="card-header">
                <h3>
                    <i class="fas fa-search card-header-icon"></i>
                    Rechercher des Agences
                </h3>
            </div>
            <div class="card-body">
                <form id="filter-form" method="GET" action="{{ route('agences.index') }}">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <select name="ville" id="ville" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Toutes les villes --</option>
                                @foreach($liste_villes as $ville)
                                    <option value="{{ $ville }}" {{ request('ville') == $ville ? 'selected' : '' }}>{{ $ville }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agence">Nom d'Agence</label>
                            <select name="agence" id="agence" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Toutes les agences --</option>
                                @foreach($agences as $agenceOption)
                                    <option value="{{ $agenceOption->nom_agence }}" {{ request('agence') == $agenceOption->nom_agence ? 'selected' : '' }}>{{ $agenceOption->nom_agence }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="customCDF">Code CDF</label>
                            <input type="number" name="customCDF" id="customCDF" class="form-control" value="{{ request('customCDF') }}" placeholder="Entrez un code CDF">
                        </div>
                        <div class="form-group">
                            <label for="groupe">Groupe</label>
                            <input type="text" name="groupe" id="groupe" class="form-control" value="{{ request('groupe') }}" placeholder="Entrez un groupe">
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-search btn-icon"></i> Rechercher
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Results Card -->
        <div class="card" id="results-card" style="display: none;">
            <div class="card-header">
                <h3>
                    <i class="fas fa-list card-header-icon"></i>
                    Résultats de la Recherche
                </h3>
                <span class="badge badge-secondary">{{ count($agences) }} agence(s) trouvée(s)</span>
            </div>
            <div class="card-body">
                @if(count($agences) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag fa-sm"></i> CDF</th>
                                <th><i class="fas fa-store fa-sm"></i> Nom Agence</th>
                                <th><i class="fas fa-tag fa-sm"></i> Type</th>
                                <th><i class="fas fa-phone fa-sm"></i> Lignes</th>
                                <th><i class="fas fa-users fa-sm"></i> Utilisateurs</th>
                                <th><i class="fas fa-sitemap fa-sm"></i> Plan Num.</th>
                                <th><i class="fas fa-sitemap fa-sm"></i>Type du plan </th>
                                <th><i class="fas fa-sitemap fa-sm"></i>Ville</th>
                                <th><i class="fas fa-layer-group fa-sm"></i> Groupe</th>
                                <th><i class="fas fa-map-marker-alt fa-sm"></i> Région</th>
                                <th><i class="fas fa-cogs fa-sm"></i> Actions</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($agences as $agence)
                                <tr>
                                    <td>{{ $agence->cdf }}</td>
                                    <td>
                        <!-- Ce lien va ouvrir/cacher le détail -->
                        <a href="#" class="toggle-details" data-id="{{ $agence->id }}">
                        {{ $agence->nom_agence }}
                        </a>
                            </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $agence->type_agence }}</span>
                                    </td>
                                    <td>{{ $agence->lignes }}</td>
                                    <td>{{ $agence->utilisateurs }}</td>
                                    <td>{{ $agence->plan_de_num }}</td>
                                    <td>{{ $agence->type_plan }}</td>
                                    <td>{{ $agence->groupe }}</td>
                                    <td>{{ $agence->ville }}</td>
                                    <td>{{ $agence->region }}</td>
                                    <td>
                                        <!-- Bouton d'édition à modifier -->
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm edit-agence-btn" data-agence-id="{{ $agence->id }}">
                                    <i class="fas fa-edit"></i>
                                    </button>
                                    </div>
                                            <button type="button" onclick="confirmDelete({{ $agence->id }})" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Détails cachés (affichés au clic) -->
            <tr class="details-row" id="details-{{ $agence->id }}" style="display: none;">
                <td colspan="8">
                    <!-- Informations Agence -->
                    <p><strong>Code (CDF) :</strong> {{ $agence->cdf }}</p>
                    <p><strong>Nom Agence :</strong> {{ $agence->nom_agence }}</p>
                    <p><strong>Type Agence :</strong> {{ $agence->type_agence }}</p>
                    <p><strong>Groupe :</strong> {{ $agence->groupe }}</p>
                    <p><strong>Région :</strong> {{ $agence->region }}</p>
                    <p><strong>Ville :</strong> {{ $agence->ville }}</p>
                    <p><strong>Nombre total d'utilisateurs :</strong> {{ $agence->utilisateurs }}</p>
                    <p><strong>Plan de Numérotation :</strong> {{ $agence->plan_de_num }}</p>
                </td>
            </tr>
            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                @endif
            </div>
        </div>
    </div>
    <!-- Modal Vérification -->
    <div class="modal fade light-theme" id="verificationModal" tabindex="-1"
     data-bs-backdrop="false" data-bs-keyboard="true"
     aria-labelledby="verificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <form id="verificationForm">
        <div class="modal-header">
          <h5 class="modal-title" id="verificationModalLabel">Code de vérification requis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="verification-agence-id" value="">
          <div class="mb-3">
            <label for="verification-code" class="form-label">Entrez le code de vérification :</label>
            <input type="text" id="verification-code" class="form-control" required>
          </div>
          <div id="verification-error" class="text-danger" style="display:none;">Code incorrect, veuillez réessayer.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <!-- Modal Edition -->
    <div class="modal fade light-theme" id="editAgenceModal" tabindex="-1"
     data-bs-backdrop="false" data-bs-keyboard="true"
     aria-labelledby="editAgenceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" id="editAgenceForm">
        @csrf
        @method('PATCH')
        <div class="modal-header">
          <h5 class="modal-title" id="editAgenceModalLabel">Modifier l'Agence</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body row g-3">
          <!-- Champs similaires à modal ajout, avec IDs pour JS -->
          <div class="col-md-6">
            <label for="edit-cdf" class="form-label">ID CDF</label>
            <input type="text" name="cdf" id="edit-cdf" class="form-control" readonly>
          </div>
          <div class="col-md-6">
            <label for="edit-nom_agence" class="form-label">Nom Agence</label>
            <input type="text" name="nom_agence" id="edit-nom_agence" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-type_agence" class="form-label">Type Agence</label>
            <select name="type_agence" id="edit-type_agence" class="form-select">
              <option value="cube">Cube</option>
              <option value="gateway">Gateway</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="edit-lignes" class="form-label">Lignes</label>
            <input type="number" name="lignes" id="edit-lignes" class="form-control" >
          </div>
          <div class="col-md-6">
            <label for="edit-utilisateurs" class="form-label">Nombre d'utilisateurs</label>
            <input type="number" name="utilisateurs" id="edit-utilisateurs" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-noms_utilisateurs" class="form-label">Nom(s) utilisateur(s)</label>
            <input type="text" name="noms_utilisateurs" id="edit-noms_utilisateurs" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-role" class="form-label">Rôle</label>
            <select name="role" id="edit-role" class="form-select">
              <option value="CC">CC</option>
              <option value="DA">DA</option>
              <option value="CAC">CAC</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="edit-plan_de_num" class="form-label">Plan de num</label>
            <input type="text" name="plan_de_num" id="edit-plan_de_num" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-type" class="form-label">Type</label>
            <select name="type" id="edit-type" class="form-select" >
              <option value="interne">Interne</option>
              <option value="externe">Externe</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="edit-groupe" class="form-label">Groupe</label>
            <input type="text" name="groupe" id="edit-groupe" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="edit-ville" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="edit-region" class="form-label">Région</label>
            <input type="text" name="region" id="edit-region" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Bootstrap JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
// Fonctions de toggle
function toggleFilterCard() {
    const card = document.getElementById('filter-card');
    card.style.display = (card.style.display === 'none' || card.style.display === '') ? 'block' : 'none';
}
function toggleAddModal() {
    const modal = document.getElementById('add-modal');
    modal.style.display = (modal.style.display === 'none' || modal.style.display === '') ? 'block' : 'none';
}
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('closed');
}
// Fonction pour afficher les résultats
function displayResults() {
    const resultsCard = document.getElementById('results-card');
    if (resultsCard) {
        resultsCard.style.display = 'block';
    } else {
        console.error("L'élément 'results-card' n'a pas été trouvé.");
    }
}
// Fonction pour confirmer la suppression
function confirmDelete(agenceId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette agence ?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/agences/${agenceId}`; 
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        document.body.appendChild(form);
        form.submit();
    }
}
function toggleTheme() {
    document.body.classList.toggle('light');
}
// Variables globales pour stocker les instances des modals
let verificationModalInstance = null;
let editModalInstance = null;
// Fonction pour ouvrir le modal d'édition avec les données
function openEditModal(agenceId, agenceData) {
    try {
        // Remplir les champs de la modal avec les données
        document.getElementById('edit-cdf').value = agenceData.cdf || '';
        document.getElementById('edit-nom_agence').value = agenceData.nom_agence || '';
        document.getElementById('edit-type_agence').value = agenceData.type_agence || 'cube';
        document.getElementById('edit-lignes').value = agenceData.lignes || '';
        document.getElementById('edit-utilisateurs').value = agenceData.utilisateurs || '';
        document.getElementById('edit-noms_utilisateurs').value = agenceData.noms_utilisateurs || '';
        document.getElementById('edit-role').value = agenceData.role || 'CC';
        document.getElementById('edit-plan_de_num').value = agenceData.plan_de_num || '';
        document.getElementById('edit-type').value = agenceData.type || 'interne';
        document.getElementById('edit-groupe').value = agenceData.groupe || '';
        document.getElementById('edit-ville').value = agenceData.ville || '';
        document.getElementById('edit-region').value = agenceData.region || '';
        // Configurer le formulaire pour envoyer les données à la bonne URL
        document.getElementById('editAgenceForm').action = `/agences/${agenceId}`;
        // Ouvrir la modal d'édition
        const editModalElement = document.getElementById('editAgenceModal');
        if (editModalElement) {
            editModalInstance = new bootstrap.Modal(editModalElement, {
                backdrop: false,
                keyboard: true
            });
            editModalInstance.show();
        }
    } catch (error) {
        console.error('Erreur lors de l\'ouverture du modal d\'édition:', error);
        alert('Erreur lors de l\'ouverture du formulaire d\'édition');
    }
}
// Tout le code qui interagit avec le DOM doit attendre que le document soit chargé
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing...');
    // Active link highlight
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-item a');
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.parentElement.classList.add('active');
        }
    });
    // Gestion des détails toggle
    const links = document.querySelectorAll('.toggle-details');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const agenceId = this.getAttribute('data-id');
            const detailsRow = document.getElementById('details-' + agenceId);
            if (detailsRow.style.display === 'none') {
                detailsRow.style.display = '';
            } else {
                detailsRow.style.display = 'none';
            }
        });
    });
    // Afficher la modal d'ajout si présente
    const ajouterAgenceModal = document.getElementById('ajouterAgenceModal');
    if (ajouterAgenceModal) {
        var myModal = new bootstrap.Modal(ajouterAgenceModal, {
            backdrop: false
        });
    }
    // Écouteur d'événement pour le formulaire de filtrage
    const filterForm = document.getElementById('filter-form');
    if (filterForm) {
        filterForm.addEventListener('submit', function(event) {
            event.preventDefault();
            displayResults();
        });
    }
    // Écouteur d'événement pour le bouton de recherche
    const searchButtons = document.querySelectorAll('.form-submit button[type="submit"]');
    searchButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            if (this.closest('form')) {
                event.preventDefault();
            }
            displayResults();
        });
    });
    // Gestion des boutons d'édition
    const editButtons = document.querySelectorAll('.edit-agence-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const agenceId = this.getAttribute('data-agence-id');
            console.log('Bouton d\'édition cliqué pour agence:', agenceId);
            // Stocker l'ID de l'agence dans le modal de vérification
            document.getElementById('verification-agence-id').value = agenceId;
            // Réinitialiser les erreurs
            document.getElementById('verification-error').style.display = 'none';
            document.getElementById('verification-code').value = '';
            // Afficher le modal de vérification
            const verificationModalElement = document.getElementById('verificationModal');
            if (verificationModalElement) {
                verificationModalInstance = new bootstrap.Modal(verificationModalElement, {
                    backdrop: false,
                    keyboard: true
                });
                verificationModalInstance.show();
            }
        });
    });
    // Gestion du formulaire de vérification
    const verificationForm = document.getElementById('verificationForm');
    if (verificationForm) {
        verificationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Formulaire de vérification soumis');
            const agenceId = document.getElementById('verification-agence-id').value;
            const codeEntre = document.getElementById('verification-code').value.trim();
            console.log('Agence ID:', agenceId, 'Code entré:', codeEntre);
            if (!agenceId) {
                console.error('ID d\'agence manquant');
                alert('Erreur: ID d\'agence manquant');
                return;
            }
            if (!codeEntre) {
                document.getElementById('verification-error').textContent = 'Veuillez entrer un code de vérification';
                document.getElementById('verification-error').style.display = 'block';
                return;
            }
            // Vérifier qu'il y a un meta tag CSRF
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error("La balise meta CSRF est manquante. Ajoutez <meta name='csrf-token' content='{{ csrf_token() }}'> dans la section head de votre HTML.");
                alert('Erreur: Token CSRF manquant');
                return;
            }
            // Désactiver le bouton de validation pendant la requête
            const submitButton = verificationForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Vérification...';
            // Vérification avec appel API
            fetch(`/agences/${agenceId}/verifyCode`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ code: codeEntre })
            })
            .then(response => {
                console.log('Réponse de vérification reçue:', response.status);
                if (!response.ok) {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            throw new Error(data.message || 'Code de vérification incorrect');
                        });
                    }
                    throw new Error(`Erreur serveur: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Données de vérification:', data);
                if (data.success) {
                    console.log('Code vérifié avec succès, fermeture du modal de vérification');
                    // Fermer le modal de vérification
                    if (verificationModalInstance) {
                        verificationModalInstance.hide();
                    }
                    // Réinitialiser le formulaire
                    document.getElementById('verification-code').value = '';
                    document.getElementById('verification-error').style.display = 'none';
                    // Attendre que le modal se ferme complètement avant d'ouvrir le suivant
                    setTimeout(() => {
                        // Charger les données de l'agence
                        fetch(`/agences/${agenceId}/getData`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                            }
                        })
                        .then(response => {
                            console.log('Réponse des données agence:', response.status);
                            if (!response.ok) {
                                throw new Error(`Erreur lors du chargement des données: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(agenceData => {
                            console.log('Données agence reçues:', agenceData);
                            openEditModal(agenceId, agenceData);
                        })
                        .catch(error => {
                            console.error('Erreur lors du chargement des données:', error);
                            alert('Erreur lors du chargement des données de l\'agence');
                        });
                    }, 300); // Délai pour laisser le temps au modal de se fermer
                } else {
                    console.log('Code incorrect');
                    document.getElementById('verification-error').textContent = data.message || 'Code incorrect, veuillez réessayer';
                    document.getElementById('verification-error').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Erreur de vérification:', error);
                document.getElementById('verification-error').textContent = error.message || 'Erreur lors de la vérification';
                document.getElementById('verification-error').style.display = 'block';
            })
            .finally(() => {
                // Réactiver le bouton
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        });
    }
    // Gérer la fermeture des modals
    document.getElementById('verificationModal').addEventListener('hidden.bs.modal', function () {
        console.log('Modal de vérification fermé');
        verificationModalInstance = null;
    });
    document.getElementById('editAgenceModal').addEventListener('hidden.bs.modal', function () {
        console.log('Modal d\'édition fermé');
        editModalInstance = null;
    });
    console.log('Initialisation terminée');
});
</script>
</body>
</html>