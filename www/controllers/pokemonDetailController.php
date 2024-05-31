<?php
require_once __DIR__ . '/../models/Pokemon.php';
require_once __DIR__ . './../models/Type.php';

$favorites = json_decode($_COOKIE['favorites']);

try {
    $allTypes = AllTypes();
    if ($allTypes === false) {
        throw new Exception('Données de l\'API non chargé.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header('Location: ./../404.php');
}


try {
    if (array_key_exists('id', $_GET) && intval($_GET['id']) != null) {
        $id = intval($_GET['id']);
        if ($id > 0 && $id <= 898) {
            $pokemonDetail = pokemonInformation($id);
        } else {
            $errors['detailPokemon'] = 'Pokémon limité à 898';
        }
    } else {
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
} elseif (!empty($pokemonDetail->apiEvolutions)) {
    if (array_key_exists(0, $pokemonDetail->apiEvolutions)) {
        // Récupération id Pokémon
        $idEvolutions = $pokemonDetail->apiEvolutions[0]->pokedexId;
        // Info Évolution
        $pokemonEvolutions = pokemonInformation($idEvolutions);
        // Récupération Image pokemon suivant
        $infoEvolutions = checkPreEvolution($pokemonEvolutions);

        // Condition pour vérifier si il y a encore une Evolution
        if (array_key_exists(0, $pokemonEvolutions->apiEvolutions)) {
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


function getTypeImage($typeName, $typeImages)
{
    return isset($typeImages[$typeName]) ? $typeImages[$typeName]['image'] : '';
}


$typeClasses = getTypeClasses($pokemonDetail->apiTypes);


$typesData = [
    ["id" => 37, "name" => "Normal", "image" => "https://static.wikia.nocookie.net/pokemongo/images/f/fb/Normal.png", "englishName" => "normal"],
    ["id" => 38, "name" => "Combat", "image" => "https://static.wikia.nocookie.net/pokemongo/images/3/30/Fighting.png", "englishName" => "fighting"],
    ["id" => 39, "name" => "Vol", "image" => "https://static.wikia.nocookie.net/pokemongo/images/7/7f/Flying.png", "englishName" => "flying"],
    ["id" => 40, "name" => "Poison", "image" => "https://static.wikia.nocookie.net/pokemongo/images/0/05/Poison.png", "englishName" => "poison"],
    ["id" => 41, "name" => "Sol", "image" => "https://static.wikia.nocookie.net/pokemongo/images/8/8f/Ground.png", "englishName" => "ground"],
    ["id" => 42, "name" => "Roche", "image" => "https://static.wikia.nocookie.net/pokemongo/images/0/0b/Rock.png", "englishName" => "rock"],
    ["id" => 43, "name" => "Insecte", "image" => "https://static.wikia.nocookie.net/pokemongo/images/7/7d/Bug.png", "englishName" => "bug"],
    ["id" => 44, "name" => "Spectre", "image" => "https://static.wikia.nocookie.net/pokemongo/images/a/ab/Ghost.png", "englishName" => "ghost"],
    ["id" => 45, "name" => "Acier", "image" => "https://static.wikia.nocookie.net/pokemongo/images/c/c9/Steel.png", "englishName" => "steel"],
    ["id" => 46, "name" => "Feu", "image" => "https://static.wikia.nocookie.net/pokemongo/images/3/30/Fire.png", "englishName" => "fire"],
    ["id" => 47, "name" => "Eau", "image" => "https://static.wikia.nocookie.net/pokemongo/images/9/9d/Water.png", "englishName" => "water"],
    ["id" => 48, "name" => "Plante", "image" => "https://static.wikia.nocookie.net/pokemongo/images/c/c5/Grass.png", "englishName" => "grass"],
    ["id" => 49, "name" => "Électrik", "image" => "https://static.wikia.nocookie.net/pokemongo/images/2/2f/Electric.png", "englishName" => "electric"],
    ["id" => 50, "name" => "Psy", "image" => "https://static.wikia.nocookie.net/pokemongo/images/2/21/Psychic.png", "englishName" => "psychic"],
    ["id" => 51, "name" => "Glace", "image" => "https://static.wikia.nocookie.net/pokemongo/images/7/77/Ice.png", "englishName" => "ice"],
    ["id" => 52, "name" => "Dragon", "image" => "https://static.wikia.nocookie.net/pokemongo/images/c/c7/Dragon.png", "englishName" => "dragon"],
    ["id" => 53, "name" => "Ténèbres", "image" => "https://static.wikia.nocookie.net/pokemongo/images/0/0e/Dark.png", "englishName" => "dark"],
    ["id" => 54, "name" => "Fée", "image" => "https://static.wikia.nocookie.net/pokemongo/images/4/43/Fairy.png", "englishName" => "fairy"]
];

$typeImages = array_column($typesData, null, 'name');

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/pokemon/detail.php';
include __DIR__ . '/../views/templates/footer.php';
