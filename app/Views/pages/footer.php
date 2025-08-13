<!-- Footer -->
<footer class="modern-footer bg-dark text-white py-5" id="contact">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-3">
                <h5 class="fw-bold mb-4 d-flex align-items-center">
                    <i class="fas fa-cubes me-2" style="color: #ffc107;"></i>SOFTIO
                </h5>
                <p class="text-white-50">Simplifiez la gestion de votre magasin avec Softio</p>
                <p><i class="fas fa-phone me-2"></i><span id="numero"></span></p>
                <p><i class="fas fa-map-marker-alt me-2"></i><span id="adresse"></span></p>
                <p><i class="fas fa-envelope me-2"></i><span id="email"></span></p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold mb-4" style="color: #ffc107;">Liens utiles</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="footer-link">Expertises</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Nos solutions</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Tarifs</a></li>
                    <li class="mb-2"><a href="#" class="footer-link">Blog</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold mb-4" style="color: #ffc107;">Termes et condition</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?= base_url().'cgv'?>" class="footer-link">CGV</a></li>
                    <li class="mb-2"><a href="<?= base_url().'cgu'?>" class="footer-link">CGU</a></li>
                    <li class="mb-2"><a href="<?= base_url().'faq'?>" class="footer-link">FAQ</a></li>
                    <li class="mb-2"><a href="<?= base_url().'politique'?>" class="footer-link">Politique de confidentialité</a></li>
                </ul>
            </div>

            <div class="col-lg-3 formulaire">
                <h6 class="fw-bold mb-4" style="color: #ffc107;">Nous contacter</h6>
                <form id="send-data">
                    <input type="text" class="form-control mb-2" name="nom" id="nom" placeholder="Votre nom">
                    <div class="invalid-feedback" id="error-nom"></div>
                    <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Votre email">
                    <div class="invalid-feedback" id="error-email"></div>
                    <textarea name="message" class="form-control mb-2" id="message" placeholder="Votre message"></textarea>
                    <div class="invalid-feedback" id="error-message"></div>
                    <button name="envoyer" class="btn btn-primary form-control" id="envoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</footer>
<div class="pied">
    <p class="small text-white-50 mb-0 text-center">© 2025 softio. Tous droits réservés.</p>
</div>