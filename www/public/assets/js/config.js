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

// gestion effet toggle 

btnToggleTheme.onclick = function () {
  btnToggleTheme.classList.toggle('active');
};

const getCookie = (name) => {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
  return null;
};

const initTheme = () => {
  const savedTheme = getCookie('theme') || 'light-mode';
  main.classList.add(savedTheme);
  if (savedTheme === 'dark-mode') {
    btnToggleTheme.classList.add('active');
  }
};

initTheme();