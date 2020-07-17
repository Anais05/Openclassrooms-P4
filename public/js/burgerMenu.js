var BurgerMenu = {
  burger: document.getElementById("bars"),
  menu: document.getElementById("menu"),
  estFerme: true,

  initBurger: function () {
    this.burger.addEventListener("click", function () {
      if (BurgerMenu.estFerme == true) {
        BurgerMenu.menu.style.display = "block";
        BurgerMenu.estFerme = false;
      } else if (BurgerMenu.estFerme == false) {
        BurgerMenu.menu.style.display = "none";
        BurgerMenu.estFerme = true;
      }
    });
    this.menu.addEventListener("click", function () {
      BurgerMenu.menu.style.display = "none";
      BurgerMenu.estFerme = true;
    });
  },
};
if (window.matchMedia("(max-width: 800px)").matches) {
  BurgerMenu.initBurger();
}
