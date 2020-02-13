<?php $title = "Inscription"; ?>

 <link rel="stylesheet" type="text/css" href="../CSS/stylesheet2.css">

<section id="subscribe">

	<div class="formulaire">
		<form action="inscription.php" method="post">
			<h1 class="titre-form">Inscription</h1>
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" required /></br>
			<label for="pass">Mot de passe</label>
			<input type="password" name="pass" id="pass" required /></br>
			<label for="pass_confirm">Vérification mot de passe</label>
			<input type="password" name="pass_confirm" id="pass_confirm" required /></br>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required /></br>
			<input type="submit" value="Inscription" />
		</form>
	</div>

	<?php 
			

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			// Récupération des donnée du formulaire

			$pseudo = $_POST['pseudo'];
			$pwd1 = $_POST['pass'];
			$pwd2 = $_POST['pass_confirm'];
			$email = $_POST['email'];

			// Hachage du mot de passe
			$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

			try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
					catch (PDOException $e)
					{
					    die('Erreur : ' . $e->getMessage());
					}

			//verification pseudo 
			$req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=?');
	        $req->execute(array($_POST['pseudo']));
	        if ($donnees = $req ->fetch())
	        {
			    echo ' Pseudo déjà utilisé';
			    die();
			}
			else
			{
			    if($pwd1==$pwd2)
			    {
		    	// Insertion dans la bdd
			        $insert = $bdd->prepare('INSERT INTO membres(pseudo, mot_de_passe, email) VALUES(:pseudo, :mot_de_passe, :email)');
					$insert->execute(array(
					    'pseudo' => $pseudo,
					    'mot_de_passe' => $pass_hache,
					    'email' => $email));
					header('Location: connexion.php');
			    }
			    else{
			    	echo "<p style= 'color:red'> Les mots de passe ne se correspondent pas.</p>";
			    }
			}
	    }

	?>

</section>


