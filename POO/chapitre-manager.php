<?php
class chapitreManager
{
    

    public function __construct($db)
    {
        $this->setDb($db);
    }


    public function get($id)
    {
        if (is_numeric($id))
        {
            $query = $this->db->prepare('SELECT * FROM chapitres WHERE id=?');
            $query->execute([
                $id
            ]);

            $resultat = $req->fetch();
            echo "<p class ='titre-chap'>" . htmlspecialchars((getTitre()) . "</p>" ;
            echo "<p class = 'date'> Publié le : ".htmlspecialchars(getDate()) . "</p>";
            echo "<p class ='chap'>". htmlspecialchars(getTexte()) . "</p>"; 
        }
        else
        {
            return false;
        }  
    }

    public function getAll()
	{
		// retourne la liste de tous les chapitres

		$query = $this->db->query("SELECT id, titre ,date_post ,SUBSTRING(texte,1,500) AS debut_chap FROM chapitres ORDER BY date_post");

		while ($donnees = $query->fetch()
		{
			echo "<p class ='titre-chap'>" . htmlspecialchars(getTitre()) . "</p>" ;
            echo "<p class = 'date'> Publié le : ".htmlspecialchars(getDate()) . "</p>";
            echo "<p class ='chap'>". htmlspecialchars(getTexte()) . "</p>";
            echo "<a class = 'suite-chap' href='chapitres.php?chap=".$donnees['id'] ." '>Lire la suite ...</a> </br>";
		}

	}


    public function add()
    {
        $query = $this->db->prepare("INSERT INTO chapitres( date_post, titre, texte) VALUES( now(), :titre, :texte)");
        $query->execute([
            $chapitre->getDate(),
            $chapitre->getTitret(),
            $chapitre->getTexte()
        ]);
    }

    public function update()
    {
        $query = $this->db->prepare("UPDATE chapitres SET titre = :titre, texte = :texte, date_post = now() WHERE id = :id");
        $query->execute([
            ':title' => $chapitre->getTitre(),
            ':content' => $chapitre->getTexte(),
            ':id' => $chapitre->getId()
        ]);
    }

    public function delete()
    {
        $query = $this->db->prepare("DELETE FROM chapitre WHERE id = id");
        $result = $query->execute([
            $chapitre->getId()
        ]);      
    }
}