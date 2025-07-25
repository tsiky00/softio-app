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
        <a href="<?= base_url('admin/produit') ?>" class="menu-item">
            <span><i class="fas fa-edit"></i></span>Produits
        </a>
        <a href="#" class="menu-item active">
            <span><i class="fa fa-users"></i></span>Utilisateurs
        </a>

        <a href="#" class="menu-item">
            <span><i class="fas fa-file"></span></i>
            Contenu
        </a>
        <a href="#" class="menu-item">
            <span><i class="fa fa-chart-bar"></i></span>
            Statistiques
        </a>
        <a href="<?= base_url('deconnexion') ?>" class="menu-item">
            <span><i class="fa fa-sign-out-alt"></i></span>
            Déconnexion
        </a>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content" id="mainContent">

    <div class="onglet">
        <a href="#" id="vente_" class="onglet_btn active"> Ajout de utilisateur</a>
    </div>

    <div class="zone-form">
        <form id="formSend" method="post">

            <div class="row">
                <!-- Nom -->
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required>
                        <div class="invalid-feedback" id="error-nom"></div>
                    </div>
                </div>

                <!-- Prénom -->
                <div class="col-md-6 mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" required>
                        <div class="invalid-feedback" id="error-prenom"></div>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="exemple@domaine.com" required>
                        <div class="invalid-feedback" id="error-email"></div>
                    </div>
                </div>

                <!-- Téléphone -->
                <div class="col-md-6 mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="number" class="form-control" name="telephone" id="telephone" placeholder="+261 34 00 000 00" required>
                        <div class="invalid-feedback" id="error-telephone"></div>
                    </div>
                </div>
            </div>
            <!-- Entreprise -->
            <div class="mb-3">
                <label for="entreprise" class="form-label">Entreprise</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                    <input type="text" class="form-control" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise" required>
                    <div class="invalid-feedback" id="error-entreprise"></div>
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Créez un mot de passe" required>
                    <button class="btn btn-outline-secondary toggle-password" type="button">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="invalid-feedback" id="error-password"></div>
                </div>
                <div class="password-strength mt-2">
                    <div class="strength-meter" id="strengthMeter"></div>
                </div>
                <small class="text-muted">8 caractères minimum avec chiffres et symboles</small>
            </div>

            <!-- Confirmation mot de passe -->
            <div class="mb-4">
                <label for="password1" class="form-label">Confirmer le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Confirmez votre mot de passe" required>
                    <button class="btn btn-outline-secondary toggle-password" type="button">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="invalid-feedback" id="error-password1"></div>
                </div>
            </div>

            <!-- Conditions -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                    J'accepte les <a href="#" class="text-primary">conditions générales</a> et la
                    <a href="#" class="text-primary">politique de confidentialité</a>
                </label>
            </div>

            <div class="mb-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary w-25"> <i class="fa fa-floppy-disk"></i> Enregistrer</button>
            </div>
            
        </form>
    </div>

    <!-- Liste de Table -->
    <div class="table-container">
        <table class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom et Prénom</th>
                    <th>Telephone</th>
                    <th>Email</th>
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
                <form id="formSend" method="post">

                    <div class="row">
                        <!-- Nom -->
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required>
                                <div class="invalid-feedback" id="error-nom"></div>
                            </div>
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" required>
                                <div class="invalid-feedback" id="error-prenom"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemple@domaine.com" required>
                            <div class="invalid-feedback" id="error-email"></div>
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="number" class="form-control" name="telephone" id="telephone" placeholder="+261 34 00 000 00" required>
                            <div class="invalid-feedback" id="error-telephone"></div>
                        </div>
                    </div>

                    <!-- Entreprise -->
                    <div class="mb-3">
                        <label for="entreprise" class="form-label">Entreprise</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                            <input type="text" class="form-control" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise" required>
                            <div class="invalid-feedback" id="error-entreprise"></div>
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Créez un mot de passe" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="invalid-feedback" id="error-password"></div>
                        </div>
                        <div class="password-strength mt-2">
                            <div class="strength-meter" id="strengthMeter"></div>
                        </div>
                        <small class="text-muted">8 caractères minimum avec chiffres et symboles</small>
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-4">
                        <label for="password1" class="form-label">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="Confirmez votre mot de passe" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="invalid-feedback" id="error-password1"></div>
                        </div>
                    </div>

                    <!-- Conditions -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            J'accepte les <a href="#" class="text-primary">conditions générales</a> et la
                            <a href="#" class="text-primary">politique de confidentialité</a>
                        </label>
                    </div>

                    <!-- Bouton d'inscription -->
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary py-3" id="submitBtn">
                            <span id="btnText">
                                <i id="btnMainIcon" class="fas fa-plus me-2"></i> Ajouter
                            </span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </div>

                    <!-- Alert dynamique -->
                    <div id="alertBox" class="alert d-none" role="alert"></div>

                </form>
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
                <form id="formEdit" method="post">
                    <input type="hidden" name="idUtilisateur" id="edit-id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit-nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="edit-nom" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="edit-prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="edit-prenom" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone" id="edit-telephone" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-entreprise" class="form-label">Entreprise</label>
                        <input type="text" class="form-control" name="entreprise" id="edit-entreprise" required>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i> Mettre à jour
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>