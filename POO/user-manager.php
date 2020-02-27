<?php
class UserManager 
{

    public function __construct()
    {
        $this->setDb($db);
    }

    public function add()
    {
        $query = $this->db->prepare('INSERT INTO membres(pseudo, mot_de_pass, email) VALUES(:pseudo, :mot_de_pass, :email)');
        $query->execute([
            'pseudo' =>getPseudo(),
            'mot_de_pass' => getPass(),
            'email' =>getMail()
        ]);
    }
   
}