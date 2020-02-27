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

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }

    public function hydrate($data)
    {
        if (isset($data['id_comm']))
        {
            $this->setId($data['id_comm']);
        }

        if (isset($data['id_post']))
        {
            $this->setId_article($data['id_post']);
        }

        if (isset($data['id_membre']))
        {
            $this->setPseudo($data['id_membre']);
        }

        if (isset($data['commentaire']))
        {
            $this->setComment($data['commentaire']);
        }

        if (isset($data['date_ajout']))
        {
            $this->setDate_comment($data['date_ajout']);
        }

        if (isset($data['statut']))
        {
            $this->setReport($data['statut']);
        }
    }

    // GETTERS

    public function getId()
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

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getDate_ajout()
    {
        return $this->date_ajout;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    // SETTERS

    public function setId($id)
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

    public function setCommentaire($comment)
    {
        $this->comment = htmlspecialchars($commentaire);

        return $this;
    }

    public function setDate_ajout($date_ajout)
    {
        $this->date_comment = $date_ajout;

        return $this;
    }

    public function setStatut($statut)
    {
        $this->report = $Statut;

        return $this;
    }

    
}