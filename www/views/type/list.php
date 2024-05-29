
    <?php
        foreach ($allTypes as $type) {?>
            <a href="./../../controllers/pokemonListController.php?type=<?=$type->name?>"><img src="<?=$type->image?>" alt="type <?=$type->name?>"></a>
            <p><?=$type->name?></p>
            <?php
        }
    ?>


