<?php
class CommentManager extends Manager
{
    
    public function __construct()
    {
        $this->log();
    }


    public function getAll()
    {
        $comments = [];

        $query = $this->db->query('SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm
                        FROM commentaires 
                        INNER JOIN membres ON commentaires.id_membre = membres.id 
                        WHERE id_post=?');

        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }

        return $comments;
    }


    public function add(Comment $comment)
    {
        $query = $this->db->prepare("INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout , statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)");
        $query->execute([
            'id_membre' => $comment->getId_membre(),
            'id_post' => $comment->getId_post(),
            'commentaire' => $comment->getCommentaire()
        ]);
    }


    public function delete(Comment $comment)
    {
        $query = $this->db->prepare("DELETE FROM commentaires WHERE id = ?");
        $result = $query->execute([
            $commentaire->getId_comm()
        ]);

    }

     public function report(Comment $comment)
    {
        $query = $this->db->prepare("UPDATE commentaires SET statut = :true WHERE id_comm = ?");
        $result = $query->execute([
            $commentaire->getId_comm()
        ]);

    }
}