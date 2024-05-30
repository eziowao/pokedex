<!-- Une fois la gestion d'erreure terminée, enlever les includes... -->

<?php
include __DIR__ . '/views/templates/header.php'
?>

<div class="container text-center">
    <h1 class="display-4 mt-5">Erreur 404</h1>
    <img src="./public/assets/img/error404pkmn.png" alt="image d'erreur" class="img-fluid my-4 w-25 h-25">
    <p class="lead fs-2">La page que vous cherchez n'existe pas.</p>
</div>

<?php

include __DIR__ . '/views/templates/footer.php'

?>