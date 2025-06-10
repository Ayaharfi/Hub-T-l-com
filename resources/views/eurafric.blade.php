<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eurafric Information - Solutions IT Innovantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* RESET CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header-top {
            background-color: #f8f9fa;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .header-top-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .contact-info {
            display: flex;
            gap: 30px;
            color: #666;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .main-header {
            padding: 15px 0;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

       .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
  .logo-img {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
        }

 

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
            align-items: center;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 0;
            position: relative;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #1e3a8a;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #1e3a8a;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        .login-btn {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 25px;
            transition: transform 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
        }

        /* Hero Section */
        .hero {
            margin-top: 120px;
            height: 80vh;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,0 1000,300 1000,1000 0,1000"/></svg>');
            background-size: cover;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text {
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }


        .hero p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-stats {
            display: flex;
            gap: 130px;
            margin-top: 0px;
            justify-content: flex-start;
        }

        .stat {
            text-align: center;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px 20px;
            min-width: 120px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
 .stat:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-5px);
        }
        .stat-number {
            font-size: 42px;
            font-weight: 800;
            display: block;
            color: #ffffff;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .stat-label {
            font-size: 13px;
            opacity: 0.9;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.3;
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-graphic {
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-graphic::before {
            content: '💻';
            font-size: 120px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
            margin-left: 20px;
        }

        .btn-secondary:hover {
            background: white;
            color: #1e3a8a;
        }

        /* Services Section */
        .services {
            padding: 80px 0;
            background-color: #f8fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .service-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 50%;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            position: relative;
        }

        .service-card h3 {
            font-size: 22px;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #666;
            line-height: 1.6;
        }

        /* About Section */
        .about {
            padding: 80px 0;
            background: white;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 36px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .about-text p {
            color: #666;
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.7;
        }

        .about-features {
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .feature-check {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .about-visual {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .about-card {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .about-card h4 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fbbf24;
        }

        .about-card p {
            font-size: 14px;
            opacity: 0.9;
        }

        /* News Section */
        .news {
            padding: 80px 0;
            background: #f8fafc;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            height: 200px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
        }

        .news-content {
            padding: 25px;
        }

        .news-date {
            color: #fbbf24;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .news-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .news-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta {
            padding: 80px 0;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        footer {
            background-color: #1a1a1a;
            color: white;
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #fbbf24;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #fbbf24;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 20px;
            text-align: center;
            color: #999;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .about-content {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            nav ul {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .header-top {
                display: none;
            }
            
            .hero {
                margin-top: 80px;
            }
            
            .hero-stats {
                justify-content: center;
            }
            
            .services-grid,
            .news-grid {
                grid-template-columns: 1fr;
            }
        }
        .social-icons {
    display: flex;
    gap: 10px;
    align-items: center;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-decoration: none;
    color: white;
    font-size: 18px;
    transition: transform 0.3s ease;
}

.social-icon:hover {
    transform: scale(1.1);
}

.social-icon.facebook {
    background-color: #1877f2;
}

.social-icon.linkedin {
    background-color: #0a66c2;
}
    </style>
</head>
<body>
    <!-- Header -->
    <header>

        <div class="main-header">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-img">EAI</div>
                </div>

                <nav>
                    <ul>
                        <li><a href="https://www.eurafric-information.com/fr/entreprise">L'entreprise</a></li>
                        <li><a href="https://www.eurafric-information.com/fr/projets-innovants">Projets Innovants</a></li>
                        <li><a href="https://www.eurafric-information.com/fr/metier">Pôles Métiers</a></li>
                        <li><a href="https://www.eurafric-information.com/fr/politique-rh">Politique RH</a></li>
                        <li><a href="https://www.eurafric-information.com/fr/recrutement">Recrutement</a></li>
                        <li><a href="https://www.eurafric-information.com/fr/activities-and-events">Activités et événements</a></li>
                     <li class="social-icons">
    <a href="https://www.facebook.com/people/Eurafric-Information-Officiel/100057545915245/" target="_blank" class="social-icon facebook">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://www.linkedin.com/company/eurafric-information/posts/?feedView=all" target="_blank" class="social-icon linkedin">
        <i class="fab fa-linkedin-in"></i>
    </a>
</li>

                        <li><a href="{{ route('login') }}" class="login-btn">Espace Client</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="accueil" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Systèmes d'Information Innovants & Performants</h1>
                <p>Eurafric Information accompagne ses partenaires avec des solutions technologiques avancées dans la finance, la banque, l'assurance et les crédits à la consommation.</p>
                <div>
                    <a href="#services" class="btn">Nos Services</a>
                    <a href="#entreprise" class="btn btn-secondary">En Savoir Plus</a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">350+</span>
                        <span class="stat-label">Ingénieurs Experts</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">300+</span>
                        <span class="stat-label">Projets par an</span>
                    </div>
                <div class="stat">
                    <span class="stat-number">18</span>
                    <span class="stat-label">Partenaires gérés</span>
                </div>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-graphic"></div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nos Domaines d'Expertise</h2>
                <p class="section-subtitle">Des solutions technologiques complètes pour accompagner votre transformation digitale</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">💻</div>
                    <h3>Développement d'Applications</h3>
                    <p>Conception et développement d'applications métier sur mesure, adaptées aux besoins spécifiques de votre secteur d'activité.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🛡️</div>
                    <h3>Sécurité & Certification</h3>
                    <p>Solutions de sécurité avancées et services de certification électronique agréés par la DGSSI.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏗️</div>
                    <h3>Infrastructure & Cloud</h3>
                    <p>Datacenter certifié TierIII et solutions cloud haute performance pour garantir la continuité de vos services.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3>Business Intelligence</h3>
                    <p>Solutions d'analyse et de reporting pour optimiser vos processus décisionnels.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔄</div>
                    <h3>Intégration Système</h3>
                    <p>Intégration et interconnexion de vos systèmes d'information pour une efficacité maximale.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📱</div>
                    <h3>Solutions Digitales</h3>
                    <p>Transformation numérique complète incluant la signature électronique et les services dématérialisés.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="entreprise" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>L'entreprise Eurafric Information</h2>
                    <p>Créée en octobre 2008, Eurafric Information est le fruit d'une joint-venture entre BANK OF AFRICA BMCE Group, RMA et le Crédit Mutuel Alliance Fédérale.</p>
                    <p>Aujourd'hui, c'est une équipe d'environ 350 ingénieurs issus des meilleures écoles marocaines et internationales qui relève au quotidien des challenges technologiques dans la finance, la banque, l'assurance et les crédits à la consommation.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <div class="feature-check">✓</div>
                            <span>Top Employer Maroc 2024 - 5ème année consécutive</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-check">✓</div>
                            <span>Certification TierIII Design & Facility</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-check">✓</div>
                            <span>Certification ISO22301 pour la continuité d'activité</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-check">✓</div>
                            <span>Prestataire agréé de certification électronique</span>
                        </div>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="about-card">
                        <h4>+800m²</h4>
                        <p>Datacenter haute technologie</p>
                    </div>
                    <div class="about-card">
                        <h4>24/7</h4>
                        <p>Support technique continu</p>
                    </div>
                    <div class="about-card">
                        <h4>100%</h4>
                        <p>Solutions sur mesure</p>
                    </div>
                    <div class="about-card">
                        <h4>2008</h4>
                        <p>Année de création</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News -->
    <section id="actualites" class="news">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Actualités & Événements</h2>
                <p class="section-subtitle">Les dernières nouvelles d'Eurafric Information</p>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image">🏆</div>
                    <div class="news-content">
                        <div class="news-date">18 Janvier 2024</div>
                        <h3>Top Employer 2024 - 5ème année consécutive</h3>
                        <p>Eurafric Information reçoit officiellement la distinction Top Employer Maroc pour la cinquième année consécutive.</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">🏗️</div>
                    <div class="news-content">
                        <div class="news-date">2024</div>
                        <h3>Certification TierIII Design</h3>
                        <p>Notre datacenter obtient avec succès la certification TierIII Design décernée par l'autorité Uptime Institute.</p>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">📜</div>
                    <div class="news-content">
                        <div class="news-date">2023</div>
                        <h3>Certification ISO22301</h3>
                        <p>EAI décroche la certification ISO22301 pour la conformité de son Système de Management de la Continuité d'Activité.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="container">
            <h2>Prêt à transformer votre entreprise ?</h2>
            <p>Contactez-nous dès aujourd'hui pour découvrir comment Eurafric Information peut vous accompagner dans votre transformation digitale.</p>
            <a href="#contact" class="btn">Contactez-nous</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>EURAFRIC INFORMATION</h3>
                    <p>Solutions IT innovantes depuis 2008. Accompagner nos partenaires par la construction de services IT pérennes, innovants et créateurs de valeurs pour tous.</p>
                </div>
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Développement d'Applications</a></li>
                        <li><a href="#">Sécurité & Certification</a></li>
                        <li><a href="#">Infrastructure Cloud</a></li>
                        <li><a href="#">Business Intelligence</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Entreprise</h3>
                    <ul class="footer-links">
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Nos références</a></li>
                        <li><a href="#">Carrières</a></li>
                        <li><a href="#">Actualités</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li>📍 Casablanca, Maroc</li>
                        <li>✉ contact@eurafric-information.com</li>
                        <li>☎ +212 5 22 95 93 00</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2025 Eurafric Information. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.backgroundColor = '#ffffff';
                header.style.backdropFilter = 'none';
            }
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.service-card, .news-card, .about-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Mobile menu toggle
        const createMobileMenu = () => {
            if (window.innerWidth <= 992) {
                const nav = document.querySelector('nav ul');
                const mobileMenuBtn = document.createElement('button');
                mobileMenuBtn.innerHTML = '☰';
                mobileMenuBtn.style.cssText = `
                    background: none;
                    border: none;
                    font-size: 24px;
                    color: #1e3a8a;
                    cursor: pointer;
                    display: block;
                `;
                
                // Insert mobile menu button
                const headerContent = document.querySelector('.header-content');
                headerContent.appendChild(mobileMenuBtn);
                
                // Hide nav by default on mobile
                nav.style.display = 'none';
                
                mobileMenuBtn.addEventListener('click', () => {
                    nav.style.display = nav.style.display === 'none' ? 'flex' : 'none';
                });
            }
        };

        // Initialize mobile menu on load and resize
        createMobileMenu();
        window.addEventListener('resize', createMobileMenu);

        // Stats counter animation
        const animateStats = () => {
            const stats = document.querySelectorAll('.stat-number');
            stats.forEach(stat => {
                const target = stat.textContent;
                if (!isNaN(target.replace('+', ''))) {
                    const number = parseInt(target.replace('+', ''));
                    let current = 0;
                    const increment = number / 100;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= number) {
                            current = number;
                            clearInterval(timer);
                        }
                        stat.textContent = Math.floor(current) + (target.includes('+') ? '+' : '');
                    }, 20);
                }
            });
        };

        // Trigger stats animation when hero section is visible
        const heroObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    heroObserver.unobserve(entry.target);
                }
            });
        });

        heroObserver.observe(document.querySelector('.hero'));
    </script>
</body>
</html>