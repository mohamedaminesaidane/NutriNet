<?php

// require 'config.php';
include __DIR__."/../config.php";

class ProduitC
{

    public function listProduits()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteProduit($idProduit)
    {
        $sql = "DELETE FROM produit WHERE idProduit = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idProduit);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addProduit($produit)
    {
        $sql = "INSERT INTO produit  
                VALUES (NULL, :nom, :prixVente, :prixAchat, :description, :nombre,:image,:cat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $produit->getNom(),
                'prixVente' => $produit->getPrixVente(),
                'prixAchat' => $produit->getPrixAchat(),
                'description' => $produit->getDescription(),
                'nombre' => $produit->getNombre(),
                'image'=> $produit->getImage(),
                'cat'=> $produit->getCat(),
            ]);
    
            // Check if the insertion was successful
            if ($query->rowCount() > 0) {
                echo "Product added successfully";
            } else {
                echo "Error: Product not added";
            }
        } catch (PDOException $e) {
            echo 'Error adding product: ' . $e->getMessage();
        }
    }


    function showProduit($id)
    {
        $sql = "SELECT * from produit where idProduit = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateProduit($produit, $idProduit)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom = :nom, 
                    prixVente = :prixVente, 
                    prixAchat = :prixAchat, 
                    description = :description, 
                    nombre = :nombre,
                    image = :image,
                    cat = :cat
                WHERE idProduit= :idProduit'
            );
            
            $query->execute([
                'idProduit' => $idProduit,
                'nom' => $produit->getNom(),
                'prixVente' => $produit->getPrixVente(),
                'prixAchat' => $produit->getPrixAchat(),
                'description' => $produit->getDescription(),
                'nombre' => $produit->getNombre(),
                'image'=> $produit->getImage(),
                'cat'=> $produit->getCat(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function listProduitsSortedByNombre()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $produits = $liste->fetchAll(PDO::FETCH_ASSOC);
            usort($produits, function($a, $b) {
                return $a['nombre'] - $b['nombre'];
            });

            return $produits;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listProduitsSortedByNombreWithCategories()
{
    $sql = "SELECT c.nom as catNom, SUM(p.nombre) as totalQuantity
            FROM produit p
            INNER JOIN categorie c ON p.cat = c.id_cat
            GROUP BY c.nom";
            
    $db = config::getConnexion();
    
    try {
        $liste = $db->query($sql);
        $categoriesData = $liste->fetchAll(PDO::FETCH_ASSOC);

        return $categoriesData;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function listProduitsSortedByProfitsWithNames()
{
    $sql = "SELECT p.nom as productName,(p.prixVente-p.prixAchat) as totalProfits
            FROM produit p
            GROUP BY p.nom";
            
    $db = config::getConnexion();
    
    try {
        $liste = $db->query($sql);
        $productsData = $liste->fetchAll(PDO::FETCH_ASSOC);

        return $productsData;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}






    public function listProduitsSortedByPriceAsc()
    {
        $sql = "SELECT * FROM produit ORDER BY prixVente ASC";
        return $this->fetchProductsByQuery($sql);
    }

    public function listProduitsSortedByPriceDesc()
    {
        $sql = "SELECT * FROM produit ORDER BY prixVente DESC";
        return $this->fetchProductsByQuery($sql);
    }

    public function listProduitsSortedByNumberAsc()
    {
        $sql = "SELECT * FROM produit ORDER BY nombre ASC";
        return $this->fetchProductsByQuery($sql);
    }

    public function listProduitsSortedByNumberDesc()
    {
        $sql = "SELECT * FROM produit ORDER BY nombre DESC";
        return $this->fetchProductsByQuery($sql);
    }

    // Helper function to fetch products based on a given SQL query
    private function fetchProductsByQuery($sql)
    {
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getProduitById($productId) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM produit WHERE id = :id");
        $stmt->bindValue(":id", $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }





}
class CategorieC
{

    public function listCategories()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCategorie($id_cat)
    {
        $sql = "DELETE FROM categorie WHERE id_cat = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_cat);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCategorie($categorie)
    {
        $sql = "INSERT INTO categorie  
                VALUES (NULL, :nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $categorie->getNom(),
            ]);
    
            // Check if the insertion was successful
            if ($query->rowCount() > 0) {
                echo "Category added successfully";
            } else {
                echo "Error: Category not added";
            }
        } catch (PDOException $e) {
            echo 'Error adding category: ' . $e->getMessage();
        }
    }

    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where id_cat = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCategorie($categorie, $id_cat)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nom = :nom
                WHERE id_cat= :id_cat'
            );
            
            $query->execute([
                'id_cat' => $id_cat,
                'nom' => $categorie->getNom(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function affichprod($id_genre)
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit WHERE cat = :id";
        $query = $db->prepare($sql);
        $query->execute(['id' => $id_genre]);
        return $query->fetchAll();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function affichcat()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT * FROM categorie";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
}
?>
