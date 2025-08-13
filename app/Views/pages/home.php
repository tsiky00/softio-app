<?= $this->include("pages/navbar.php") ?>
<div class="retour">
    <a href="#hero"><i class="fa fa-arrow-up"></i></a>
</div>
<!-- Hero Section -->
<section id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text" data-aos="zoom-in" data-aos-duration="1000">
                <h1 class="slogan"></h1>
                <p class="description"></p>
                <div class="hero-buttons">
                    <a href="#" id="essai" class="btn btn-primary">Decouvrer toutes nos solutions</a>
                    <a href="#" id="demo" class="btn btn-outline">Tester gratuitement</a>
                </div>
            </div>
            <div class="hero-image">
                <img src='' alt="Tableau de bord de softio" data-aos="fade-left" data-aos-duration="1000">
            </div>
        </div>
    </div>
</section>

<section id="apropos">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row" id="centre">
                    <h1 class="text-justify mb-2 d-block passer slogan1"></h1>
                    <p class="text-justify mb-2 d-block description1"></p>
                    <button class="voir btn btn-primary w-25 mt-2">VOIR PLUS</button>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="apropos-image">
                    <img src='' alt="Tableau de bord de softio" data-aos="fade-left" data-aos-duration="1000">
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" py-5" id="expertise">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="passer mb-4 d-block sloganE"></h1>
                <p class="mb-4 d-block descriptionE"></p>
                <div class="expertise-image mt-2">
                    <img src='' alt="Tableau de bord de softio" data-aos="fade-left" data-aos-duration="1000">
                </div>
                <button class="btn expert mt-4 mb-2">Contacter un expert</button>
            </div>
            <div class="col-lg-6">
                <div class="row d-flex gap-3 services-container">
                    <!-- Les cards seront ajoutées ici via AJAX -->
                </div>
            </div>
        </div>
    </div>
</section>

<section id="Nos-solution">
    <div class="container py-5">
        <h1 class="passer text-center">Nos solutions</h1>
        <p class="text-center">Puisque internet est utilisé tous les jours, votre entreprise et votre marque doit être visible sur le toit.</p>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4 solutions-container text-center">
            <!-- Les solutions seront ajoutées ici via AJAX -->
        </div>
    </div>
</section>

<section id="tarifs" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-5">Nos Tarifs</h1>
        </div>
        <div class="row justify-content-center g-4">
            <div class="row justify-content-center g-4" id="tarifs-container">
                <!-- Les cartes seront ajoutées ici via AJAX -->
            </div>
        </div>
    </div>
</section>

<?= $this->include("pages/footer.php") ?>