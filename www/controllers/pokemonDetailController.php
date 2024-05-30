<?php
require_once __DIR__ . '/../models/Pokemon.php';

try {
    if (array_key_exists('id',$_GET) && intval($_GET['id']) != null) {
        $id = intval($_GET['id']);
        if ($id > 0 && $id <= 898) {
            $pokemonDetail = pokemonInformation($id);
        }else {
            $errors['detailPokemon'] = 'Pokémon limité à 898';
        }
    }else {
        $errors['detailPokemon'] = 'Pokémon non trouvé'; 
    }
} catch (Exception $e) {
    $errors = $e->getMessage();
}

// var_dump($pokemonDetail->apiPreEvolutions);
if ($pokemonDetail->apiPreEvolution->pokedexIdd) {
    $idPreEvolution = $pokemonDetail->apiPreEvolution->pokedexIdd;
    $infoPreEvolution = pokemonInformation($idPreEvolution);
    // var_dump($infoPreEvolution);
}
if (!empty($pokemonDetail->apiEvolutions[0]->pokedexId)){
    $idEvolution = $pokemonDetail->apiEvolutions[0]->pokedexId;
    $infoEvolution = pokemonInformation($idEvolution);
    // var_dump($infoEvolution);
}

// include __DIR__ . '/../views/templates/header.php';
if (empty($errors)) {
    include __DIR__ . '/../views/pokemon/detail.php';
}else {
    include __DIR__ . '/../404.php';
}
// include __DIR__ . '/../views/templates/footer.php';
