<?php
class Items
{
    private ?int $IdItems = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?string $prix = null;
    private ?string $stock = null;

    public function __construct($id = null, $n, $d, $p, $s)
    {
        $this->IdItems = $id;
        $this->nom = $n;
        $this->description = $d;
        $this->prix = $p;
        $this->stock = $s;
    }


    public function getItems()
    {
        return $this->IdItems;
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


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    public function getstock()
    {
        return $this->stock;
    }


    public function setstock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
}
