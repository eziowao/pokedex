<div class="py-3">
  <form class="row align-items-center justify-content-center">
    <div class="col-8 col-lg-5 form-control-container p-0">
      <input type="text" id="searchInput" class="form-control rounded-5 my-1" placeholder="Rechercher">
      <div id="searchResults" class="text-decoration-none text-center"></div>
    </div>
  </form>
</div>



<div class="container">
  <div class="row justify-content-center">
    <a class="returnLink" href="http://localhost:8098/accueil"> <i class="bi bi-arrow-left"></i> Revenir aux types</a>
    <h1 id="<?= $typeName ?>" class="text-center my-5"> <?= $typeName ?> </h1>

    <?php foreach ($listOfPokemons as $pokemon) : ?>
      <div class="type-<?= $typeClass ?> text-light card m-3 border-0">
        <div class="card-body">
          <div class="d-flex align-items-baseline ">
            <div class="col-10">
              <p class="fs-5 fw-semibold"><?= $pokemon->name; ?></p>
            </div>
            <div class="col-2 d-flex justify-content-end">
              <button class="btn-fav border-0" type="btn" data-id="<?= $pokemon->id ?>">
                <?php if ($favorites) {
                  if (!in_array($pokemon->id, $favorites)) { ?>
                    <i class="add_in_favour bi bi-star text-white" data-page="list" data-id="<?= $pokemon->id ?>"></i>
                  <?php } else { ?>
                    <i class="delete_from_favour bi bi-star-fill text-white" data-page="list" data-id="<?= $pokemon->id ?>"></i>
                  <?php }
                } else { ?>
                  <i class="add_in_favour bi bi-star text-white" data-page="list" data-id="<?= $pokemon->id ?>"></i>
                <?php } ?>
              </button>
            </div>

          </div>
          <p> #0<?= $pokemon->pokedexId; ?></p>
          <div class="d-flex justify-content-center pt-4">
            <a href="<?= '/controllers/pokemonDetailController.php?id=' . $pokemon->id ?> ">
              <img src="<?= $pokemon->image ?>" height="150px" alt="">
            </a>
          </div>
        </div>

      </div>
    <?php endforeach ?>

  </div>
</div>
<script src="../../public/assets/js/search.js"></script>
</body>

</html>