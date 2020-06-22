<?php
require_once('BddConnection.php');
require_once('Chapitre.php');

class ChapitreManager extends BddConnection
{
    public function getList()
	{
        $bdd = $this->dbConnect();
        $chapitres = [];

		$query = $bdd->query("SELECT id, titre, texte, date_post FROM chapitres ORDER BY id ASC LIMIT 0, 10");

		while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
		{
            $chapitres[] = new Chapitre($donnees);
        }
        return $chapitres;
 
    }

    public function getChap($id)
    {
        $bdd = $this->dbConnect();
        if(isset($id) AND is_numeric($id)) {
            $req = $bdd->prepare('SELECT * FROM chapitres WHERE id=?');
            $req->execute([$id]);
            $chapitre = $req->fetch(PDO::FETCH_ASSOC);

            return new Chapitre($chapitre);
        } 
        else {
            return NULL;
        }                        
    }


    public function addPost($titre, $texte)
    {
        $bdd = $this->dbConnect();
        $req =  $bdd->prepare("INSERT INTO chapitres( date_post, titre, texte) VALUES( now(), :titre, :texte)");
        $req->execute([
            'titre' => $titre,
		    'texte' => $texte
        ]);
    }

    public function updatePost($titre, $texte, $id)
    {
        $bdd = $this->dbConnect();
        if(isset($id) AND is_numeric($id))
        {
            $req = $bdd->prepare('UPDATE chapitres SET titre = :titre, texte = :texte, date_post = now() WHERE id = :id');
            $update = $req->execute([
                'titre' => $titre,
                'texte' => $texte,
                'id' => $id

            ]);
            return $update;
        }
    }

    public function deletePost($id)
    {
        
        $bdd = $this->dbConnect();
        if(isset($id) AND is_numeric($id))
        {
            $req = $bdd->prepare('DELETE FROM chapitres WHERE id = ?');
            $req->execute(array($id));
        }
       
  
    }

}



