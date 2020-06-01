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


    public function addAndDisplayComm($id_membre, $id_post,$commentaire)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO commentaires( id_membre, id_post, commentaire, date_ajout , statut) VALUES(:id_membre, :id_post, :commentaire, now(), false)");
        $req->execute([
            'id_membre' => $id_membre->getId_membre(),
            'id_post' => $id_post->getId_post(),
            'commentaire' => $commentaire->get_Commentaire()
        ]);

        $req2 = $bdd->prepare('SELECT commentaires.commentaire, membres.pseudo , commentaires.date_ajout, commentaires.id_comm
        FROM commentaires 
        INNER JOIN membres ON commentaires.id_membre = membres.id 
        WHERE id_post=? AND id_comm = LAST_INSERT_ID()");');
        $req2->execute([$id_post]);
        if ($data = $req2->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Comment($data);
        }
        return $commentaires;

    }



    public function delete($id)
    {
        $query = $bdd->prepare("DELETE FROM commentaires WHERE id_comm = ?");
        $result = $query->execute([
           $id
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