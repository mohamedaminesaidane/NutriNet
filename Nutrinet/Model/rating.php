<?php
class rating
{
    private ?int $id = null;
    private ?string $note= null;
    private ?string $commentaire = null;
    private ?int $fk = null;

    public function __construct($idRating = null, $note, $commentaire,$fk) //construct rating ajouté
    {
        $this->id = $idRating;
        $this->note = $note;
        $this->commentaire= $commentaire;
        $this->fk= $fk;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getnote()
    {
        return $this->note;
    }


    public function setNote($note)
    {
        $this-> note= $note;

        return $this;
    }
    public function setCommentaire($commentaire)
    {
        $this-> commentaire= $commentaire;

        return $this;
    }


    public function getComment()
    {
        return $this->commentaire;
    }
    public function getfk()
    {
        return $this->fk;
    }
   
}


    