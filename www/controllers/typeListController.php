<?php
require_once __DIR__ . './../models/Type.php';

try {
    $allTypes = AllTypes();
    if ($allTypes === false) {
        throw new Exception('Données de l\'API non chargé.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header('Location: ./../404.php');
}

if (empty($error)) {
    include __DIR__ . './../views/type/list.php';
}
