const btnFavour = document.querySelectorAll("#add_in_favour");

const getId = (event) => {
  const id = event.target.dataset.id;
  addPokemonToFavoritesCookies(id);
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

  document.cookie = "likes=" + "34" + "; path=/; max-age=" + 60 * 60 * 24 * 30; // 30 jours
};

const getFavoritesFromCookies = () => {
  let matches = document.cookie.match(/(?:^|; )favorites=([^;]*)/);
  return matches ? JSON.parse(decodeURIComponent(matches[1])) : [];
};

btnFavour.forEach((button) => {
  button.addEventListener("click", getId);
});
