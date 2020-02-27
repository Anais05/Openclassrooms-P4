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
 
		if(isset($_POST['chap']) AND is_numeric($_POST['chap']))
		{
			$req = $bdd->prepare('DELETE FROM chapitres WHERE id = :id');
			$req->execute(array(
				
				'id' => $_POST['chap']
			));
		}

?>
