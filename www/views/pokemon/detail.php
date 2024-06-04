<body>
  <div class="container pt-4">
    <div class="pokemon-name <?= implode(' ', $typeClasses) ?> text-center py-3">
      <div class="d-flex justify-content-center align-items-center">
        <img src="<?= $pokemonDetail->sprite ?>" alt="sprite du pokemon">
        <h2 class="mx-3 mb-0"><?= $pokemonDetail->name ?></h2>
        <button class="btn-fav border-0" type="btn" data-id="<?= $pokemonDetail->id ?>">
          <?php if ($favorites) {
            if (!in_array($pokemonDetail->id, $favorites)) { ?>
              <i class="add_in_favour bi bi-star text-white fs-5" data-page="list" data-id="<?= $pokemonDetail->id ?>"></i>
            <?php } else { ?>
              <i class="delete_from_favour bi bi-star-fill text-white fs-5" data-page="list" data-id="<?= $pokemonDetail->id ?>"></i>
            <?php }
          } else { ?>
            <i class="add_in_favour bi bi-star text-white fs-5" data-page="list" data-id="<?= $pokemonDetail->id ?>"></i>
          <?php } ?>
        </button>
      </div>
      <p>Génération : <?= $pokemonDetail->apiGeneration ?></p>
    </div>

    <div class="pokemon-image text-center my-4">
      <img src="<?= $pokemonDetail->image ?>" alt="image du pokemon" class="img-fluid">
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="pokemon-stats">
          <h3>Stats :</h3>
          <ul>
            <li>HP: <?= $pokemonDetail->stats->HP ?></li>
            <li>Attaque : <?= $pokemonDetail->stats->attack ?></li>
            <li>Defense : <?= $pokemonDetail->stats->defense ?></li>
            <li>Attaque spéciale : <?= $pokemonDetail->stats->special_attack ?></li>
            <li>Défense spéciale : <?= $pokemonDetail->stats->special_defense ?></li>
            <li>Vitesse : <?= $pokemonDetail->stats->speed ?></li>
          </ul>
        </div>
      </div>

      <div class="col-md-4 text-center">
        <h3>Arbre d'évolution</h3>
        <div class="evolution-tree d-flex justify-content-center flex-wrap">
          <?php
          if ($pokemonDetail->apiPreEvolution != 'none' && !empty($pokemonDetail->apiPreEvolution)) {
            if ($pokemonPreEvolution->apiPreEvolution != 'none' && !empty($pokemonPreEvolution->apiPreEvolution)) { ?>
              <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $firstPokemon ?>"><img src="<?= $firstImage ?>" alt="1er Pokémon" class="img-fluid"></a></p>
            <?php } ?>
            <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idPreEvolution ?>"><img src="<?= $infoPreEvolution ?>" alt="Précédent Pokémon" class="img-fluid"></a></p>
          <?php } ?>
          <img src="<?= $pokemonDetail->sprite ?>" alt="image du pokemon" class="img-fluid">
          <?php
          if (count($pokemonDetail->apiEvolutions) > 1) {
            foreach ($evolutions as $key => $evolution) {
              $idPokemonEvolution = $evolution->pokedexId;
              $pokemonEvolution = pokemonInformation($idPokemonEvolution);
              $infoImageEvolutions = checkPreEvolution($pokemonEvolution); ?>
              <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idPokemonEvolution ?>"><img src="<?= $infoImageEvolutions ?>" alt="Pokémon suivant" class="img-fluid"></a></p>
            <?php }
          } elseif ($pokemonDetail->apiEvolutions != 'none' && !empty($pokemonDetail->apiEvolutions)) { ?>
            <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idEvolutions ?>"><img src="<?= $infoEvolutions ?>" alt="Pokémon suivant" class="img-fluid"></a></p>
            <?php if ($pokemonEvolutions->apiEvolutions != 'none' && !empty($pokemonEvolutions)) { ?>
              <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $lastPokemon ?>"><img src="<?= $lastImage ?>" alt="" class="img-fluid"></a></p>
            <?php } ?>
          <?php } ?>
        </div>
<<<<<<< HEAD
        <div class="d-flex justify-content-between">
            <div class="pokemon-stats ms-5">
                <h3>Stats :</h3>
                <ul>
                    <li>HP: <?= $pokemonDetail->stats->HP ?></li>
                    <li>Attaque : <?= $pokemonDetail->stats->attack ?></li>
                    <li>Defense : <?= $pokemonDetail->stats->defense ?></li>
                    <li>Attaque spéciale : <?= $pokemonDetail->stats->special_attack ?></li>
                    <li>Défense spéciale : <?= $pokemonDetail->stats->special_defense ?></li>
                    <li>Vitesse : <?= $pokemonDetail->stats->speed ?></li>
                </ul>
            </div>
            <div>
                <h3>Arbre d'évolution</h3>
                <?php
                if ($pokemonDetail->apiPreEvolution != 'none' && !empty($pokemonDetail->apiPreEvolution)) {
                  if ($pokemonPreEvolution->apiPreEvolution != 'none' && !empty($pokemonPreEvolution->apiPreEvolution)) {?>
                    <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $firstPokemon ?> "><img src="<?=$firstImage?>" alt="1er Pokémon"></a></p>
                    <?php
                  }?>
                  <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idPreEvolution ?> "><img src="<?=$infoPreEvolution?>" alt="Précédent Pokémon"></a></p>
                  <?php
                }
                ?>
                  <img src="<?= $pokemonDetail->sprite ?>" alt="image du pokemon">
                <?php
                if (count($pokemonDetail->apiEvolutions) > 1) {
                  foreach ($evolutions as $key => $evolution) {
                    $idPokemonEvolution = $evolution->pokedexId;
                    // Info Évolution
                    $pokemonEvolution = pokemonInformation($idPokemonEvolution);
                    // Récupération Image pokemon suivant
                    $infoImageEvolutions = checkPreEvolution($pokemonEvolution);?>
                    <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idPokemonEvolution ?> "><img src="<?=$infoImageEvolutions?>" alt="Pokémon suivant"></a></p>
                    <?php
                  }
                } elseif ($pokemonDetail->apiEvolutions != 'none' && !empty($pokemonDetail->apiEvolutions)) {?>
                  <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $idEvolutions ?> "><img src="<?=$infoEvolutions?>" alt="Pokémon suivant"></a></p>
                  <?php
                  if ($pokemonEvolutions->apiEvolutions != 'none' && !empty($pokemonEvolutions->apiEvolutions)) {?>
                  <p><a href="<?= '/controllers/pokemonDetailController.php?id=' . $lastPokemon ?> "><img src="<?=$lastImage?>" alt="2e Pokémon"></a></p>
                    <?php
                  }?>
                  <?php
                }
                ?>
            </div>
            <div class="pokemon-types me-5">
            <div class="resistance-section bg-light">
                <h3>Types :</h3>
                <?php foreach ($pokemonDetail->apiTypes as $type): ?>
                    <div class="d-inline-block text-center mr-2">
                        <img src="<?= htmlspecialchars($type->image) ?>" alt="<?= htmlspecialchars($type->name) ?>" title="<?= htmlspecialchars($type->name) ?>" class="img-fluid">
                        <h3><?= $type->name ?></h3>
                    </div>
                <?php endforeach; ?>
=======
      </div>

      <div class="col-md-4">
        <div class="pokemon-types">
          <div class="resistance-section bg-light p-3">
            <h3>Types :</h3>
            <?php foreach ($pokemonDetail->apiTypes as $type) : ?>
              <div class="d-inline-block text-center mr-2">
                <img src="<?= htmlspecialchars($type->image) ?>" alt="<?= htmlspecialchars($type->name) ?>" title="<?= htmlspecialchars($type->name) ?>" class="img-fluid">
                <h3><?= $type->name ?></h3>
>>>>>>> 1499e58f143657e55569f5614e8f8cfeb51c1c2f
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="resistance-section bg-light">
          <h3>Très faible à :</h3>
          <?php foreach ($pokemonDetail->apiResistances as $resistance) :
            if ($resistance->damage_multiplier == 4) : ?>
              <img src="<?= getTypeImage($resistance->name, $typeImages) ?>" class="type-icon" alt="<?= $resistance->name ?>">
              <span class="type-name"><?= $resistance->name ?></span><br>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="resistance-section bg-light">
          <h3>Faible à :</h3>
          <?php foreach ($pokemonDetail->apiResistances as $resistance) :
            if ($resistance->damage_multiplier == 2) : ?>
              <img src="<?= getTypeImage($resistance->name, $typeImages) ?>" class="type-icon" alt="<?= $resistance->name ?>">
              <span class="type-name"><?= $resistance->name ?></span><br>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="resistance-section bg-light">
          <h3>Résistant à :</h3>
          <?php foreach ($pokemonDetail->apiResistances as $resistance) :
            if ($resistance->damage_multiplier == 0.5) : ?>
              <img src="<?= getTypeImage($resistance->name, $typeImages) ?>" class="type-icon" alt="<?= $resistance->name ?>">
              <span class="type-name"><?= $resistance->name ?></span><br>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="resistance-section bg-light">
          <h3>Très résistant à :</h3>
          <?php foreach ($pokemonDetail->apiResistances as $resistance) :
            if ($resistance->damage_multiplier == 0.25) : ?>
              <img src="<?= getTypeImage($resistance->name, $typeImages) ?>" class="type-icon" alt="<?= $resistance->name ?>">
              <span class="type-name"><?= $resistance->name ?></span><br>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- !!!! Exemple de contenu de variable $pokemonDetail
    {
 "id": 850,
  "pokedexId": 850,
  "name": "Grillepattes",
  "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/850.png",
  "sprite": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/850.png",
  "slug": "Grillepattes",
  "stats": {
    "HP": 50,
    "attack": 65,
    "defense": 45,
    "special_attack": 50,
    "special_defense": 50,
    "speed": 45
  },
  "apiTypes": [
    {
      "name": "Insecte",
      "image": "https://static.wikia.nocookie.net/pokemongo/images/7/7d/Bug.png"
    },
    {
      "name": "Feu",
      "image": "https://static.wikia.nocookie.net/pokemongo/images/3/30/Fire.png"
    }
  ],
  "apiGeneration": 8,
  "apiResistances": [
    {
      "name": "Normal",
      "damage_multiplier": 1,
      "damage_relation": "neutral"
    },
    {
      "name": "Combat",
      "damage_multiplier": 0.5,
      "damage_relation": "resistant"
    }...
  ],
  "resistanceModifyingAbilitiesForApi": {
    "name": "Torche",
    "slug": "Torche"
  },
  "apiEvolutions": [
    {
      "name": "Scolocendre",
      "pokedexId": 851
    }
  ],
  "apiPreEvolution": "none",
  "apiResistancesWithAbilities": [
    {
      "name": "Normal",
      "damage_multiplier": 1,
      "damage_relation": "neutral"
    },
    {
      "name": "Combat",
      "damage_multiplier": 0.5,
      "damage_relation": "resistant"
    },
    {
      "name": "Vol",
      "damage_multiplier": 2,
      "damage_relation": "vulnerable"
    },
    {
      "name": "Poison",
      "damage_multiplier": 1,
      "damage_relation": "neutral"
    },
    {
      "name": "Sol",
      "damage_multiplier": 1,
      "damage_relation": "neutral"
    },
    {
      "name": "Roche",
      "damage_multiplier": 4,
      "damage_relation": "twice_vulnerable"
    }...
  ]
} -->