<?php $session = \Config\Services::session(); ?>
<!-- Top Navbar -->
<nav class="top-navbar">
    <button class="hamburger" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">
        <h2>Softio</h2>
    </div>
    <div class="dropdown user-info">
        <div class="user-avatar dropdown-toggle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" style="width:40px;height:40px;border-radius:50%;background:#ffc107;color:#232526;font-weight:bold;font-size:1.2rem;cursor:pointer;">
            <?= strtoupper(substr($session->get('nom') ?? 'A', 0, 1)) ?>
        </div>
        <ul class="dropdown-menu dropdown-menu-end shadow p-3" style="min-width:220px;">
            <li class="px-2 pb-2 border-bottom mb-2">
                <div class="d-flex align-items-center gap-2">
                    <div style="width:38px;height:38px;border-radius:50%;background:#ffc107;color:#232526;font-weight:bold;font-size:1.1rem;display:flex;align-items:center;justify-content:center;">
                        <?= strtoupper(substr($session->get('nom') ?? 'A', 0, 1)) ?>
                    </div>
                    <div>
                        <div class="fw-bold text-light small mb-0"><?= $session->get('nom') ?? 'Admin' ?></div>
                        <div class="fw-bold text-light small"> <?= $session->get('email'); ?> </div>
                    </div>
                </div>
            </li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="<?= base_url('admin/change-password') ?>"><i class="fa fa-user-cog text-primary"></i> Modifier compte</a></li>
            <li><a href="<?= base_url('deconnexion') ?>" class="dropdown-item d-flex align-items-center gap-2"><i class="fa fa-sign-out-alt text-danger"></i> Déconnexion</a></li>
        </ul>
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
            <span><i class="fa fa-users"></i></span> Utilisateurs
        </a>
        <a href="<?= base_url('admin/statistique') ?>" class="menu-item">
            <span><i class="fa fa-chart-bar"></i></span>
            Statistiques
        </a>


        <a class="dropdown-toggle front-office menu-item" href="#" role="button" data-bs-toggle="dropdown"><span><i class="fas fa-cogs"></i></span> Front-office</a>
        <ul class="dropdown-menu">
            <li><a href="<?= base_url('admin/hero') ?>" class="menu-item"><span><i class="fas fa-image"></i></span> Hero</a></li>
            <li><a href="<?= base_url('admin/expertise') ?>" class="menu-item"><span><i class="fas fa-cogs"></i></span> Expértises</a></li>
            <li><a href="<?= base_url('admin/solution') ?>" class="menu-item"><span><i class="fas fa-cogs"></i></span> Nos solutions</a></li>
            <li><a href="<?= base_url('admin/tarifs') ?>" class="menu-item"><span><i class="fas fa-money-check"></i></span> Tarifs</a></li>
            <li><a href="<?= base_url('admin/apropos') ?>" class="menu-item"><span><i class="fas fa-info-circle"></i></span> À propos</a></li>
            <li><a href="<?= base_url('admin/blog') ?>" class="menu-item"><span><i class="fas fa-envelope"></i></span> Blog</a></li>
            <li><a href="<?= base_url('admin/contact') ?>" class="menu-item"><span><i class="fas fa-phone"></i></span> Contact</a></li>
        </ul>
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