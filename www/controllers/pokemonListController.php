<?php
require_once __DIR__ . '/../models/Pokemon.php';

//???
try {
    $type = $_GET['type'];
    if (allPokemonsOfSameType($type)) {
        $listOfPokemons = allPokemonsOfSameType($type);
    } else {
        $errors['pokemons'] = 'Une erreur est survenue';
    }
} catch (Exception $e) {
    $errors = $e->getMessage();
    include __DIR__ . '/../404.php';
}


// include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/pokemon/list.php';
// include __DIR__ . '/../views/templates/footer.php';