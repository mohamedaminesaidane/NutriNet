<?php

class Panier
{
    private ?int $idPanier = null;
    private ?string $produit = null;
    private ?int $prix = null;
    private ?int $quantite = null;
    private ?int $idItems = null;
    private ?int $idUser = null;

    public function __construct($idPanier, $produit, $prix, $quantite, $idItems, $idUser)
    {
        $this->idPanier = $idPanier;
        $this->produit = $produit;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->idItems = $idItems;
        $this->idUser = $idUser;
    }

    public function getIdPanier()
    {
        return $this->idPanier;
    }

    public function getProduit()
    {
        return $this->produit;
    }

    public function setProduit($produit)
    {
        $this->produit = $produit;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getIdItems()
    {
        return $this->idItems;
    }

    public function setIdItems($idItems)
    {
        $this->idItems = $idItems;
        return $this;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}
?>
