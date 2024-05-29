<div>
    <?php if (isset($favoritePokemons)) {
        foreach ($favoritePokemons as $pokemon) { ?>
            <div><?= $pokemon ?></div>
        <?php
        }
    } else { ?>
        <div>Vous n'avez encore rien ajouté à votre liste de favoris</div>
    <?php } ?>
</div>