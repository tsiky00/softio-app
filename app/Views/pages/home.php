<?= $this->include("pages/navbar.php") ?>
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="slogan"></h1>
                <p class="description"></p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">Commencer l'essai gratuit</a>
                    <a href="#" class="btn btn-outline">Voir la démo</a>
                </div>
            </div>
            <div class="hero-image">
                <img src='' alt="Tableau de bord de softio">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Fonctionnalités puissantes</h2>
            <p class="section-subtitle">Notre solution élimine les processus manuels et vous permet de gérer votre inventaire de manière efficace et intuitive.</p>
        </div>
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Analytique en temps réel</h3>
                <p>Obtenez des insights immédiats sur vos performances avec des tableaux de bord personnalisables et des rapports détaillés.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Automatisation intelligente</h3>
                <p>Automatisez vos processus répétitifs et concentrez-vous sur ce qui compte vraiment pour votre entreprise.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h3>Gestion des équipes</h3>
                <p>Collaborez efficacement avec votre équipe grâce à des outils de gestion de projets et de communication intégrés.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Sécurité renforcée</h3>
                <p>Protégez vos données avec notre système de sécurité de niveau entreprise et des sauvegardes automatiques.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Ce que nos clients disent</h2>
            <p class="section-subtitle">Découvrez les témoignages de nos utilisateurs satisfaits</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>AppVision a complètement transformé notre façon de travailler. La centralisation des données et l'automatisation des processus nous ont fait gagner des heures chaque semaine.</p>
                </div>
                <div class="client-info">
                    <div class="client-avatar">MJ</div>
                    <div class="client-details">
                        <h4>Marie Johnson</h4>
                        <p>Directrice Marketing, TechSolutions</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>L'interface est intuitive et la courbe d'apprentissage très rapide. L'équipe de support est réactive et compétente. Un investissement qui s'est amorti en moins de 3 mois.</p>
                </div>
                <div class="client-info">
                    <div class="client-avatar">PD</div>
                    <div class="client-details">
                        <h4>Pierre Dubois</h4>
                        <p>CEO, Innovate Group</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <p>Les fonctionnalités d'analyse nous ont permis d'identifier des opportunités de croissance que nous n'aurions jamais vues autrement. Un outil indispensable pour toute entreprise moderne.</p>
                </div>
                <div class="client-info">
                    <div class="client-avatar">SL</div>
                    <div class="client-details">
                        <h4>Sophie Lambert</h4>
                        <p>Directrice Financière, Global Retail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <h2>Prêt à révolutionner votre entreprise?</h2>
        <p>Rejoignez des milliers d'entreprises qui utilisent déjà AppVision pour optimiser leurs opérations et augmenter leur productivité.</p>
        <a href="#" class="btn btn-white">Commencer l'essai gratuit</a>
    </div>
</section>

<?= $this->include("pages/footer.php") ?>