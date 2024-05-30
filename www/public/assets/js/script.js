// Sélectionner les éléments du DOM
const btnAddFavour = document.querySelectorAll(".add_in_favour");
//const btnDeleteFavour = document.querySelectorAll(".delete_from_favour");

const getId = (event) => {
  const id = event.target.dataset.id;
  const page = event.target.dataset.page;
  if (event.target.classList.contains("delete_from_favour")) {
    deletePokemonFromFavoritesCookies(id, page);
  } else {
    addPokemonToFavoritesCookies(id);
  }
};

const deletePokemonFromFavoritesCookies = (pokemonId, page) => {
  let favorites = getFavoritesFromCookies();
  if (favorites.includes(pokemonId)) {
    favorites = favorites.filter((favoriteId) => favoriteId !== pokemonId);
  }

  if (page == "list") {
    btnAddFavour.classList.toggle = "bi-star";
    btnAddFavour.classList.toggle = "bi-star-fill";
    btnAddFavour.classList.toggle = "add_from_favour";
    btnAddFavour.classList.toggle = "delete_from_favour";
  } else if (page == "favoris") {
    const pokemonDiv = document.querySelector("#pokemon" + pokemonId);
    pokemonDiv.remove();
  }

  setFavoritesInCookies(favorites);
};

const addPokemonToFavoritesCookies = (pokemonId) => {
  let favorites = getFavoritesFromCookies();
  if (!favorites.includes(pokemonId)) {
    favorites.push(pokemonId);
  }

  btnAddFavour.classList.toggle = "bi-star";
  btnAddFavour.classList.toggle = "bi-star-fill";
  btnAddFavour.classList.toggle = "add_from_favour";
  btnAddFavour.classList.toggle = "delete_from_favour";

  setFavoritesInCookies(favorites);
};

const setFavoritesInCookies = (data) => {
  document.cookie =
    "favorites=" +
    JSON.stringify(data) +
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

//btnDeleteFavour.forEach((button) => {
//  button.addEventListener("click", getId);
//});
