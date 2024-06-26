<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/8049f56234.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Accueil</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple justify-content-center py-0">
            <div class="container">
                <a class="navbar-brand text-center" href="../../controllers/typeListController.php"><img id="imgLogo" src="./../../public/assets/img/pokedex_logo.png" height="120px" alt="logo pokedex avec un ectoplasma"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-around w-100 d-flex">
                        <li class="nav-item text-center">
                            <a class="nav-link fs-4" href="../../controllers/typeListController.php">Accueil <i class="fa-solid fa-house ms-4"></i></a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link fs-4" href="../../controllers/favourListController.php">Favoris <i class="fa-solid fa-star ms-4"></i></a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="nav-link fs-4" href="../../controllers/configController.php">Paramètres <i class="fa-solid fa-cog ms-4"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <main class="min-vh-100 <?= isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light-mode'; ?>">