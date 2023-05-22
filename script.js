const dropdown = document.querySelector(".dropdown_menu");
const profileImg = document.querySelector(".logo");
const main = document.querySelector("body");
const hamburgerMenu = document.querySelector(".hamburger_menu");
const btn = document.querySelector(".menu-hamburger");

profileImg.addEventListener("click", () => {
  dropdown.style.display = "block";
  dropdown.style.transition = "0.3s";
});
btn.addEventListener("click", function () {
  dropDownMenu.classList.toggle("open");
});
main.addEventListener("click", function () {
  dropDownMenu.classList.remove(".dropdown_menu");
});
