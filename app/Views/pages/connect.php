<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100 p-3">
    <!-- Logo animé -->
    <div class="text-center mb-4 logo-animation">
        <img src="<?= base_url('assets/img/logo_noire.png') ?>" class="img-fluid" style="height: 120px; margin-bottom:-30px;" alt="Logo Softio">
    </div>

    <!-- Box avec deux colonnes -->
    <div class="row box mb-5">
        <!-- Colonne image -->
        <div class="col-lg-5 d-none d-lg-block" id="image">
            <div class="d-flex flex-column justify-content-center p-5 text-white position-relative z-index-1">
                <h3 class="fw-bold mb-4 animate__animated animate__fadeInLeft">Rejoignez Softio</h3>
                <p class="mb-4 animate__animated animate__fadeInLeft animate__delay-1s">La solution ultime pour gérer votre stock efficacement.</p>
                <ul class="list-unstyled animate__animated animate__fadeInLeft animate__delay-2s">
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Gestion en temps réel</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Interface intuitive</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Sécurité des données</li>
                </ul>
            </div>
        </div>

        <!-- Colonne formulaire -->
        <div class="col-lg-7 form-section">
            
            <h2 class="mb-4 text-center animate__animated animate__fadeIn">Se connecter</h2>

            <form id="formSend" class="animate__animated animate__fadeIn animate__delay-1s">
                <div class="row">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemple@domaine.com" required>
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div id="errorMessage" class="alert alert-danger d-none" style="width: 96%; line-height: 0px; height: 30px; text-align: center; font-size: 18px; margin-left: 2%;"></div>
                    <!-- Bouton d'inscription -->
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary py-3" id="submitBtn">
                            <span id="btnText">
                                <i class="fas fa-right-to-bracket me-2"></i>Se connecter
                            </span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
            </form>
            <!-- Lien de connexion -->
            <div class="text-center">
                <p class="mb-0">Créer un compte ? <a href="<?= base_url('inscription') ?>" class="login-link">S'inscrire <i class="fas fa-arrow-right ms-1"></i></a></p>
            </div>

        </div>
    </div>
</div>
</div>
</div>