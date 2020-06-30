<?php $title = 'Panneau admin'; ?>


<?php ob_start(); ?>

<h2 id ="admin-chap">Chapitres</h2>

<?php 
    if (isset($_GET['newPost']) &&  $_GET['newPost'] == 'success') {
		echo '<p id="success">Le chapitre a bient été créé !<p>';
	}
	elseif (isset($_GET['deletePost']) &&  $_GET['deletePost'] == 'success') {
		echo '<p id="success">Le chapitre a bient été supprimé !<p>';
    }
    
  
    foreach ($chapitres as $chapitre)
    { 
?>
    <p class ='titre-chap'><?=$chapitre ->getTitle()?></p>
    <p class = 'date'> Publié le : <?=$chapitre ->getDate()?></p>
    <p class ='chap'><?=htmlspecialchars_decode(substr($chapitre ->getTexte(), 0, 500))?></p>
    <div id ='lesModif'>
        <a class = 'afficher-chap' href="index.php?action=chapitre&chap=<?=$chapitre ->getId()?>">Afficher</a>
        <a class = 'modif-chap' href="index.php?action=modifier&chap=<?=$chapitre ->getId()?>">Modifier </a>
        <a class = 'delete-chap' href="index.php?action=deleteChap&chap=<?=$chapitre ->getId()?>">Supprimer </a>
    </div>
<?php 
    }
?> 
        
<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>
