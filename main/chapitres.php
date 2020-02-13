<?php 
$title = "Affichage chapitres"; ?>
<?php ob_start(); 
session_start()
?>



<link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
<link rel="stylesheet" type="text/css" href="../CSS/stylesheet2.css">


	<div class ="LeChapitre">

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
				    echo "<p class ='titre-chap'>" . htmlspecialchars($resultat['titre']) . "</p>" ;
				    echo "<p class = 'date'> Publié le : ".htmlspecialchars($resultat['date_post']) . "</p>";
			        echo "<p class ='chap'>". htmlspecialchars($resultat['texte']) . "</p>"; 
				}

		?>

	</div>


	<div class="LesCommentaires">
		<div id="petit-trait"></div>
		<h3>Commentaires</h3>

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
					 // recupere les commentaires en fonction de l'id
				    $reponse = $bdd->prepare("
				    	SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm
				    	FROM commentaires 
				    	INNER JOIN membres ON commentaires.id_membre = membres.id 
				    	WHERE id_post=?");
				    $reponse->execute(array($_GET['chap']));


			        while ($donnees = $reponse->fetch())
	                    {
	                    	echo "<div class = 'leComm' id='".$donnees['id_comm']."'>";
	                        echo "<p class ='membre'>" . htmlspecialchars($donnees['pseudo']) . "</p>" ;
					        echo "<p class ='comm'>". htmlspecialchars($donnees['commentaire']) . "</p>";
					        echo "<p class = 'dateCommentaire'> Publié le : ".htmlspecialchars($donnees['date_ajout']) . "</p>";
					        echo "</div>";
					        if (isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
					        {
					        	echo "<button class ='supp-comm' id=".$donnees['id_comm'].">Supprimer le commentaire </button>";
					        }
					        else if (isset($_SESSION["pseudo"]))
					        {
					        	echo "<button class ='signaler' id=".$donnees['id_comm'].">Signaler le commentaire</button>";
					        }
					        echo "<div id ='mssg2'><div>";
					        
	                    }

				    $reponse->closeCursor();
	            }
		?>	


		<script type="text/javascript">

	    		var signaler = document.getElementsByClassName("signaler");

	    		if (signaler != null ) {
	    			for (var i = 0; i < signaler.length ; i+=2) 
	    			{
			    		signaler[i].addEventListener("click", function(e)
			    		{
			    			console.log(e.target.id);

						    var commentaireId = e.target.id;
						 
						    $.ajax({
						        type: "POST",
						        url: "signaler.php",
						        data: 
						        {
						        	commentaire:commentaireId
						        },
						        success : function(code_html, statut)
						        {
						        	$("#mssg2").html("<p>Le commentaire a bien été signalé !</p>");
						        },
						        error : function(resultat, statut, erreur)
						        {
						        	$("#mssg2").html("<p>Erreur le commentaire n'a pas été signalé !</p>");
						        }
				    		});
				    	})
			        }
			    }
			    

	    	</script>


	    	<script type="text/javascript">

	    		var supprimer = document.getElementById("supp-comm");

	    		if (supprimer != null && supprimer.length < 1) {

		    		supprimer.addEventListener("click", function(e)
		    		{

					    //commentaire.style.color = "red";
					    var element2 = document.getElementById(event.target.id); 
					    var commentaireId2 = element2.getAttribute("supp");
					 
					    $.ajax({
					        type: "POST",
					        url: "supprimer.php",
					        data: 
					        {
					        	commentaire:commentaireId2
					        },
					        success : function(code_html, statut)
					        {
					        	$("#mssg2").html("<p>Le commentaire a bien été supprimé !</p>");
					        },
					        error : function(resultat, statut, erreur)
					        {
					        	$("#mssg2").html("<p>Erreur le commentaire n'a pas été supprimé !</p>");
					        }
			    		});
			    	})
			    }
			    

	    	</script>








	    <div id="mssg2"></div>


		<div class="formulaire-comm">
			<form id="new-comm" action="chapitres.php" method="post">
				<h1 class="titre-form">Laisser un commentaire</h1>
				<input type="hidden" name="membre" id="membre-id" value=<?php if (isset($_SESSION['pseudo'])){echo $_SESSION['id'];}?>>
				<label for="content">Commentaire</label>
				<textarea name="content" rows="5" cols="180" id="comment"></textarea>
				<input type="submit" id ="submit" value="Poster" />
			</form>


			<script type="text/javascript">
	    		var submit = document.getElementById("submit");

	    		submit.addEventListener("click", function(e)
	    		{
	    			e.preventDefault();
	    			var url_string = window.location.href;
					var url = new URL(url_string);
					var chptr = url.searchParams.get("chap");
					console.log(chptr);

				    var membre = document.getElementById("membre-id").value;
				    var comm = document.getElementById("comment").value;
				    console.log(membre);
				    console.log(comm);
				 
				    $.ajax({
				        type: "POST",
				        url: "comment.php",
				        data: 
				        {
				        	chap:chptr, 
				        	membre:membre, 
				        	commentaire:comm
				        },

				        success : function(code_html, statut)
				        {
				        	$("#mssg3").html("<p>Votre commentaire a bien été posté !</p>");
				        	$('.leComm:last').after(code_html);
				        },
				        error : function(resultat, statut, erreur)
				        {
				        	$("#mssg3").html("<p>Erreur le commentaire n'a pas été posté !</p>");
				        }
		    		});
		    	})

	    	</script>

			
	    </div>    
		
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
