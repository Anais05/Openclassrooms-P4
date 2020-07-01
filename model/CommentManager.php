<?php
require_once('BddConnection.php');
require_once('Comment.php');
class CommentManager extends BddConnection 
{

    public function getAll($id_post)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm, commentaires.statut
                             FROM commentaires 
                             INNER JOIN membres ON commentaires.id_membre = membres.id 
                             WHERE id_post = ?
                             ORDER BY statut DESC
                             ');
        $comments->execute(array($id_post));

        return $comments;
      
    } 


    public function addComm($id_membre, $id_post,$commentaire)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare("INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout , statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)");
         $comments->execute([
            'id_membre' => $id_membre,
            'id_post' => $id_post,
            'commentaire' => $commentaire
        ]);
        return $comments;

    }

    public function delete($id)
    {
        $bdd = $this->dbConnect();
        $query = $bdd->prepare("DELETE FROM commentaires WHERE id_comm = ?");
        $query->execute(array($id));

    }

    public function deletePostComment($id)
    {
        
        $bdd = $this->dbConnect();
        if(isset($id) AND is_numeric($id))
        {
            $req = $bdd->prepare('DELETE FROM commentaires WHERE id_post = ?');
            $req->execute(array($id));
        }
       
    }

     public function report($id)
    {
        var_dump($id);
        $bdd = $this->dbConnect();
        $query = $bdd->prepare("UPDATE commentaires SET statut = 1 WHERE id_comm = ?");
        $query->execute(array($id));
    }
}