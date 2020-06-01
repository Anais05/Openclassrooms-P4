<?php $title = "Connexion"; ?>


<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet2.css">

	<section id="login">
			<div class="formulaire">
				<form action="index.php?action=loginSubmit" method="post">
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



	?>			






