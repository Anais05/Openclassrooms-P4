<?php
			try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
				        die('Erreur : ' . $e->getMessage());
				}

			// insertion dans la bdd puis affichage		
			
			if(isset($_POST['chap']) AND is_numeric($_POST['chap']))
			{
				$req = $bdd->prepare('UPDATE chapitres SET titre = :titre, texte = :texte, date_post = now() WHERE id = :id');
				$req->execute(array(
					'titre' => $_POST['titre'],
					'texte' => $_POST['contenu'],
					'id' => $_POST['chap']

			    ));
			    
			    $texte = "<p id ='titre-update'>" . htmlspecialchars($_POST['titre']) . "</p>" ;
	    		$texte = "<p id = 'chap-update'>  ".htmlspecialchars($_POST['contenu']) . "</p>";
	    		echo $texte;
			}
		?>
