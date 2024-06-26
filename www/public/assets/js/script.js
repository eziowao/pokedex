// Sélectionner les éléments du DOM
const btnAddFavour = document.querySelectorAll(".add_in_favour");
const btnDeleteFavour = document.querySelectorAll(".delete_from_favour");

document.addEventListener("DOMContentLoaded", function () {
  const backToTop = document.getElementById("back-to-top");

  // Afficher/masquer le bouton lors du défilement de la page
  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      backToTop.classList.add("d-block");
      backToTop.classList.remove("d-none");
    } else {
      backToTop.classList.remove("d-block");
      backToTop.classList.add("d-none");
    }
  });

  // Défilement fluide lorsque l'utilisateur clique sur un bouton
  backToTop.addEventListener("click", function (event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
});

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

//https://fr.javascript.info/cookie
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
