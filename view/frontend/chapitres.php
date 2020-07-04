<?php 
$title = "Affichage chapitres"; ?>
<?php ob_start(); 
?>

<div id ="leChapitre">

	<?php 
	if (isset($_GET['deleteComm']) &&  $_GET['deleteComm'] == 'success') {
		echo '<p id="success">Le commentaire a bient été supprimé !<p>';
	}
	elseif (isset($_GET['addComm']) &&  $_GET['addComm'] == 'success') {
		echo '<p id="success">Le commentaire a bient été ajouté !<p>';
	}
	elseif (isset($_GET['report']) &&  $_GET['report'] == 'success') {
		echo '<p id="success">Le commentaire a bient été signalé!<p>';
    }
		{ 
	?>
		<h2 class ='titre-chap'><?= $chapitre->getTitle() ?></h2>
		<p class ='date'>Publié le : <?=$chapitre->getDate() ?></p>
		<div class ='chap'><?=htmlspecialchars_decode(nl2br($chapitre->getTexte()))?></h2>
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
			<div class = 'leComm'>
				<p class ='membre'><?= $comment["pseudo"];?></p>
				<?php
				if ($comment["statut"] == 1)
				{	?> 
					<p class ='reported'><?= $comment["commentaire"];?></p>
					<?php
				}else
				{
					?>
					<p class ='comm'><?=($comment["commentaire"]);?></p>
					<?php
				}
			?>
				<p class ='dateCommentaire'><?= $comment["date_ajout"];?></p>
			</div>

				<?php
				if ($comment["statut"] == 1)
				{
					?>
						<p id ='reported'>Ce commentaire à été signalé !</p>
					<?php
				}
				if(isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
					{
						?>
						<div class = 'buttonComm'>
							<a class ='supp-comm' href="index.php?action=deletecomm&id=<?=$comment["id_comm"]?>&chap=<?= $_GET['chap']?>">Supprimer</a>
						</div>
						<?php
					}
					elseif (isset($_SESSION["pseudo"]) && ($comment["statut"] != 1))
					{
						?>
						<div class = 'buttonComm'>
							<a class ='signaler' href="index.php?action=report&id=<?=$comment["id_comm"]?>&chap=<?= $_GET['chap']?>">Signaler</a>
						</div>
						<?php
					}
				}

		?>
		
			
		
	</div>
		<?php	
			if (!empty($_SESSION)) {
		?>

			<div class="formulaire-comm">
				<form id="new-comm" action="index.php?action=addComm&chap=<?= $chapitre->getId()?>" method="post">
					<h2 class="titre-form">Laisser un commentaire</h2>
					<input type="hidden" name="membre" id="membre-id" value=<?php if (isset($_SESSION['pseudo'])){echo $_SESSION['id'];}?>>
					<label for="content">Commentaire</label>
					<textarea name="content" rows="5" cols="180" id="comment"></textarea>
					<input type="submit" id ="submit" value="Poster" />
				</form>
			</div>
		<?php
			}
			else{
				echo "<p class ='seConnecter'>Pour lasser un commentaire  veuillez vous connecter <a href='index.php?action=login'>ici !</a><p>";
			}
		?>



</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
