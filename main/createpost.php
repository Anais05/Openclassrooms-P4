<?php 
$title = "Nouveau chapitre"; 
require('../POO/ChapitreManager.php');
?>
<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet2.css">

<section id="creation">
	<div class="formulaire">
		<form id="new_chap" action="createpost.php" method="post">
			<h1 class="titre-form">Ajouter un chapitre</h1>
			<label for="title">Titre</label>
			<input type="text" name="title" id="title" /></br>
			<label for="content">Texte</label>
			<textarea  id="content" name="content" rows="30" cols="180"></textarea>
			<input id="create" type="submit" value="Poster" />
		</form>
    </div>
</section>
<div id="lala"></div>

<?php 
	$ChapitreManager = new chapitreManager();
	$newPost = $ChapitreManager->addPost($titre,$texte);
	
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<script>createChap();</script>





