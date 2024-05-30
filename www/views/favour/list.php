<main>

  <div class="container my-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Vos favoris</h1>
      <?php if (isset($favoritePokemons)) {
        foreach ($favoritePokemons as $pokemon) { ?>

          <div id="pokemon<?= $pokemon->id ?>" class="type-normal text-light card m-3 border-0" style="width: 286px; height: 334px">
            <div class="card-body">
              <div class="d-flex align-items-baseline ">
                <div class="col-10">
                  <p class="fs-5 fw-semibold"><?= $pokemon->name; ?></p>
                </div>

                <button class="btn-fav border-0" type="btn" data-id="<?= $pokemon->id ?>"> <i id="favDelete" class="delete_from_favour bi bi-star-fill" data-page="favoris" data-id="<?= $pokemon->id ?>"></i>
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
        <div>Vous n'avez encore rien ajouté à votre liste de favoris</div>
      <?php } ?>
    </div>
  </div>
</main>

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