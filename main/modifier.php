<?php 
$title = "Modification chapitre"; 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta property="og:title" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />

        <link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel = "stylesheet" type = "text/css" / >
	    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

	    <! - Inclure le style de l'éditeur. ->
	    <link href = "https://cdn.jsdelivr.net/npm/froala-editor@2.9.6/css/froala_editor.pkgd.min.css" rel = "stylesheet" type = "text/css" />
	    <link href = "https://cdn.jsdelivr.net/npm/froala-editor@2.9.6/css/froala_style.min.css" rel = "stylesheet" type = "text/css" />
    </head>

        <title>Modifier</title>
    </head>

    <body>
 
    	<textarea id="edit">
    		<?php

				try
				    {
				        $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
				    }
				    catch (Exception $e)
				    {
				            die('Erreur : ' . $e->getMessage());
				    }

				    // verifie que l'id passé existe et est de type numeric
					if(isset($_GET['chap']) AND is_numeric($_GET['chap'])) {
					     
					    // recupere les details du chapitre en fonction de l'id
					    $req = $bdd->prepare('SELECT * FROM chapitres WHERE id=?');
					    $req->execute(array($_GET['chap']));

					   
					    $resultat = $req->fetch();
					    echo "<p id ='titre-update'>" . htmlspecialchars($resultat['titre']) . "</p>" ;
			    		echo "<p id = 'chap-update'>  ".htmlspecialchars($resultat['texte']) . "</p>";
					}

            ?>
    	</textarea>
    	
    	<div id="button">
	    	<button id="btn-save" >Enregistrer</button> 
	    	<button id="btn-delete">Supprimer</button>
	    	<a id="retour" href="admin-view.php">Retour</a>
    	</div>

    	<div id="mssg"></div>

    	<script type="text/javascript">

    		
			var save = document.getElementById("btn-save");

    		save.addEventListener("click", function(e)
    		{
    			e.preventDefault();
    			var url_string = window.location.href;
				var url = new URL(url_string);
				var chapitre = url.searchParams.get("chap");
				console.log(chapitre);

			    var contenu = document.getElementById("chap-update").innerHTML;
			    var titre = document.getElementById("titre-update").innerHTML;
			    console.log(contenu);
			    console.log(titre);
  


			 
			    $.ajax(
			    {
			        type: "POST",
			        url: "update.php",
			        data: 
			        {
			        	chap:chapitre, 
			        	contenu:contenu, 
			        	titre:titre
			        },

			        success : function(code_html, statut)
			        {
			        	window.location.href = "#mssg";
			        	$("#mssg").html("<p class = 'mssg'>le chapitre a bien été modifier !</p>")
			        },
			        error : function(resultat, statut, erreur)
			        {
			        	window.location.href = "#mssg";
			        	$("#mssg").html("<p class = 'mssg'>Erreur le chapitre n'a pas été modifier !</p>")
			        },

                	
   	    		});
			});
 
               
         
    	</script>


    	<script type="text/javascript">

    		
			var deletebtn= document.getElementById("btn-delete");

    		deletebtn.addEventListener("click", function(e)
    		{
    			e.preventDefault();
    			var url_string = window.location.href;
				var url = new URL(url_string);
				var chapitre = url.searchParams.get("chap");
				console.log(chapitre);
				var edit = document.getElementById("edit");

			 
			    $.ajax(
			    {
			        type: "POST",
			        url: "delete.php",
			        data: 
			        {
			        	chap:chapitre, 
			        	
			        },

			        success : function(code_html, statut)
			        {
			        	window.location.href = "#mssg";
			        	edit.style.display = "none";
			        	$("#mssg").html("<p class = 'mssg'>Le chapitre a bien été supprimer !</p>")
			        },
			        error : function(resultat, statut, erreur)
			        {
			        	window.location.href = "#mssg";
			        	edit.style.display = "none";
			        	$("#mssg").html("<p class = 'mssg'>Erreur le chapitre n'a pas été supprimer !</p>")

			        },

                	
   	    		});
			});
 
               
         
    	</script>





    	









		<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
		<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"> </script>
		<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"> </script>

		<! - Inclure les fichiers JS de l'éditeur. ->
		<script type = "text/javascript" src = "https://cdn.jsdelivr.net/npm/froala-editor@2.9.6/js/froala_editor.pkgd.min.js"> </script>

		<! - Initialise l'éditeur. ->
		<script> $ (function () {$ ('textarea'). froalaEditor ()}); </script>
	</body>
</html>