<?php

class SC
{
    private ?int $idSC = null;
    private ?string $duree = null;
    private ?string $acces = null;
    private ?string $sujet = null;
    private ?string $code = null;

    public function __construct($idSC = null, $duree, $acces, $sujet, $code = null)
    {
        $this->idSC = $idSC;
        $this->duree = $duree;
        $this->acces = $acces;
        $this->sujet = $sujet;
        $this->code = $code;
    }

    public function getIdSC()
    {
        return $this->idSC;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
        return $this;
    }

    public function getAcces()
    {
        return $this->acces;
    }

    public function setAcces($acces)
    {
        $this->acces = $acces;
        return $this;
    }

    public function getSujet()
    {
        return $this->sujet;
    }

    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}