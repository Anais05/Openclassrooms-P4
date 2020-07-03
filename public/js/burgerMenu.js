var BurgerMenu = {
  burger: document.getElementById("bars"),
  menu: document.getElementById("menu"),
  body: document.getElementById("banniere"),
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
BurgerMenu.initBurger();
