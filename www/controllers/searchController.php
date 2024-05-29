<?php
require_once __DIR__ . '/../models/Pokemon.php';

header('Content-Type: application/json');
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$searchText = isset($_POST['query']) ? $_POST['query'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';

$listOfPokemons = allPokemonsOfSameType($type);

if ($searchText === '') {
    echo json_encode([]);
    exit();
}

$results = array_filter($listOfPokemons, function ($pokemon) use ($searchText) {
    $pattern = '/\b' . preg_quote(strtolower($searchText), '/') . '/';
    return preg_match($pattern, strtolower($pokemon->name));
});

echo json_encode(array_values($results));
