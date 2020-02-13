<?php $title = 'Billet simple pour l\'Alaska'; 
session_start()
?>

<?php ob_start(); ?>
<link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">


    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        //  Récupération du chapitre
        $reponse = $bdd->query('SELECT id, titre ,date_post ,SUBSTRING(texte,1,500) AS debut_chap FROM chapitres ORDER BY date_post DESC LIMIT 0, 15 ');

        while ($donnees = $reponse->fetch())
            {
                echo "<p class ='titre-chap'>" . htmlspecialchars($donnees['titre']) . "</p>" ;
                echo "<p class = 'date'> Publié le : ".htmlspecialchars($donnees['date_post']) . "</p>";
                echo "<p class ='chap'>". htmlspecialchars($donnees['debut_chap']) . "</p>";
                echo "<a class = 'suite-chap' href='chapitres.php?chap=".$donnees['id'] ." '>Lire la suite ...</a> </br>";
            }


        $reponse->closeCursor();
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>