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

 
		$req = $bdd->prepare('DELETE FROM commentaires WHERE id_comm = :id_comm');
			$req->execute(array(
				
				'id_comm' => $_POST['commentaire']
			));
			
		}

?>
