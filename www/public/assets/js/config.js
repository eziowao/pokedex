// script.js
const btnToggleTheme = document.getElementById("toggle-theme");
const main = document.querySelector("main");

const changeMode = () => {
  const currentTheme = main.classList.contains("dark-mode")
    ? "dark-mode"
    : "light-mode";
  const newTheme = currentTheme === "dark-mode" ? "light-mode" : "dark-mode";

  main.classList.remove(currentTheme);
  main.classList.add(newTheme);

  document.cookie = `theme=${newTheme}; path=/; max-age=31536000`;
};

btnToggleTheme.addEventListener("click", changeMode);
