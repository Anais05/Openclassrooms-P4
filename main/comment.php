<?php

	session_start();

	if(empty($_SESSION)){

		echo "<p class ='seConnecter'> Vous n'êtes pas connecter, veuillez vous connecter <a href='connexion.php'>ici !</a><p>";

	}elseif (!empty($_SESSION["pseudo"])) {

		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

		//Insertion dans la bdd
		
	    $req = $bdd->prepare('INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout , statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)');
		$req->execute(array(
		    'id_membre' => $_POST['membre'],
		    'id_post'=> $_POST['chap'],
		    'commentaire' => $_POST['commentaire'],

		));

		//reccuperation et affichage du commentaire

		$req2 = $bdd->prepare("
						SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm
				    	FROM commentaires 
				    	INNER JOIN membres ON commentaires.id_membre = membres.id 
				    	WHERE id_post=? AND id_comm = LAST_INSERT_ID()");
				    $req2->execute(array(
				    	$_POST['chap'],
				    ));

				     if ($donnees = $req2 ->fetch())
	              		{
	              			$now = new DateTime();
	                    	$commentaire = "<div class ='leComm'>";
		     				$commentaire .= "<p class ='membre'>" . htmlspecialchars($donnees['pseudo']) . "</p>" ;
        					$commentaire .= "<p class ='comm'>". htmlspecialchars($_POST['commentaire']) . "</p>";
        					$commentaire .= "<p class = 'dateCommentaire'> Publié le : ".$now->format('Y-m-d H:i:s'). "</p>";
        					$commentaire .= "</div>";
        					echo $commentaire;

					        
	                    }

				    $req2->closeCursor();

		
	}
	

?>


