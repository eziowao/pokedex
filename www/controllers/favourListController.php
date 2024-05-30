<?php
require_once __DIR__ . '/../models/Pokemon.php';

if (array_key_exists('favorites', $_COOKIE)) {
    $favoritePokemons = [];
    $favorites = json_decode($_COOKIE['favorites']);
    foreach ($favorites as $pokemonId) {
        array_push($favoritePokemons, pokemonInformation($pokemonId));
    }
}

// $id = $_GET['id'];
// $favorites = json_decode($_COOKIE['favorites']);


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/favour/list.php';
include __DIR__ . '/../views/templates/footer.php';
