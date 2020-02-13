<?php 
session_start();
$title = "Connection admin"; ?>

<link rel="stylesheet" type="text/css" href="../CSS/stylesheet2.css">

<?php

	if (isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
	{
		header('Location: admin-view.php');

	}else if (isset($_SESSION["pseudo"]) || (empty($_SESSION))) 
	{
		echo'
	
			<section id="adminLogin">
				<div class="formulaire">
					<form action="adminlogin.php" method="post">
						<h1 class="titre-form">Connection admin</h1>
						<label for="pseudo">Pseudo</label>
						<input type="text" name="pseudo" id="pseudo" required /></br>
						<label for="pass">Mot de passe</label>
						<input type="password" name="pass" id="pass" required /></br>
						<input type="submit" value="Se connecter" />
					</form>
				</div>
			</section> ';
	}
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

			$pseudo = $_POST['pseudo'];

			//  Récupération du pseudo et mdp
			$req = $bdd->prepare('SELECT id, mot_de_passe FROM administration WHERE pseudo = :pseudo');
			$req->execute(array(
			    'pseudo' => $pseudo));
			$resultat = $req->fetch();

			// Comparaison avec les donnees de la bdd
			$isPasswordCorrect = password_verify($_POST['pass'], $resultat['mot_de_passe']);

			if (!$resultat)
			{
			    echo ' Identifiant ou mot de passe incorrect !';
			}
			else
			{
			    if ($isPasswordCorrect) 
			    {
			        session_start();
			        $_SESSION['id'] = $resultat['id'];
			        $_SESSION['pseudo'] = $pseudo;
			        header('Location: admin-view.php');
			    }else{
			        echo 'Identifiant ou mot de passe incorrect !';
			    }
			}
	}

?>
	









