<?php
class UserManager 
{
    private $_db; // Instance de PDO.

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(User $user)
    {
        $query = $this->db->prepare('INSERT INTO membres(pseudo, mot_de_pass, email) VALUES(:pseudo, :mot_de_pass, :email)');
        $query->execute([
            'pseudo' => $user->getPseudo(),
            'mot_de_pass' => $user->getPass(),
            'email' => $user->getMail()
        ]);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}