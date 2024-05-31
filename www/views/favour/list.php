<div class="container py-5">
  <div class="row justify-content-center">
    <h1 class="text-center">Vos favoris</h1>
    <?php if (!empty($favoritePokemons)) {
      foreach ($favoritePokemons as $pokemon) { ?>

        <div id="pokemon<?= $pokemon->id ?>" class="<?= $pokemon->typeClass ?> type-normal text-light card m-3 border-0">
          <div class="card-body">
            <div class="d-flex align-items-baseline ">
              <div class="col-10">
                <p class="fs-5 fw-semibold"><?= $pokemon->name; ?></p>
              </div>

              <button class="btn-fav border-0" type="btn" data-id="<?= $pokemon->id ?>"> <i id="favDelete" class="delete_from_favour bi bi-star-fill text-white" data-page="favoris" data-id="<?= $pokemon->id ?>"></i>
              </button>

            </div>
            <p> #0<?= $pokemon->pokedexId; ?></p>
            <div class="d-flex justify-content-center pt-4">
              <a href="<?= '/controllers/pokemonDetailController.php?id=' . $pokemon->id ?> ">
                <img src="<?= $pokemon->image ?>" height="150px" alt="">
              </a>
            </div>
            <a href="<?= '/controllers/pokemonDetailController.php?id=' . $pokemon->id ?>" class="text-decoration-none text-light">En savoir plus</a>
          </div>
        </div>
      <?php
      }
    } else { ?>
      <div class="my-5">
        <p class="text-center">Vous n'avez encore rien ajouté à votre liste de favoris</p>
      </div>
    <?php } ?>
  </div>
</div>