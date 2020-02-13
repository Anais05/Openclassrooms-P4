<?php $title = "Connexion"; ?>


<link rel="stylesheet" type="text/css" href="../CSS/stylesheet2.css">

	<section id="login">
			<div class="formulaire">
				<form action="connexion.php" method="post">
					<h1 class="titre-form">Connexion</h1>
					<label for="pseudo">Pseudo</label></br>
					<input type="text" name="pseudo" id="pseudo" required /></br>
					<label for="pass">Mot de passe</label></br>
					<input type="password" name="pass" id="pass" required /></br>
					<input type="submit" value="Se Connecter" />
				</form>			

				<a href="inscription.php">Inscrivez vous ici !</a>
			</div>
	</section>

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
			$req = $bdd->prepare('SELECT id, mot_de_passe FROM membres WHERE pseudo = :pseudo');
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
			        header('Location: index.php');
			    }
			    else {
			        echo 'Identifiant ou mot de passe incorrect ici  !';
			    }
			}

		}

	?>			





