<?php

class Coach
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $sexe = null;
    private ?string $specialite = null;
    private ?string $diplome = null;
    private ?string $motdepasse = null;

    public function __construct($id = null, $nom, $prenom, $sexe, $specialite, $diplome, $motdepasse)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->specialite = $specialite;
        $this->diplome = $diplome;
        $this->motdepasse = $motdepasse;
    }

    public function getId()
    {
        return $this->id;
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

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    public function getSpecialite()
    {
        return $this->specialite;
    }

    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getDiplome()
    {
        return $this->diplome;
    }

    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
        return $this;
    }

    public function getMotDePasse()
    {
        return $this->motdepasse;
    }

    public function setMotDePasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
        return $this;
    }
}