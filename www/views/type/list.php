<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <?php
    foreach ($allTypes as $type) { ?>
        <a href="./../../controllers/pokemonListController.php?type=<?= $type->id ?>"><img src="<?= $type->image ?>" alt="type <?= $type->name ?>"></a>
        <p><?= $type->name ?></p>
    <?php
    }
    ?>

</body>

</html>