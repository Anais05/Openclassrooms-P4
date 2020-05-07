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

    public function hydrate($donnees)
    {
        if (isset($donnees['id']))
        {
            $this->setId($donnees['id']);
        }

        if (isset($donnees['date_post']))
        {
            $this->setDate($donnees['date_post']);
        }

        if (isset($donnees['titre']))
        {
            $this->setTitle($donnees['titre']);
        }

        if (isset($donnees['texte']))
        {
            $this->setTexte($donnees['texte']);
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

    public function getTitle()
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
        $this->date_post = $date_post;

        return $this;
    }

    public function setTitle($titre)
    {
        $this->titre = htmlspecialchars($titre);

        return $this;
    }

    public function setTexte($texte)
    {
        $this->texte = htmlspecialchars($texte);

        return $this;
    }

}