<!-- Top Navbar -->
<nav class="top-navbar">
    <button class="hamburger" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">
        Softio
    </div>
    <div class="user-info">
        <span>Administrateur</span>
        <div class="user-avatar">A</div>
    </div>
</nav>

<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-menu">
        <a href="<?= base_url('admin/dashboard') ?>" class="menu-item">
            <span><i class="fas fa-tachometer-alt"></i></span>
            Dashboard
        </a>
        <a href="<?= base_url('admin/utilisateur') ?>" class="menu-item">
            <span><i class="fa fa-users"></i></span>
            Utilisateurs
        </a>
        <a href="<?= base_url('admin/statistique') ?>" class="menu-item active">
            <span><i class="fa fa-chart-bar"></i></span>
            Statistiques
        </a>

        <a href="<?= base_url('admin/hero') ?>" class="menu-item "><span><i class="fas fa-image"></i></span> Hero</a>
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
        <a href="#" id="vente_" class="onglet_btn active"> Statistique</a>
    </div>
    <div class="container">
        statistique
    </div>
</main>


