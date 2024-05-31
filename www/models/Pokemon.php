<?php
require_once __DIR__ . '/../config/config.php';

function allPokemonsOfSameType($type)
{
    // $ch = curl_init(ONE_TYPE_POKEMONS);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // var_dump(curl_exec($ch));

    $linkApi = ONE_TYPE_POKEMONS . $type;
    if (!$linkApi) {
        $data = false;
    }else {
        $json = @file_get_contents($linkApi);
        $data = json_decode($json);
    }
    return $data; // tableau d'objets
}

function pokemonInformation($id)
{
    $linkApi = POKEMON_INFORMATION . $id;
    $json = file_get_contents($linkApi);
    $data = json_decode($json);
    return $data; // objet
}

function getPicture($pokemon)
{
    $spritePokemon = $pokemon->sprite;
    return $spritePokemon;
}

function checkPreEvolution($id)
{
    $pokemonPicture = getPicture($id);
    return $pokemonPicture;
}