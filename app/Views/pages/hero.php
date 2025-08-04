<!-- Top Navbar -->
<nav class="top-navbar">
    <button class="hamburger" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">
        Softio
    </div>
    <div class="user-info">
        <!-- Avatar -->
        <div id="dropdownToggle" class="user-avatar" style="
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #1877f2;
      color: white;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      transition: background-color 0.2s;
    ">
            A <span><i class="fas fa-chevron-down"></i></span>
        </div>

        <!-- Dropdown -->
        <div id="dropdownMenu" class="dropdown hidden" style="
      position: absolute;
      top: 50px;
      right: 0;
      width: 200px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      overflow: hidden;
      z-index: 999;
      font-family: sans-serif;
    ">
            <div style="padding: 12px; border-bottom: 1px solid #eee; color: black;">
                <strong>Administrateur</strong><br>
                <small>admin@email.com</small>
            </div>
            <a href="/admin/profile" style="display: block; padding: 12px; text-decoration: none; color: #333; transition: background 0.2s;" onmouseover="this.style.background='#f0f0f0'" onmouseout="this.style.background='white'">
                👤 Voir le profil
            </a>
            <a href="/admin/logout" style="display: block; padding: 12px; text-decoration: none; color: #e00; transition: background 0.2s;" onmouseover="this.style.background='#fcecec'" onmouseout="this.style.background='white'">
                🚪 Déconnexion
            </a>
        </div>
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

        <a href="<?= base_url('admin/hero') ?>" class="menu-item active"><span><i class="fas fa-image"></i></span> Hero</a>
        <a href="<?= base_url('admin/expertise') ?>" class="menu-item"><span><i class="fas fa-cogs"></i></span> Expértises</a>
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
        <a href="#" id="vente_" class="onglet_btn active"> Ajout de hero</a>
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

            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-"></i></span>
                    <input type="file" class="form-control" name="image" id="image">
                    <div class="invalid-feedback" id="error-image"></div>
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
                    <th>Image</th>
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