// Sélectionner les éléments du DOM
const btnAddFavour = document.querySelectorAll(".add_in_favour");
const btnDeleteFavour = document.querySelectorAll(".delete_from_favour");

const getId = (event) => {
  const id = event.target.dataset.id;
  const page = event.target.dataset.page;
  const btn = event.target;
  if (event.target.classList.contains("delete_from_favour")) {
    deletePokemonFromFavoritesCookies(id, page, btn);
  } else {
    addPokemonToFavoritesCookies(id, btn);
  }
};

const deletePokemonFromFavoritesCookies = (pokemonId, page, btn) => {
  let favorites = getFavoritesFromCookies();
  if (favorites.includes(pokemonId)) {
    favorites = favorites.filter((favoriteId) => favoriteId !== pokemonId);
  }

  if (page == "list") {
    btn.classList.toggle("bi-star");
    btn.classList.toggle("bi-star-fill");
    btn.classList.toggle("add_from_favour");
    btn.classList.toggle("delete_from_favour");
  } else if (page == "favoris") {
    const pokemonDiv = document.querySelector("#pokemon" + pokemonId);
    pokemonDiv.remove();
  }

  setFavoritesInCookies(favorites);
};

const addPokemonToFavoritesCookies = (pokemonId, btn) => {
  let favorites = getFavoritesFromCookies();
  if (!favorites.includes(pokemonId)) {
    favorites.push(pokemonId);
  }

  btn.classList.toggle("bi-star");
  btn.classList.toggle("bi-star-fill");
  btn.classList.toggle("add_from_favour");
  btn.classList.toggle("delete_from_favour");

  setFavoritesInCookies(favorites);
};

const setFavoritesInCookies = (data) => {
  document.cookie =
    "favorites=" + JSON.stringify(data) + "; path=/; max-age=31536000";
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
