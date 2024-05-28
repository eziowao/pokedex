<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokedex</title>
</head>

<body>
  <?php foreach ($listOfPokemons as $pokemon) : ?>
    <li><?= $pokemon->name; ?></li>
    <img src="<?= $pokemon->image ?>" alt="">
    <a href="<?= '/controllers/pokemonDetailController.php?id=' . $pokemon->id ?> ">Clic</a>
    <button id="add_in_favour" type="btn" data-id="<?= $pokemon->id ?>">Ajouter aux favoris</button>
  <?php endforeach ?>
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
  <script src="../../public/assets/js/script.js"></script>
</body>

</html>