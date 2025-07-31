<!-- Top Navbar -->
<nav class="top-navbar">
    <button class="hamburger" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">
        <h2>Softio</h2>
    </div>
    <div class="user-info">
        <span>Administrateur</span>
        <div class="user-avatar">A</div>
    </div>
</nav>

<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-menu">
        <a href="#" class="menu-item active">
            <span><i class="fas fa-tachometer-alt"></i></span>
            Dashboard
        </a>
        <a href="<?= base_url('admin/utilisateur') ?>" class="menu-item">
            <span><i class="fa fa-users"></i></span>Utilisateurs
        </a>
        <a href="<?= base_url('admin/statistique') ?>" class="menu-item">
            <span><i class="fa fa-chart-bar"></i></span>
            Statistiques
        </a>
        <a href="<?= base_url('admin/hero') ?>" class="menu-item"><span><i class="fas fa-image"></i></span> Hero</a>
        <a href="<?= base_url('admin/expertise') ?>"  class="menu-item"><span><i class="fas fa-cogs"></i></span> Expértises</a>
        <a href="<?= base_url('admin/solution') ?>" class="menu-item"><span><i class="fas fa-cogs"></i></span> Nos solutions</a>
        <a href="<?= base_url('admin/tarifs') ?>" class="menu-item"><span><i class="fas fa-money-check"></i></span> Tarifs</a>
        <a href="<?= base_url('admin/apropos') ?>" class="menu-item"><span><i class="fas fa-info-circle"></i></span> À propos</a>
        <a href="<?= base_url('admin/blog') ?>" class="menu-item"><span><i class="fas fa-envelope"></i></span> Blog</a>
        <a href="<?= base_url('deconnexion') ?>" class="menu-item">
            <span><i class="fa fa-sign-out-alt"></i></span>
            Déconnexion
        </a>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <div class="onglet">
        <a href="#" id="vente_" class="onglet_btn active">Dashboard</a>
    </div>

    <!-- Welcome Card -->
    <div class="welcome-card">
        <h2> Bienvenue, Administrateur!</h2>
        <p>Voici un aperçu de votre tableau de bord. Gérez votre système efficacement.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="stats-card primary">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>1,234</h3>
                <p>Utilisateurs Total</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card success">
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <h3>567</h3>
                <p>Produits Actifs</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Activity -->
        <div class="col-md-8">
            <div class="recent-activity">
                <h5><i class="fas fa-history"></i> Activité Récente</h5>
                <div class="activity-item">
                    <div class="activity-icon primary">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Nouvel utilisateur inscrit</h6>
                        <p>Jean Dupont s'est inscrit sur la plateforme</p>
                    </div>
                    <div class="activity-time">Il y a 5 min</div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon success">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Nouvelle commande</h6>
                        <p>Commande #12345 pour un montant de €129.99</p>
                    </div>
                    <div class="activity-time">Il y a 12 min</div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Stock faible</h6>
                        <p>Le produit "Smartphone XYZ" a un stock inférieur à 10</p>
                    </div>
                    <div class="activity-time">Il y a 1 heure</div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon primary">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Produit mis à jour</h6>
                        <p>Le produit "Laptop Pro" a été modifié</p>
                    </div>
                    <div class="activity-time">Il y a 2 heures</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-4">
            <div class="quick-actions">
                <h5><i class="fas fa-bolt"></i> Actions Rapides</h5>
                <a href="#" class="action-btn btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Ajouter un produit
                </a>
                <a href="#" class="action-btn btn btn-info">
                    <i class="fas fa-user-plus"></i>
                    Créer un utilisateur
                </a>
                <a href="#" class="action-btn btn btn-warning">
                    <i class="fas fa-chart-bar"></i>
                    Voir les statistiques
                </a>
                <a href="#" class="action-btn btn btn-danger">
                    <i class="fas fa-cog"></i>
                    Paramètres système
                </a>
            </div>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="chart-container">
        <h5><i class="fas fa-chart-area"></i> Graphique des Ventes</h5>
        <canvas id="salesChart" width="400" height="200"></canvas>
    </div>
</main>