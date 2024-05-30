<div class="container mt-4">
  <div class="pokemon-name <?= implode(' ', $typeClasses) ?> d-flex flex-column align-items-center py-3">
    <div class="d-flex align-items-center">
      <img src="<?= $pokemonDetail->sprite ?>" alt="sprite du pokemon">
      <h2 class="mx-3 mb-0 text-white"><?= $pokemonDetail->name ?></h2>
      <button class="btn-fav border-0" type="btn" data-id="<?= $pokemonDetail->id ?>">
        <?php if (isset($_COOKIE['favorites'])) {
          if (!in_array($pokemonDetail->id, $favorites)) { ?>
            <i class="add_in_favour bi bi-star fs-5 text-white" data-page="list" data-id="<?= $pokemonDetail->id ?>"></i>
          <?php } else { ?>
            <i class="delete_from_favour bi bi-star-fill  fs-5 text-white" data-page="list" data-id="<?= $pokemonDetail->id ?>"></i>
        <?php }
        } ?>
      </button>
    </div>
    <p class=" text-white">Génération : <?= $pokemonDetail->apiGeneration ?></p>
  </div>
  <div class="pokemon-image text-center my-4">
    <img src="<?= $pokemonDetail->image ?>" alt="image du pokemon">
  </div>
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
    </div>
    <div class="pokemon-types me-5">
      <div class="resistance-section bg-light">
        <h3>Types :</h3>
        <?php foreach ($pokemonDetail->apiTypes as $type) : ?>
          <div class="d-inline-block text-center mr-2">
            <img src="<?= htmlspecialchars($type->image) ?>" alt="<?= htmlspecialchars($type->name) ?>" title="<?= htmlspecialchars($type->name) ?>" class="img-fluid">
            <h3><?= $type->name ?></h3>
          </div>
        <?php endforeach; ?>
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