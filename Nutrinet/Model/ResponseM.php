<?php

class Response
{
    private ?int $idResponse = null;
    private ?string $title = null;
    private ?string $mail = null;
    private ?string $message = null;
    private ?string $date = null;
    private ?string $nom = null;
    private ?int $idReclam = null;

    public function __construct(
        $id = null,
        $title,
        $mail,
        $message,
        $date,
        $nom,
        $idReclam
    ) {
        $this->idResponse = $id;
        $this->title = $title;
        $this->mail = $mail;
        $this->message = $message;
        $this->date = $date;
        $this->nom = $nom;
        $this->idReclam = $idReclam;
    }

    public function getIdResponse()
    {
        return $this->idResponse;
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

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
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

    public function getIdReclam()
    {
        return $this->idReclam;
    }

    public function setIdReclam($idReclam)
    {
        $this->idReclam = $idReclam;
        return $this;
    }
}

?>