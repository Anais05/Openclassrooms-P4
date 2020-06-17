<?php 
$title = "Modification chapitre"; ?>

<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

	<body>
		<h2>Modifier</h2>
    	<textarea id="edit">
		<?php 
                { 
            ?>
                <h3 id ='titre-update'><?= $chapitre->getTitle() ?></h2>
                <div id = 'chap-update'><?= $chapitre->getTexte() ?></h2>
            <?php 
                }
            ?>
    	</textarea>
    	
    	<div id="button">
	    	<button id="btn-save" >Enregistrer</button> 
	    	<button id="btn-delete">Supprimer</button>
	    	<a id="retour" href="index.php?action=adminHome">Retour</a>
    	</div>

    	<div id="mssg"></div>

	</body>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>
<script>updateChap();deleteChap()</script>  