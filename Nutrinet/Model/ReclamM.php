<?php

class Reclam
{
    private ?int $idReclam = null;
    private ?string $nom = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?string $email = null;
    private ?string $category = null;
    private ?string $date_response = null;
    private ?string $status = null;

    public function __construct(
        $id = null,
        $n,
        $t,
        $desc,
        $e,
        $cat,
        $date_response = null,
        $status = null
    ) {
        $this->idReclam = $id;
        $this->nom = $n;
        $this->title = $t;
        $this->description = $desc;
        $this->email = $e;
        $this->category = $cat;
        $this->date_response = $date_response ;
        $this->status = $status;
    }

    public function getIdReclam()
    {
        return $this->idReclam;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getDateResponse()
    {
        return $this->date_response;
    }

    public function setDateResponse($date_response)
    {
        $this->date_response = $date_response;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}


?>
