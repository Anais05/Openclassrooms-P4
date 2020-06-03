<?php 
$title = "Affichage chapitres"; ?>
<?php ob_start(); 
?>


<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet2.css">

<div class ="LeChapitre">

	<?php 
		{ 
	?>
		
		<h2 class ='titre-chap'><?= $chapitre->getTitle() ?></h2>
		<p class ='date'><?= $chapitre->getDate() ?></p>
		<div class ='chap'><?= $chapitre->getTexte() ?></h2>
	<?php 
		}
	?> 

</div>


	


	<div class="LesCommentaires">
		<div id="petit-trait"></div>
		<h3>Commentaires</h3>

	<?php
		while ($comment = $comments->fetch()) {
	?>
			<div class = 'leComm' id =<?=$comment["id_comm"];?>>
				<p class ='membre'><?= $comment["pseudo"];?></p>
				<p class ='comm'><?= $comment["commentaire"];?></p>
				<p class ='dateCommentaire'><?= $comment["date_ajout"];?></p>
				</div>
				<?php
				if (isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
					{
						?>
						<button class ='supp-comm' id="<?=$comment["id_comm"]?>">Supprimer le commentaire </button>
						<?php
					}
					 else if (isset($_SESSION["pseudo"]))
					{
						?>
						<button class ='signaler' id="<?=$comment["id_comm"]?>">Signaler le commentaire</button>
					
					<?php
					}
					echo "<div id ='mssg2'><div>";
				}

		?>
		
			
		
	</div>

	    <div id="mssg2"></div>


		<div class="formulaire-comm">
			<form id="new-comm" action="index.php?action=addComm&chap=<?= $chapitre->getId()?>" method="post">
				<h1 class="titre-form">Laisser un commentaire</h1>
				<input type="hidden" name="membre" id="membre-id" value=<?php if (isset($_SESSION['pseudo'])){echo $_SESSION['id'];}?>>
				<label for="content">Commentaire</label>
				<textarea name="content" rows="5" cols="180" id="comment"></textarea>
				<input type="submit" id ="submit" value="Poster" />
			</form>


</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<script>deleteComm();reportComm();postComm();</script>  
