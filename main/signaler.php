<?php

	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}

	//Insertion dans la bdd
	    $req = $bdd->prepare('UPDATE commentaires SET statut = :true WHERE id_comm = ?');
		$req->execute(array(
		   'id_comm'=> $_POST['commentaire'],
		));

	

?>