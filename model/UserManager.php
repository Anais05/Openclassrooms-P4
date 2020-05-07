<?php
namespace projet4\app;
require_once('BddConnection.php');
require_once('model-user.php');
class UserManager extends BddConnection 
{

    public function add()
    {
        $bdd = $this->dbConnect();
        $query = $bdd->prepare('INSERT INTO membres(pseudo, mot_de_pass, email) VALUES(:pseudo, :mot_de_pass, :email)');
        $query->execute([
            'pseudo' =>getPseudo(),
            'mot_de_pass' => getPass(),
            'email' =>getMail()
        ]);
    }
   
}