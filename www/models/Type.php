<?php
require_once __DIR__ . './../config/config.php';

// Fonction pour les différents type de Pokémons
function AllTypes()
{
    // json pour les types
    $json = @file_get_contents(POKEMON_TYPES);
    if ($json === false) {
        $types = false;
    } else {
        $types = json_decode($json);
    }
    return $types;
}

function getTypeClasses($pokemonTypes) {
    $allTypes = AllTypes();
    $classes = [];
    if ($allTypes && $pokemonTypes) {
        foreach ($allTypes as $type) {
            foreach ($pokemonTypes as $pokemonType) {
                if ($type->name === $pokemonType->name) {
                    $name = isset($type->englishName) ? $type->englishName : '';
                    $classes[] = 'bg-' . strtolower($name);
                }
            }
        }
    }
    return $classes;
}

