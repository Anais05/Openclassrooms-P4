<?php
class Comment
{
    private $id_comm;
    private $id_post;
    private $id_membre;
    private $commentaire;
    private $date_ajout;
    private $statut;

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        if (isset($data['id_comm']))
        {
            $this-> setId_Comm($data['id_comm']);
        }

        if (isset($data['id_post']))
        {
            $this->setId_post($data['id_post']);
        }

        if (isset($data['id_membre']))
        {
            $this->setId_membre($data['id_membre']);
        }

        if (isset($data['commentaire']))
        {
            $this->set_Commentaire($data['commentaire']);
        }

        if (isset($data['date_ajout']))
        {
            $this->setDate_ajout($data['date_ajout']);
        }

        if (isset($data['statut']))
        {
            $this->set_Statut($data['statut']);
        }
    }

    // GETTERS

    public function getId_Comm()
    {
        return $this->id_comm;
    }

    public function getId_post()
    {
        return $this->id_post;
    }

    public function getId_membre()
    {
        return $this->id_membre;
    }

    public function get_Commentaire()
    {
        return $this->commentaire;
    }

    public function getDate_ajout()
    {
        return $this->date_ajout;
    }

    public function get_Statut()
    {
        return $this->statut;
    }

    // SETTERS

    public function setId_Comm($id_comm)
    {
        $this->id = $id_comm;

        return $this;
    }

    public function setId_post($id_post)
    {
        $this->id_article = $id_post;

        return $this;
    }

    public function setId_membre($id_membre)
    {
        $this->pseudo = $id_membre;

        return $this;
    }

    public function set_Commentaire($commentaire)
    {
        $this->comment = htmlspecialchars($commentaire);

        return $this;
    }

    public function setDate_ajout($date_ajout)
    {
        $this->date_comment = $date_ajout;

        return $this;
    }

    public function set_Statut($statut)
    {
        $this->report = $statut;

        return $this;
    }

    
}