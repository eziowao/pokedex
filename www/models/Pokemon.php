<?php
require_once __DIR__ . '/../config/config.php';

function allPokemonsOfSameType($type)
{
    $linkApi = ONE_TYPE_POKEMONS . $type;
    $json = file_get_contents($linkApi);
    $data = json_decode($json);
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