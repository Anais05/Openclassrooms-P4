function createChap() {
  var submit = document.getElementById("create");

  submit.addEventListener("click", function (e) {
    e.preventDefault();

    var title = document.getElementById("title").value;
    var content = document.getElementById("content").value;

    $.ajax({
      type: "POST",
      url: "createpost.php",
      data: {
        titre: title,
        texte: content,
      },

      success: function (code_html, statut) {
        $("#lala").html(
          "<p>le chapitre a été publié voir <a href='admin-view.php'>ici !</a></p>"
        );
        var form = document.getElementById("new_chap");
        form.style.display = "none";
      },
      error: function (resultat, statut, erreur) {
        $("#lala").html("<p>Erreur le chapitre n'a pas été posté !</p>");
      },
    });
  });
}

function updateChap() {
  var save = document.getElementById("btn-save");

  save.addEventListener("click", function (e) {
    e.preventDefault();
    var url_string = window.location.href;
    var url = new URL(url_string);
    var chapitre = url.searchParams.get("chap");
    console.log(chapitre);

    var contenu = document.getElementById("chap-update").innerHTML;
    var titre = document.getElementById("titre-update").innerHTML;
    console.log(contenu);
    console.log(titre);

    $.ajax({
      type: "POST",
      url: "update.php",
      data: {
        chap: chapitre,
        contenu: contenu,
        titre: titre,
      },

      success: function (code_html, statut) {
        window.location.href = "#mssg";
        $("#mssg").html(
          "<p class = 'mssg'>le chapitre a bien été modifier !</p>"
        );
      },
      error: function (resultat, statut, erreur) {
        window.location.href = "#mssg";
        $("#mssg").html(
          "<p class = 'mssg'>Erreur le chapitre n'a pas été modifier !</p>"
        );
      },
    });
  });
}

function deleteChap() {
  var deletebtn = document.getElementById("btn-delete");

  deletebtn.addEventListener("click", function (e) {
    e.preventDefault();
    var url_string = window.location.href;
    var url = new URL(url_string);
    var chapitre = url.searchParams.get("chap");
    console.log(chapitre);
    var edit = document.getElementById("edit");

    $.ajax({
      type: "POST",
      url: "delete.php",
      data: {
        chap: chapitre,
      },

      success: function (code_html, statut) {
        window.location.href = "#mssg";
        $("#mssg").html(
          "<p class = 'mssg'>Le chapitre a bien été supprimer !</p>"
        );
      },
      error: function (resultat, statut, erreur) {
        window.location.href = "#mssg";
        $("#mssg").html(
          "<p class = 'mssg'>Erreur le chapitre n'a pas été supprimer !</p>"
        );
      },
    });
  });
}

function deleteComm() {
  var supprimer = document.getElementById("supp-comm");

  if (supprimer != null && supprimer.length < 1) {
    for (var i = 0; i < signaler.length; i++) {
      supprimer[i].addEventListener("click", function (e) {
        var commentaireId2 = e.target.id;

        $.ajax({
          type: "POST",
          url: "supprimer.php",
          data: {
            commentaire: commentaireId2,
          },
          success: function (code_html, statut) {
            $("#mssg2").html("<p>Le commentaire a bien été supprimé !</p>");
          },
          error: function (resultat, statut, erreur) {
            $("#mssg2").html(
              "<p>Erreur le commentaire n'a pas été supprimé !</p>"
            );
          },
        });
      });
    }
  }
}

function postComm(e) {
  submit.addEventListener("click", function (e) {
    e.preventDefault();
    var url_string = window.location.href;
    var url = new URL(url_string);
    var chptr = url.searchParams.get("chap");
    console.log(chptr);

    var membre = document.getElementById("membre-id").value;
    var comm = document.getElementById("comment").value;

    $.ajax({
      type: "POST",
      url: "chapitres.php",
      data: {
        chap: chptr,
        membre: membre,
        commentaire: comm,
      },

      success: function (code_html, statut) {
        $("#mssg3").html("<p>Votre commentaire a bien été posté !</p>");
        $(".leComm:last").after(code_html);
      },
      error: function (resultat, statut, erreur) {
        $("#mssg3").html("<p>Erreur le commentaire n'a pas été posté !</p>");
      },
    });
  });
}

function reportComm() {
  var signaler = document.getElementsByClassName("signaler");

  if (signaler != null) {
    for (var i = 0; i < signaler.length; i++) {
      signaler[i].addEventListener("click", function (e) {
        var commentaireId = e.target.id;

        $.ajax({
          type: "POST",
          url: "signaler.php",
          data: {
            commentaire: commentaireId,
          },
          success: function (code_html, statut) {
            $("#mssg2").html("<p>Le commentaire a bien été signalé !</p>");
          },
          error: function (resultat, statut, erreur) {
            $("#mssg2").html(
              "<p>Erreur le commentaire n'a pas été signalé !</p>"
            );
          },
        });
      });
    }
  }
}
