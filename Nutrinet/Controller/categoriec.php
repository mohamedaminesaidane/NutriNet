<?php

include __DIR__."/../config.php";

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
