<?php
class Chapitre
{
    private $id;
    private $date_post;
    private $titre;
    private $texte;
    
    public function __construct(Array $donnees)
    {
        $this->hydrate($donnees);
    }
    public function __construct()
    {
        $this->connect = $db->getDb();
    }

    public function hydrate($donnees)
    {
        if (isset($donnees['id']))
        {
            $this->setId($donnees['id']);
        }

        if (isset($donnees['date_post']))
            $this->setTitle($donnees['date_post']);
        }

        if (isset($data['titre']))
        {
            $this->setContent($donnees['titre']);
        }

        if (isset($donnees['texte']))
        {
            $this->setDate_creation($donnees['texte']);
        }

    }

    // GETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date_post;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getTexte()
    {
        return $this->texte;
    }


    // SETTERS
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setDate($date_post)
    {
        $this->date_post = now();

        return $this;
    }

    public function setTitre($titre)
    {
        $this->titre = htmlspecialchars($titre);

        return $this;
    }

    public function setTexte($texte)
    {
        $this->texte = htmlspecialchars($texte();

        return $this;
    }

}