<?php
class User
{
    private $id_membre;
    private $pseudo;
    private $mot_de_passe;
    private $email;

    public function __construct(Array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate($donnees)
    {
        if (isset($donnees['id_membre']))
        {
            $this->setId($donnees['id_membre']);
        }

        if (isset($donnees['pseudo']))
        {
            $this->setPseudo($donnees['pseudo']);
        }

        if (isset($donnees['mot_de_passe']))
        {
            $this->setPass($donnees['mot_de_passe']);
        }

        if (isset($donnees['email']))
        {
            $this->setMail($donnees['email']);
        }

    }

    // GETTERS

    public function getId_membre()
    {
        return $this->id_membre;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPass()
    {
        return $this->mot_de_passe;
    }

    public function getMail()
    {
        return $this->email;
    }


    // SETTERS

    public function setId($id_membre)
    {
        $this->id = $id_membre;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setPass($mot_de_passe)
    {
        $this->mot_de_pass = $mot_de_passe;
    }

    public function setMail($email)
    {
        $this->email = $email;
    }

}
