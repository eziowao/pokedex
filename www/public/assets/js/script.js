const btnAddFavour = document.querySelectorAll(".add_in_favour");
const btnDeleteFavour = document.querySelectorAll(".delete_from_favour");
const searchInput = document.querySelector("#searchInput");
const searchResults = document.querySelector("#searchResults");
const header = document.querySelector("h1");

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

  setFavoritesInCookies(favorites);

  const pokemonDiv = document.querySelector("#pokemon" + pokemonId);
  pokemonDiv.remove();
};

const addPokemonToFavoritesCookies = (pokemonId) => {
  let favorites = getFavoritesFromCookies();
  if (!favorites.includes(pokemonId)) {
    favorites.push(pokemonId);
  }
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

const type = header.getAttribute("id");

const getResults = (e) => {
  let searchText = e.target.value;
  if (searchText.trim() === "") {
    searchResults.innerHTML = "";
  } else {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/controllers/searchController.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var results = JSON.parse(xhr.responseText);
        var resultsHTML = results
          .map(function (result) {
            return "<div>" + "<h3>" + result.name + "</h3>" + "<p>";
          })
          .join("");
        searchResults.innerHTML = resultsHTML;
      }
    };

    xhr.send(
      "query=" +
        encodeURIComponent(searchText) +
        "&type=" +
        encodeURIComponent(type)
    );
  }
};

btnAddFavour.forEach((button) => {
  button.addEventListener("click", getId);
});

btnDeleteFavour.forEach((button) => {
  button.addEventListener("click", getId);
});

searchInput.addEventListener("input", getResults);
