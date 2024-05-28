<?php
require_once __DIR__ . '/../models/Pokemon.php';

$type = 'Combat'; //$_GET

$listOfPokemons = allPokemonsOfSameType($type);

// include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/pokemon/list.php';
// include __DIR__ . '/../views/templates/footer.php';