<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100 p-3">
    <!-- Logo animé -->
    <div class="text-center mb-4 logo-animation">
        <img src="<?= base_url('assets/img/logo_noire.png') ?>" class="img-fluid" style="height: 120px; margin-bottom:-30px;" alt="Logo Softio">
    </div>

    <!-- Box avec deux colonnes -->
    <div class="row box mb-5">
        <!-- Colonne image -->
        <div class="col-lg-5 d-none d-lg-block" id="image">
            <div class="d-flex flex-column justify-content-center h-100 p-5 text-white position-relative z-index-1">
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
            <h2 class="mb-4 text-center animate__animated animate__fadeIn">Créer un compte</h2>
            <form id="formSend" class="animate__animated animate__fadeIn animate__delay-1s" methode="post">
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
                    <label class="form-check-label" for="terms">J'accepte les <a href="#" class="text-primary">conditions générales</a> et la <a href="#" class="text-primary">politique de confidentialité</a></label>
                </div>

                <!-- Bouton d'inscription -->
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary py-3" id="submitBtn">
                        <span id="btnText">
                            <i id="btnMainIcon" class="fas fa-user-plus me-2"></i> S'inscrire
                        </span>
                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Alert dynamique -->
                <div id="alertBox" class="alert d-none" role="alert"></div>

                <!-- Lien de connexion -->
                <div class="text-center">
                    <p class="mb-0">Vous avez déjà un compte ? <a href="<?= base_url('se-connecter') ?>" class="login-link">Se connecter <i class="fas fa-arrow-right ms-1"></i></a></p>
                </div>
            </form>
        </div>
    </div>
</div>