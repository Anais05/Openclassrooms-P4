<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

<?php 
  
    foreach ($chapitres as $chapitre)
    { 
?>
    <p class ='titre-chap'><?=$chapitre ->getTitle()?></p>
    <p class = 'date'> Publié le : <?=$chapitre ->getDate()?></p>
    <p class ='chap'><?=substr($chapitre ->getTexte(), 0, 500)?></p>
    <a class = 'suite-chap' href="index.php?action=chapitre&chap=<?=$chapitre ->getId()?>">Lire la suite ...</a> </br>
<?php 
    }
?> 
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

