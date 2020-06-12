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
            return $user;
        }

    }

    public function checkPseudo($pseudo)
    {
        $bdd = $this->dbConnect();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo= :pseudo');
	        $req->execute(array(
                'pseudo' =>$pseudo));
            $invalidUsername = $req ->fetch();
            return $invalidUsername;

        }

    }

    public function createUser($pseudo,$pass_hache,$email)
    {
        $bdd = $this->dbConnect();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
            $newUser = $bdd->prepare('INSERT INTO membres(pseudo, mot_de_passe, email) VALUES(:pseudo, :mot_de_passe, :email)');
            $newUser->execute(array(
                'pseudo' => $pseudo,
                'mot_de_passe' => $pass_hache,
                'email' => $email));
        }
        return $newUser;
			   
			
    }

    public function adminLogin($pseudo)
    {
        $bdd = $this->dbConnect();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $req = $bdd->prepare('SELECT id, mot_de_passe FROM administration WHERE pseudo = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            $admin = $req->fetch();
            return $admin;
        }

    }
   
}
