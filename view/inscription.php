<?php $title = "Inscription"; ?>

 <link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet2.css">
 <link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

 <?php 
    if (isset($_GET['pseudo']) &&  $_GET['pseudo'] == 'unsuccess') {
		echo "<p id ='unsuccess'> Pseudo déjà utilisé ! </p>";
	}
	elseif (isset($_GET['pass']) &&  $_GET['pass'] == 'unsuccess') {
		echo '<p id="unsuccess"> Les mots de passe ne se correspondent pas !<p>';
	}
	elseif (isset($_GET['notempty']) &&  $_GET['notempty'] == 'unsuccess') {
		echo '<p id="unsuccess"> Tous les champs ne sont pas remplis ! <p>';
    }
?>

<section id="subscribe">
	<div  class="formulaire">
		<form action="index.php?action=subscribeSubmit" method="post">
			<h1 id="titre-form">Inscription</h1>
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
</section>

<script src="../public/js/messages.js"></script>


