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



	    <div id="mssg2"></div>


		<div class="formulaire-comm">
			<form id="new-comm" action="chapitres.php" method="post">
				<h1 class="titre-form">Laisser un commentaire</h1>
				<input type="hidden" name="membre" id="membre-id" value=<?php if (isset($_SESSION['pseudo'])){echo $_SESSION['id'];}?>>
				<label for="content">Commentaire</label>
				<textarea name="content" rows="5" cols="180" id="comment"></textarea>
				<input type="submit" id ="submit" value="Poster" />
			</form>
	    </div> 

	</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<script>deleteComm();reportComm();postComm();</script>  