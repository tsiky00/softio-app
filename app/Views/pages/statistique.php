<?php $session = \Config\Services::session(); ?>
<!-- Top Navbar -->
<nav class="top-navbar">
    <button class="hamburger" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">
        Softio
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

        <a class="dropdown-toggle front-office menu-item" href="#" role="button" data-bs-toggle="dropdown"><span><i class="fas fa-cogs"></i></span> Front-office</a>
        <ul class="dropdown-menu">
            <li><a href="<?= base_url('admin/hero') ?>" class="menu-item"><span><i class="fas fa-image"></i></span> Hero</a></li>
            <li><a href="<?= base_url('admin/expertise') ?>" class="menu-item"><span><i class="fas fa-brain"></i></span> Expértises</a></li>
            <li><a href="<?= base_url('admin/service') ?>" class="menu-item"><span><i class="fas fa-briefcase"></i></span> Service</a></li>
            <li><a href="<?= base_url('admin/solution') ?>" class="menu-item"><span><i class="fas fa-lightbulb"></i></span> Nos solutions</a></li>
            <li><a href="<?= base_url('admin/tarifs') ?>" class="menu-item"><span><i class="fas fa-dollar-sign"></i></span> Tarifs</a></li>
            <li><a href="<?= base_url('admin/apropos') ?>" class="menu-item"><span><i class="fas fa-info-circle"></i></span> À propos</a></li>
            <li><a href="<?= base_url('admin/blog') ?>" class="menu-item"><span><i class="fas fa-blog"></i></span> Blog</a></li>
        </ul>
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


