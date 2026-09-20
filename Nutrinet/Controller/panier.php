<?php

require __DIR__ . '/../config.php';

class PanierC
{
    public function listPaniers()
    {
        $sql = "SELECT panier.*, user.name
                FROM panier
                INNER JOIN user ON panier.idUser = user.id";
        $db = Config::getConnexion();
    
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function deletePanier($idPanier)
    {
        $sql = "DELETE FROM panier WHERE idPanier = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idPanier);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addPanier($panier)
    {
        $sql = "INSERT INTO panier (idPanier, produit, prix, quantite, idItems, idUser)
                VALUES (NULL, :produit, :prix, :quantite, :idItems, :idUser)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'produit' => $panier->getProduit(),
                'prix' => $panier->getPrix(),
                'quantite' => $panier->getQuantite(),
                'idItems' => $panier->getIdItems(),
                'idUser' => $panier->getIdUser(),
            ]);
        } catch (Exception $e) {
            error_log('Error adding panier: ' . $e->getMessage());
            echo 'Error adding panier: ' . $e->getMessage();
        }
    }
    
    

    function showPanier($idPanier)
    {
        $sql = "SELECT * FROM panier WHERE idPanier = $idPanier";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $panier = $query->fetch();
            return $panier;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatePanier($panier, $idPanier)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE Panier SET 
                    produit = :produit, 
                    prix = :prix, 
                    quantite = :quantite, 
                    idItems = :idItems, 
                    idUser = :idUser
                WHERE idPanier = :idPanier'
            );

            $query->execute([
                'idPanier' => $idPanier,
                'produit' => $panier->getProduit(),
                'prix' => $panier->getPrix(),
                'quantite' => $panier->getQuantite(),
                'idItems' => $panier->getIdItems(),
                'idUser' => $panier->getIdUser(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
