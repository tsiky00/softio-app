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
                <h1 class="passer mb-4 d-block">Nos expertises</h1>
                <p class="mb-4 d-block">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias et cupiditate quibusdam suscipit eligendi illum deserunt corporis error consequatur enim, vero quasi distinctio nam impedit facere architecto, ratione temporibus ab.</p>
                <div class="image3 mt-2"></div>
                <button class="btn expert mt-4 mb-2">Contacter un expert</button>
            </div>
            <div class="col-lg-6">
                <div class="row d-flex gap-3">
                    <div class=" col-md-6 col-sm-3 card" style="width: 48%;">
                        <img src="<?= base_url() . 'assets/img/Annotation 2025-07-29 093548.png' ?>" alt="image dans le card">
                        <div class="card-body">
                            <h5 class="card-title">Developpement web</h5>
                            <p class="card-text">Some example text.Some example text.</p>
                            <a href="#" class="btn btn-primary plus d-flex justify-content-center">Voir plus</a>
                        </div>
                    </div>
                    <div class="col-md-6 card" style="width: 48%;">
                        <img src="<?= base_url() . 'assets/img/Annotation 2025-07-29 093548.png' ?>" alt="image dans le card">
                        <div class="card-body">
                            <h5 class="card-title">Developpement web</h5>
                            <p class="card-text">Some example text.Some example text.</p>
                            <a href="#" class="btn btn-primary plus d-flex justify-content-center">See Profile</a>
                        </div>
                    </div>

                    <div class="col-md-6 card" style="width: 48%;">
                        <img src="<?= base_url() . 'assets/img/Annotation 2025-07-29 093548.png' ?>" alt="image dans le card">
                        <div class="card-body">
                            <h5 class="card-title">Developpement web</h5>
                            <p class="card-text">Some example text.Some example text.</p>
                            <a href="#" class="btn btn-primary plus d-flex justify-content-center">See Profile</a>
                        </div>
                    </div>
                    <div class="col-md-6 card" style="width: 48%;">
                        <img src="<?= base_url() . 'assets/img/Annotation 2025-07-29 093548.png' ?>" alt="image dans le card">
                        <div class="card-body">
                            <h5 class="card-title">Developpement web</h5>
                            <p class="card-text">Some example text.Some example text.</p>
                            <a href="#" class="btn btn-primary plus d-flex justify-content-center">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="Nos-solution">
    <div class="container py-5">
        <h1 class="passer text-center">Nos solutions</h1>
        <p class="text-center">Puisque internet est utilisé tous les jours, votre entreprise et votre marque doit être visible sur le toit.</p>
        <div class="row gap-4">
            <div class="col text-center">
                <figure class="figure" style="max-width: 120px;">
                    <div class="solution-image">
                        <img src=""
                        class="figure-img img-fluid rounded-circle "
                        alt="Description"
                        style="max-width: 120px;">
                    </div>
                    <figcaption class="figure-caption mt-2">
                        <h4 class="descriptionS"></h4>
                    </figcaption>
                </figure>
            </div>
            <!-- Répéter pour chaque élément -->
        </div>
    </div>
</section>

<section id="tarifs" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-5">Nos Tarifs</h1>
        </div>
        <div class="row justify-content-center g-4">
            <!-- Carte 1 -->
            <div class="col-md-5">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">Location</h4>
                        <h5 class="text-muted">49 000 Ar / mois</h5>
                        <p class="mt-3">Parfait pour les particuliers ou les petites structures.</p>
                        <ul class="list-unstyled my-4">
                            <li>✔ 10 utilisateurs</li>
                            <li>✔ Support par e-mail</li>
                            <li>✔ 5 Go de stockage</li>
                        </ul>
                        <a href="#" class="btn w-100 contacter">Choisir</a>
                    </div>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="col-md-5">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">Achat définitif</h4>
                        <h5 class="text-muted">99 000 Ar / mois</h5>
                        <p class="mt-3">Adaptée aux entreprises ou aux projets ambitieux.</p>
                        <ul class="list-unstyled my-4">
                            <li>✔ Utilisateurs illimités</li>
                            <li>✔ Support prioritaire</li>
                            <li>✔ 50 Go de stockage</li>
                        </ul>
                        <a href="#" class="btn w-100 contacter">Choisir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include("pages/footer.php") ?>