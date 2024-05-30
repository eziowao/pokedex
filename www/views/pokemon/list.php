  <div class="my-3">
    <form class="row align-items-center justify-content-center">
      <div class="col-10 col-md-8 col-lg-5">
        <input type="text" id="searchInput" class="form-control rounded-5 my-1" placeholder="Rechercher">
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
                <button class="btn-fav border-0" type="btn" data-id="<?= $pokemon->id ?>"><i class="add_in_favour bi bi-star" data-page="list" data-id="<?= $pokemon->id ?>"></i> </button>
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


  <!-- !!!! Exemple de contenu de variable $pokemon
    {
    "id": 7,
    "pokedexId": 7,
    "name": "Carapuce",
    "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/7.png",
    "sprite": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png",
    "slug": "Carapuce",
    "stats": {
      "HP": 44,
      "attack": 48,
      "defense": 65,
      "special_attack": 50,
      "special_defense": 64,
      "speed": 43
    },
    "apiTypes": [
      {
        "name": "Eau",
        "image": "https://static.wikia.nocookie.net/pokemongo/images/9/9d/Water.png"
      }
    ],
    "apiGeneration": 1,
    "apiResistances": [
      {
        "name": "Normal",
        "damage_multiplier": 1,
        "damage_relation": "neutral"
      },
      {
        "name": "Combat",
        "damage_multiplier": 1,
        "damage_relation": "neutral"
      }...
    ],
    "resistanceModifyingAbilitiesForApi": [],
    "apiEvolutions": [
      {
        "name": "Carabaffe",
        "pokedexId": 8
      }
    ],
    "apiPreEvolution": "none",
    "apiResistancesWithAbilities": []
  } -->
  <script src="../../public/assets/js/search.js"></script>
  </body>

  </html>