<?php
require_once('BddConnection.php');
require_once('Chapitre.php');

class ChapitreManager extends BddConnection
{
    public function getList()
	{
        $bdd = $this->dbConnect();
        $chapitres = [];

		$query = $bdd->query("SELECT id, titre, texte, date_post FROM chapitres ORDER BY date_post DESC LIMIT 0, 5");

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
        $query =  $bdd->prepare("INSERT INTO chapitres( date_post, titre, texte) VALUES( now(), :titre, :texte)");
        $newPost = $query->execute(array($titre, $texte));
        return $newPost;
       
    }

    // public function update()
    // {
    //     $bdd = $this->dbConnect();
    //     $query = $bdd->prepare("UPDATE chapitres SET titre = :titre, texte = :texte, date_post = now() WHERE id = :id");
    //     $query->execute([
    //         ':title' => $chapitre->getTitre(),
    //         ':texte' => $chapitre->getTexte(),
    //         ':date_post' =>$chapitre->getDate(),
    //         ':id' => $chapitre->getId()
    //     ]);
    // }

    // public function deletePost($id)
    // {
    //     $bdd = $this->dbConnect();

    //     $query = $bdd->prepare("DELETE FROM chapitre WHERE id = id");
    //     $result = $query->execute([
    //         $chapitre->getId()
    //     ]);      
    // }
}



