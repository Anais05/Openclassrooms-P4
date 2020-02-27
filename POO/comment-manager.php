<?php
class CommentManager 
{
    
    public function __construct($db)
    {
        $this->setDb($db);
    }


    public function getAll()
    {
        $query = $this->db->query('SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm
                        FROM commentaires 
                        INNER JOIN membres ON commentaires.id_membre = membres.id 
                        WHERE id_post=?');

        while ($donnees = $reponse->fetch())
        {
            
            echo "<div class = 'leComm' id='".$donnees['id_comm']."'>";
            echo "<p class ='membre'>" . htmlspecialchars(getId_membre()) . "</p>" ;
            echo "<p class ='comm'>". htmlspecialchars(getCommentaire()) . "</p>";
            echo "<p class = 'dateCommentaire'> Publié le : ".htmlspecialchars(getId_post()) . "</p>";
            echo "</div>";
            if (isset($_SESSION['pseudo']) && ($_SESSION["pseudo"]=='admin'))
            {
                echo "<button class ='supp-comm' id=".$donnees['id_comm'].">Supprimer le commentaire </button>";
            }
            else if (isset($_SESSION["pseudo"]))
            {
                echo "<button class ='signaler' id=".$donnees['id_comm'].">Signaler le commentaire</button>";
            }
            echo "<div id ='mssg2'><div>";
            
        }

    $reponse->closeCursor();
}
    }


    public function add()
    {
        $query = $this->db->prepare("INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout , statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)");
        $query->execute([
            'id_membre' => $comment->getId_membre(),
            'id_post' => $comment->getId_post(),
            'commentaire' => $comment->getCommentaire()
        ]);
    }


    public function delete()
    {
        $query = $this->db->prepare("DELETE FROM commentaires WHERE id_comm = ?");
        $result = $query->execute([
            $commentaire->getId_comm()
        ]);

    }

     public function report()
    {
        $query = $this->db->prepare("UPDATE commentaires SET statut = :true WHERE id_comm = ?");
        $result = $query->execute([
            $commentaire->getId_comm()
        ]);

    }
}