<?php 
$title = "Nouveau chapitre"; ?>
<link rel="stylesheet" type="text/css" href="../CSS/stylesheet2.css">


<?php ob_start(); ?>

<section id="creation">
	<div class="formulaire">
		<form id="new_chap" action="createpost.php" method="post">
			<h1 class="titre-form">Ajouter un chapitre</h1>
			<label for="title">Titre</label>
			<input type="text" name="title" id="title" /></br>
			<label for="content">Texte</label>
			<textarea  id="content" name="content" rows="30" cols="180"></textarea>
			<input id="create" type="submit" value="Poster" />
		</form>
    </div>
</section>

<div id="lala"></div>


<script type="text/javascript">
	    		var submit = document.getElementById("create");

	    		submit.addEventListener("click", function(e)
	    		{
	    			e.preventDefault();

				    var title = document.getElementById("title").value;
				    var content = document.getElementById("content").value;
				    console.log(title);
				    console.log(content);
				 
				    $.ajax({
				        type: "POST",
				        url: "create.php",
				        data: 
				        {
				        	titre:title, 
				        	texte:content
				        },

				        success : function(code_html, statut)
				        {
				        	$("#lala").html("<p>le chapitre a été publié voir <a href='admin-view.php'>ici !</a></p>");
				        	var form = document.getElementById("new_chap");
				        	form.style.display = "none";
				        },
				        error : function(resultat, statut, erreur)
				        {
				        	$("#lala").html("<p>Erreur le chapitre n'a pas été posté !</p>");
				        }
		    		});
		    	})

	    	</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>




