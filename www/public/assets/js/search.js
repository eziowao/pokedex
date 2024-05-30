const searchInput = document.querySelector("#searchInput");
const searchResults = document.querySelector("#searchResults");
const header = document.querySelector("h1");
const type = header.getAttribute("id");

let debounceTimer;
const debounce = (func, delay) => {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(func, delay);
};

const getResults = (e) => {
  let searchText = e.target.value;
  searchText = removeAccent(searchText);

  debounce(() => {
    if (searchText.trim() === "") {
      searchResults.innerHTML = "";
    } else {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "/controllers/searchController.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          let results = JSON.parse(xhr.responseText);
          let resultsHTML = results
            .map(function (result) {
              return `<div><a class="text-light text-decoration-none" href="controllers/pokemonDetailController.php?id=${result.id}">${result.name}</a></div>`;
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
  }, 300); // 300ms delay
};

// if (searchText.trim() === "") {
//   searchResults.innerHTML = "";
// } else {
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "/controllers/searchController.php", true);
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//   xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//       let results = JSON.parse(xhr.responseText);
//       let resultsHTML = results
//         .map(function (result) {
//           return `<div><a href="controllers/pokemonDetailController.php?id=${result.id}">${result.name}</a></div>`;
//         })
//         .join("");
//       if (searchText.trim() === "") {
//         searchResults.innerHTML = "";
//       } else {
//         searchResults.innerHTML = resultsHTML;
//       }
//     }
//   };

//   xhr.send(
//     "query=" +
//       encodeURIComponent(searchText) +
//       "&type=" +
//       encodeURIComponent(type)
//   );
// }
// };

const removeAccent = (str) => {
  const normalizedStr = str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
  return normalizedStr;
};

searchInput.addEventListener("input", getResults);
