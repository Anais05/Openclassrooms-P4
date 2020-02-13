<?php
class chapitreManager
{
    
    private $_db; 

    public function __construct($db)
    {
        $this->setDb($db);
    }


    public function get($id)
    {
        $query = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS date_creation, on_line FROM articles WHERE id = ?');
        $query->execute([
            $id
        ]);
        $article = $query->fetch(PDO::FETCH_ASSOC);

        return new Article($article);
    }

    public function exists($id)
    {
        if (is_numeric($id))
        {
            $query = $this->db->prepare('SELECT id FROM articles WHERE id = ?');
            $query->execute([
                $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }  
    }

    public function getAll()
	{
		// retourne la liste de tous les chapitres

		$query = $this->db->query("SELECT id, titre ,date_post ,SUBSTRING(texte,1,500) AS debut_chap FROM chapitres ORDER BY date_post DESC LIMIT 0, 15 ");

		while ($donnees = $query->fetch()
		{
			echo "<p class ='titre-chap'>" . htmlspecialchars(getTitre()) . "</p>" ;
            echo "<p class = 'date'> Publié le : ".htmlspecialchars(getDate()) . "</p>";
            echo "<p class ='chap'>". htmlspecialchars(getTexte()) . "</p>";
            echo "<a class = 'suite-chap' href='chapitres.php?chap=".$donnees['id'] ." '>Lire la suite ...</a> </br>";
		}

	}


    public function add(chapitre $chapitre)
    {
        $query = $this->db->prepare("INSERT INTO chapitres( date_post, titre, texte) VALUES( now(), :titre, :texte)'");
        $query->execute([
            $chapitre->getDate(),
            $chapitre->getTitret(),
            $chapitre->getTexte()
        ]);
    }

    public function update(Article $chapitre)
    {
        $query = $this->db->prepare("UPDATE chapitres SET titre = :titre, texte = :texte, date_post = now() WHERE id = :id");
        $query->execute([
            ':title' => $chapitre->getTitre(),
            ':content' => $chapitre->getTexte(),
            ':id' => $chapitre->getId()
        ]);
    }

    public function delete(Article $chapitre)
    {
        $query = $this->db->prepare("DELETE FROM chapitre WHERE id = id");
        $result = $query->execute([
            $chapitre->getId()
        ]);      
    }
}