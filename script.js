const dropdown = document.querySelector(".dropdown_menu");
const profileImg = document.querySelector(".logo");
const main = document.querySelector("body");

profileImg.addEventListener("click", () => {
  dropdown.style.display = "block";
  dropdown.style.transition = "0.3s";
});
