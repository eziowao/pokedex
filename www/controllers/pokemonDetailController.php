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

// Le(s) précédent(s) évolution(s) Pokémon(s), vérifier la présence des preEvolution
if ($pokemonDetail->apiPreEvolution != 'none' && !empty($pokemonDetail->apiPreEvolution)) {
    // Récupération id Pokémon
    $idPreEvolution = $pokemonDetail->apiPreEvolution->pokedexIdd;
    // Info PréÉvolution
    $pokemonPreEvolution = pokemonInformation($idPreEvolution);
    // Condition pour vérifier si il y a encore une préEvolution
    if ($pokemonPreEvolution->apiPreEvolution != 'none' && !empty($pokemonPreEvolution->apiPreEvolution)) {
        $firstPokemon = $pokemonPreEvolution->apiPreEvolution;
        // Récupération id 1er pokemon, peut être fusionné ligne du dessus et de dessous
        $firstPokemon = $firstPokemon->pokedexIdd;
        $idFirstPokemon = pokemonInformation($firstPokemon);
        // Nom du Pokémon
        $firstPokemonName = $idFirstPokemon->name;
        $firstImage = checkPreEvolution($idFirstPokemon);
    }
    // Récupération Image précédent pokemon
    $infoPreEvolution = checkPreEvolution($pokemonPreEvolution);
}

// Pokémon Évolution
// Le(s) prochaine(s) évolution(s) Pokémon(s), vérifier la présence des Evolution
if (count($pokemonDetail->apiEvolutions) > 1) {
    $evolutions = $pokemonDetail->apiEvolutions;
}elseif (!empty($pokemonDetail->apiEvolutions)) {
    if (array_key_exists(0,$pokemonDetail->apiEvolutions)) {
        // Récupération id Pokémon
        $idEvolutions = $pokemonDetail->apiEvolutions[0]->pokedexId;
        // Info Évolution
        $pokemonEvolutions = pokemonInformation($idEvolutions);
        // Récupération Image pokemon suivant
        $infoEvolutions = checkPreEvolution($pokemonEvolutions);

        // Condition pour vérifier si il y a encore une Evolution
        if (array_key_exists(0,$pokemonEvolutions->apiEvolutions)) {
            $lastPokemon = $pokemonEvolutions->apiEvolutions[0];
            // Récupération id 1er pokemon, peut être fusionné ligne du dessus et de dessous 
            $lastPokemon = $lastPokemon->pokedexId;
            $idLastPokemon = pokemonInformation($lastPokemon);
            // Nom du Pokémon
            $lastPokemonName = $idLastPokemon->name;
            $lastImage = checkPreEvolution($idLastPokemon);
        }
    }
}

// include __DIR__ . '/../views/templates/header.php';
if (empty($errors)) {
    include __DIR__ . '/../views/pokemon/detail.php';
}else {
    include __DIR__ . '/../404.php';
}
// include __DIR__ . '/../views/templates/footer.php';
