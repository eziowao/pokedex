<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>

<body>

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


    <p><?= $pokemonDetail->name ?></p>
    <img src="<?= $pokemonDetail->image ?>" alt="">
    <p>HP: <?= $pokemonDetail->stats->HP ?></p>

    <p><img src="<?=$infoEvolution->image??''?>" alt=""></p>

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
</body>

</html>