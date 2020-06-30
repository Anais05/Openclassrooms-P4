<?php 
$title = "Modification chapitre"; ?>

<?php ob_start(); ?>

	<body>
		
		<?php 
		if (isset($_GET['updatePost']) &&  $_GET['updatePost'] == 'success') {
			echo '<p id="success">Le chapitre a bient été modifié !<p>';
		}
                { 
			?>
			<section id="modifier">
				<div id="Backbutton">
					<a id="retour" href="index.php?action=adminHome"><i class="fa fa-angle-left"></i> Retour aux chapitres</a>
				</div>
				<div class="formulaire">
					<form id="updateform" action="index.php?action=updatePost&chap=<?= $chapitre->getId() ?>" method="post">
						<div class="form-group">
							<h1 class="titre-form">Modifier le chapitre</h1>
						</div>
						<div class="form-group">
							<label for="title">Titre </label><br />
							<input type="text" name="title" id ='title' value="<?= $chapitre->getTitle() ?>"/><br />
						</div>
						<div class="form-group">
							<label for="content">Texte </label><br />
							<textarea  id="contentToUpdate" name="content" rows="30" cols="180"> <?=htmlspecialchars_decode(nl2br($chapitre->getTexte()))?></textarea><br />
						</div>
						<div class="form-group">
							<input id="update" type="submit" value="Enregister" />
						</div>
					</form>
				</div>
				
			</section>
               
            <?php 
                }
            ?>
    	

	</body>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>