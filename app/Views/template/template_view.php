<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <!-- CSS internes sécurisés -->
    <link rel="stylesheet" href="<?= esc(base_url('assets/css/' . $link)) ?>">
    <link rel="stylesheet" href="<?= esc(base_url('assets/font/css/all.min.css')) ?>">
    <link rel="stylesheet" href="<?= esc(base_url('assets/bootstrap/css/bootstrap.min.css')) ?>">

    <!-- Fonts et CDN sûrs -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Datatables et SweetAlert sécurisés -->
    <link rel="stylesheet" href="<?= esc(base_url('assets/datatable/dataTables.bootstrap5.min.css')) ?>">
    <link rel="stylesheet" href="<?= esc(base_url('assets/datatable/sweetalert2.min.css')) ?>">
</head>

<body>
    <!-- Affichage du contenu principal brut (HTML complet contrôlé) -->
    <?= $page ?>

    <!-- Scripts -->
    <script src="<?= esc(base_url('assets/js/jquery-3.7.1.min.js')) ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?= esc(base_url('assets/bootstrap/js/bootstrap.bundle.min.js')) ?>"></script>
    <script src="<?= esc(base_url('assets/js/' . $script)) ?>"></script>
    <script src="<?= esc(base_url('assets/font/js/all.min.js')) ?>"></script>
    <script src="<?= esc(base_url('assets/datatable/datatables.min.js')) ?>"></script>
    <script src="<?= esc(base_url('assets/datatable/dataTables.bootstrap5.min.js')) ?>"></script>
    <script src="<?= esc(base_url('assets/datatable/sweetalert2@11.js')) ?>"></script>
</body>
</html>