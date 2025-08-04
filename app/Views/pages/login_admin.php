<div class="login-container">
    <div class="logo">
        <img src="<?= base_url().'assets/img/logo_noire.png'?>" alt="logo de softio" height="100px">
        <p>Panneau d'administration</p>
    </div>

    <form id="loginForm">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <span class="password-toggle" onclick="togglePassword()"><i class="fa fa-eye"></i></span>
        </div>

        <div class="remember-forgot">
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <a href="#" class="forgot-password">Mot de passe oublié ?</a>
        </div>

        <button type="submit" class="login-btn"><i class="fas fa-right-to-bracket me-2"></i> Se connecter</button>
    </form>
    <div id="message" class="text-center">
        
    </div>
</div>