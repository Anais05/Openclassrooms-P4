<?php $title = 'Panneau admin'; ?>


<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

<h2 id ="admin-chap">Chapitres</h2>

<?php 
  
    foreach ($chapitres as $chapitre)
    { 
?>
    <p class ='titre-chap'><?=$chapitre ->getTitle()?></p>
    <p class = 'date'> Publié le : <?=$chapitre ->getDate()?></p>
    <p class ='chap'><?=substr($chapitre ->getTexte(), 0, 500)?></p>
    <div id ='lesModif'>
        <a class = 'afficher-chap' href="index.php?action=chapitre&chap=<?=$chapitre ->getId()?>">Afficher</a>
        <a class = 'modif-chap' href="modifier.php?chap=<?=$chapitre ->getId()?>">Modifier </a>
    </div>
<?php 
    }
?> 
        
<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>
