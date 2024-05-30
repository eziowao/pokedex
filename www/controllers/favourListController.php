<?php
require_once __DIR__ . '/../models/Pokemon.php';
require_once __DIR__ . '/../models/Type.php';

$types = AllTypes();
$favoritePokemons = [];


if (array_key_exists('favorites', $_COOKIE)) {
    $favorites = json_decode($_COOKIE['favorites']);
    foreach ($favorites as $pokemonId) {
        $pokemon = pokemonInformation($pokemonId);
        if ($pokemon) {
            $pokemon->typeClass = 'type-normal'; // Valeur par défaut

            if (isset($pokemon->apiTypes) && is_array($pokemon->apiTypes) && count($pokemon->apiTypes) > 0) {
                $mainType = $pokemon->apiTypes[0]->name; // Suppose que le premier type est le principal
                foreach ($types as $type) {
                    if ($type->name === $mainType) {
                        $pokemon->typeClass = 'type-' . strtolower($type->englishName);
                        break;
                    }
                }
            }
            array_push($favoritePokemons, $pokemon);
        }
    }
}

// $id = $_GET['id'];
// $favorites = json_decode($_COOKIE['favorites']);


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/favour/list.php';
include __DIR__ . '/../views/templates/footer.php';
