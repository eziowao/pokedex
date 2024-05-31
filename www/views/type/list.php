<div class="container">
    <div class="row justify-content-center py-5">
        <div class="pokeball"></div>
    </div>
    <h1 class="text-center py-5">Choisissez un type !</h1>
    <div class="row justify-content-center">

        <?php
        foreach ($allTypes as $type) { ?>
            <div class="col-6 col-md-4 col-lg-3 text-center my-3">
                <div>
                    <a href="./../../controllers/pokemonListController.php?type=<?= $type->id ?>"><img class="list-pokemon-img" src="<?= $type->image ?>" alt="type <?= $type->name ?>" height="150px"></a>
                </div>
                <div>
                    <p><?= $type->name ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


</div>