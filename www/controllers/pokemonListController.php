<?php
require_once __DIR__ . '/../models/Pokemon.php';

//???
try {
    if (array_key_exists('type', $_GET) && $_GET['type'] != null) {
        $type = $_GET['type'];
        if (allPokemonsOfSameType($type)) {
            $listOfPokemons = allPokemonsOfSameType($type);
        } else {
            $errors['pokemons'] = 'Une erreur est survenue';
        }
    }else {
        $errors['pokemons'] = 'Type de pokémons non sélectionner';
    }
} catch (Exception $e) {
    $errors = $e->getMessage();
}


// include __DIR__ . '/../views/templates/header.php';
if (empty($errors)) {
    include __DIR__ . '/../views/pokemon/list.php';
}else{
    include __DIR__ . '/../404.php';
}
// include __DIR__ . '/../views/templates/footer.php';