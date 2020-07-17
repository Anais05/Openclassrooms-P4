<?php $title = "Connexion"; ?>

<link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">

	<?php 
		if (isset($_GET['user']) &&  $_GET['user'] == 'unsuccess') {
			echo "<p id='unsuccess'> Identifiant ou mot de passe incorrect !</p>";
		}
		elseif (isset($_GET['inscription']) &&  $_GET['inscription'] == 'success') {
			echo '<p id="success"> Inscription réussie ! Connectez vous !<p>';
		}
	?>

	<section id="login">
			<div class="formulaire">
				<form action="index.php?action=loginSubmit" method="post">
					<h2 class="titre-form">Connexion</h2>
					<label for="pseudo">Pseudo</label></br>
					<input type="text" name="pseudo" id="pseudo" required /></br>
					<label for="pass">Mot de passe</label></br>
					<input type="password" name="pass" id="pass" required /></br>
					<input type="submit" value="Se Connecter" />
				</form>			

				<p>Pas encore inscrit ? Inscrivez vous<a href="index.php?action=subscribe"> ici !</a></p>
			</div>
	</section>
	
<script src="/js/messages.js"></script>



