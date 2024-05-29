const btnAddFavour = document.querySelectorAll(".add_in_favour");
const btnDeleteFavour = document.querySelectorAll(".delete_from_favour");

const getId = (event) => {
  const id = event.target.dataset.id;

  if (event.target.classList.contains("delete_from_favour")) {
    deletePokemonFromFavoritesCookies(id);
  } else {
    addPokemonToFavoritesCookies(id);
  }
};

const deletePokemonFromFavoritesCookies = (pokemonId) => {
  let favorites = getFavoritesFromCookies();
  if (favorites.includes(pokemonId)) {
    favorites = favorites.filter((favoriteId) => favoriteId !== pokemonId);
  }

  document.cookie =
    "favorites=" +
    JSON.stringify(favorites) +
    "; path=/; max-age=" +
    60 * 60 * 24 * 30; // 30 jours

  const pokemonDiv = document.querySelector("#pokemon" + pokemonId);
  pokemonDiv.remove();
};

const addPokemonToFavoritesCookies = (pokemonId) => {
  let favorites = getFavoritesFromCookies();
  if (!favorites.includes(pokemonId)) {
    favorites.push(pokemonId);
  }
  document.cookie =
    "favorites=" +
    JSON.stringify(favorites) +
    "; path=/; max-age=" +
    60 * 60 * 24 * 30; // 30 jours
};

const getFavoritesFromCookies = () => {
  let matches = document.cookie.match(/(?:^|; )favorites=([^;]*)/);
  return matches ? JSON.parse(decodeURIComponent(matches[1])) : [];
};

btnAddFavour.forEach((button) => {
  button.addEventListener("click", getId);
});

btnDeleteFavour.forEach((button) => {
  button.addEventListener("click", getId);
});
