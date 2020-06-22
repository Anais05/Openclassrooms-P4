<?php 
$title = "Nouveau chapitre"; 
?>
<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet2.css">

<section id="creation">
	<div id="Backbutton">
		<a id="retour" href="index.php?action=adminHome"><i class="fa fa-angle-left"></i> Retour aux chapitres</a>
	</div>
	<div class="formulaire">
		<form id="new_chap" action="index.php?action=newchap" method="post">
			<h1 class="titre-form">Ajouter un chapitre</h1>
			<label for="title">Titre</label>
			<input type="text" name="title" id="title" /></br>
			<label for="content">Texte</label>
			<textarea  id="content" name="content" rows="30" cols="180"></textarea>
			<input id="create" type="submit" value="Poster" />
		</form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>





