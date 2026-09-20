<?php
class Categorie
{
    private ?int $id_cat = null;
    private ?string $nom = null;

    public function __construct($id = null, $nom)
    {
        $this->id_cat = $id;
        $this->nom = $nom;
    }

    public function getid_cat()
    {
        return $this->id_cat;
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
}
?>
