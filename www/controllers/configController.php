<?php
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light-mode';

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/user/config.php';
include __DIR__ . '/../views/templates/footer.php';
