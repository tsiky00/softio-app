<!-- Navbar Bootstrap 5 -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar" id="mainNavbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="<?= base_url() . 'assets/img/logo_noire.png' ?>" alt="Logo Softio">
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleMenu()">
            <div class="custom-toggler" id="customToggler">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos solutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tarification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- Auth Buttons -->
            <div class="auth-buttons d-flex flex-column flex-lg-row">
                <a href="<?= base_url('se-connecter') ?>" class="btn btn-login">Connexion</a>
                <a href="<?= base_url('inscription') ?>" class="btn btn-signup">Inscription</a>
            </div>
        </div>
    </div>
</nav>