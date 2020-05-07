<?php $title = 'Billet simple pour l\'Alaska'; 
session_start()
?>
<?php
   require('../model/ChapitreManager.php');
?>

<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">

<?php 

    $ChapitreManager = new chapitreManager();
    $chapitres = $ChapitreManager->getList();
    foreach ($chapitres as $chapitre)
    { 
?>
    <p class ='titre-chap'><?=$chapitre ->getTitle()?></p>
    <p class = 'date'> Publié le : <?=$chapitre ->getDate()?></p>
    <p class ='chap'><?=substr($chapitre ->getTexte(), 0, 500)?></p>
    <a class = 'suite-chap' href="chapitres.php?chap=<?=$chapitre ->getId()?>">Lire la suite ...</a> </br>
<?php 
    }
?> 
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

