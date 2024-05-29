<?php
require_once __DIR__ . '/../models/Pokemon.php';

$id = intval($_GET['id']);

$pokemonDetail = pokemonInformation($id);

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/pokemon/detail.php';
include __DIR__ . '/../views/templates/footer.php';
