<?php
require_once('BddConnection.php');
require_once('User.php');
class UserManager extends BddConnection 
{

    public function login($pseudo)
    {
        $bdd = $this->dbConnect();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //  Récupération du pseudo et mdp
            $req = $bdd->prepare('SELECT id, mot_de_passe FROM membres WHERE pseudo = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            $user = $req->fetch();
            return $user ;
        }

    }
   
}
