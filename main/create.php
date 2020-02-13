<?php

		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

		//Insertion dans la bdd

	    $req = $bdd->prepare('INSERT INTO chapitres( date_post, titre, texte) VALUES( now(), :titre, :texte)');
		$req->execute(array(
		    'titre' => $_POST['titre'],
		    'texte' => $_POST['texte']
		));
		

?>