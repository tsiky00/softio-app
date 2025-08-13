<?php $session = \Config\Services::session() ; ?>
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
        <a href="<?= base_url('admin/statistique') ?>" class="menu-item">
            <span><i class="fa fa-chart-bar"></i></span>
            Statistiques
        </a>

        <a class="dropdown-toggle front-office menu-item active" href="#" role="button" data-bs-toggle="dropdown"><span><i class="fas fa-cogs"></i></span> Front-office</a>
        <ul class="dropdown-menu">
            <li><a href="<?= base_url('admin/hero') ?>" class="menu-item"><span><i class="fas fa-image"></i></span> Hero</a></li>
            <li><a href="<?= base_url('admin/expertise') ?>" class="menu-item"><span><i class="fas fa-brain"></i></span> Expértises</a></li>
            <li><a href="<?= base_url('admin/solution') ?>" class="menu-item"><span><i class="fas fa-lightbulb"></i></span> Nos solutions</a></li>
            <li><a href="<?= base_url('admin/tarifs') ?>" class="menu-item"><span><i class="fas fa-dollar-sign"></i></span> Tarifs</a></li>
            <li><a href="<?= base_url('admin/apropos') ?>" class="menu-item"><span><i class="fas fa-info-circle"></i></span> À propos</a></li>
            <li><a href="<?= base_url('admin/blog') ?>" class="menu-item"><span><i class="fas fa-blog"></i></span> Blog</a></li>
            <li><a href="<?= base_url('admin/contact') ?>" class="menu-item"><span><i class="fas fa-phone"></i></span> Contact</a></li>
            <li><a href="<?= base_url('admin/cgv') ?>" class="menu-item"><span><i class="fas fa-question-circle"></i></span> CGV</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content" id="mainContent">

    <div class="onglet">
        <a href="<?= base_url('admin/cgv') ?>" id="vente_" class="onglet_btn active"> CGV</a>
        <a href="<?= base_url('admin/cgu') ?>" id="vente_" class="onglet_btn active"> CGU</a>
        <a href="<?= base_url('admin/faq') ?>" id="vente_" class="onglet_btn active"> FAQ</a>
        <a href="<?= base_url('admin/politique') ?>" id="vente_" class="onglet_btn active"> Politique</a>
    </div>

    <div class="zone-form">
        <form id="formSend" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-"></i></span>
                    <input type="text" class="form-control" name="titre" id="titre" placeholder="" required>
                    <div class="invalid-feedback" id="error-titre"></div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Votre text</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-"></i></span>
                    <input type="text" class="form-control" name="description" id="description" placeholder="" required>
                    <div class="invalid-feedback" id="error-text"></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-25" id="btnSubmit">
                <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                <span id="btnText"><i class="fa fa-floppy-disk"></i> Enregistrer</span>
            </button>
        </form>
    </div>

    <!-- Liste de Table -->
    <div class="table-container">
        <table class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les données seront ajoutées ici dynamiquement -->
            </tbody>
        </table>
    </div>
</main>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Créer un compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body">
                <h2 class="mb-4 text-center animate__animated animate__fadeIn">Créer un compte</h2>
                <!-- Alert dynamique -->
                <div id="alertBox" class="alert d-none" role="alert"></div>


            </div>

        </div>
    </div>
</div>

<!-- Modal de modification -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body">

            </div>

        </div>
    </div>
</div>