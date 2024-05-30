// Sélectionner les éléments du DOM
const searchInput = document.querySelector("#searchInput");
const searchResults = document.querySelector("#searchResults");
const header = document.querySelector("h1");
const type = header.getAttribute("id");

// Fonction de débounce pour limiter la fréquence des appels de la fonction
//https://grafikart.fr/tutoriels/debounce-throttle-642
let debounceTimer;
const debounce = (func, delay) => {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(func, delay);
};

// Fonction principale pour récupérer et afficher les résultats de la recherche
const getResults = (e) => {
  let searchText = e.target.value; // Récupérer la valeur saisie par l'utilisateur
  searchText = removeAccent(searchText); // Supprimer les accents de la valeur saisie

  debounce(() => {
    if (searchText.trim() === "") {
      // Si le champ de recherche est vide, effacer les résultats de la recherche
      searchResults.innerHTML = "";
    } else {
      // Créer un nouvel objet XMLHttpRequest pour envoyer une requête au serveur
      //https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest
      //https://fr.javascript.info/xmlhttprequest
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "/controllers/searchController.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          // Si la requête est terminée et a réussi
          let results = JSON.parse(xhr.responseText);
          // Générer le HTML des résultats
          let resultsHTML = results
            .map(function (result) {
              return `<div><a class="search_bar_result text-decoration-none" href="controllers/pokemonDetailController.php?id=${result.id}">${result.name}</a></div>`;
            })
            .join("");
          searchResults.innerHTML = resultsHTML;
        }
      };

      //// Envoyer la requête POST avec les données de recherche et le type de Pokémon (xhr.open)
      xhr.send(
        "query=" +
        encodeURIComponent(searchText) +
        "&type=" +
        encodeURIComponent(type)
      );
    }
  }, 300); // 300ms delay
};

//fonction pour supprimer les accents des lettres
const removeAccent = (str) => {
  const normalizedStr = str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  return normalizedStr;
};

searchInput.addEventListener("input", getResults);
