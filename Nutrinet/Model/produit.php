<?php
class Produit
{
    private ?int $idProduit = null;
    private ?string $nom = null;
    private ?float $prixVente = null;
    private ?float $prixAchat = null;
    private ?string $description = null;
    private ?int $nombre = null;
    private ?string $image = null;
    private ?string $cat = null;
    public function __construct($id = null, $n, $prixVente, $prixAchat, $desc, $nombre,$image,$cat)
    {
        $this->idProduit = $id;
        $this->nom = $n;
        $this->prixVente = $prixVente;
        $this->prixAchat = $prixAchat;
        $this->description = $desc;
        $this->nombre = $nombre;
        $this->image = $image;
        $this->cat = $cat;
    }

    public function getIdProduit()
    {
        return $this->idProduit;
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

    public function getPrixVente()
    {
        return $this->prixVente;
    }

    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;
        return $this;
    }

    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    public function getCat()
    {
        return $this->cat;
    }

    public function setCat($cat)
    {
        $this->cat = $cat;
        return $this;
    }
}
?>