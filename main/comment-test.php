

<?php
session_start();

	try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES , false);
			$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

		$sql = "INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout, statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)";

		$statement = $pdo->prepare($sql);

		$membre = $_POST["membre"];
		$post = $_POST["chap"];
		$commentaire = $_POST["commentaire"];

		$statement->bindValue(':id_membre', $membre,PDO::PARAM_STR);
		$statement->bindValue(':id_post', $post,PDO::PARAM_STR);
		$statement->bindValue(':commentaire', $commentaire,PDO::PARAM_STR);

		$inserted = $statement->execute();

		if($inserted && (!empty($_SESSION["pseudo"]))){
			//$now = new DateTime();
			$commentaire = "<div class ='leComm'>";
			$commentaire .= "<p class ='membre'>" . htmlspecialchars($_POST['membre']) . "</p>" ;
	        $commentaire .= "<p class ='comm'>". htmlspecialchars($_POST['commentaire']) . "</p>";
	        //$commentaire .= "<p class = 'dateCommentaire'> Publié le : ".$now->format('Y-m-d H:i:s'). "</p>";
	        $commentaire .= "</div>";
	        echo $commentaire;
		}else{
			echo "le commentairen'a pas été posté";

		}




