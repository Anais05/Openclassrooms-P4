<?php 
$title = "Connection admin"; ?>

<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

	<?php 
		if (isset($_GET['admin']) &&  $_GET['admin'] == 'unsuccess') {
			echo "<p id='unsuccess'> Identifiant ou mot de passe incorrect !</p>";
		}
	?>
	
	<section id="adminLogin">
		<div class="formulaire">
			<form action="index.php?action=adminSubmit" method="post">
				<h2 class="titre-form">Connection admin</h2>
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" required /></br>
				<label for="pass">Mot de passe</label>
				<input type="password" name="pass" id="pass" required /></br>
				<input type="submit" value="Se connecter" />
			</form>
		</div>
	</section>

	<script src="../public/js/messages.js"></script>


	









