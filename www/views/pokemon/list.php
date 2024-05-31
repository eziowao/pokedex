  <div class="my-3">
    <form class="row align-items-center justify-content-center m-0">
      <div class="col-10 col-md-8 col-lg-5 position-relative p-0">
        <input type="text" id="searchInput" class="w-100 form-control rounded-2 my-1" placeholder="Rechercher">
        <div id="searchResults" class="rounded-2 text-decoration-none text-center"></div>
      </div>
    </form>
    <!-- <form>
      <div class="col-10 col-lg-5">
        <div>
          <div>
            <input type="text" id="searchInput" class="form-control rounded-5 my-1" placeholder="Rechercher">
          </div>
        </div>
        <div>
          <div id="searchResults" class="rounded-2 text-decoration-none text-center"></div>
        </div>
      </div>
    </form> -->
  </div>

  <div class="container">
    <div class="mt-5">
      <a href="./../../controllers/typeListController.php"><i class="fa-solid fa-chevron-left"></i>retour aux types</a>
    </div>
    <div class="row justify-content-center">
      <h1 id="<?= $typeName ?>" class="text-center my-5"> <?= $typeName ?> </h1>

      <?php foreach ($listOfPokemons as $pokemon) : ?>
        <div class="type-<?= $typeClass ?> text-light card m-3 border-0" style="width: 286px; height: 334px">
          <div class="card-body">
            <div class="d-flex align-items-baseline ">
              <div class="col-10">
                <p class="fs-5 fw-semibold"><?= $pokemon->name; ?></p>
              </div>
              <div class="col-2 d-flex justify-content-end">
                <button class="btn-fav border-0" type="btn" data-id="<?= $pokemon->id ?>">
                  <?php if (isset($_COOKIE['favorites'])) {
                    if (!in_array($pokemon->id, $favorites)) { ?>
                      <i class="add_in_favour bi bi-star text-white" data-page="list" data-id="<?= $pokemon->id ?>"></i>
                    <?php } else { ?>
                      <i class="delete_from_favour bi bi-star-fill text-white" data-page="list" data-id="<?= $pokemon->id ?>"></i>
                  <?php }
                  } ?>
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