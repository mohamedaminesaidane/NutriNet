<?php

require __DIR__ . '/../config.php';
class ItemsC
{





    public function listItemss()
    {
        $sql = "SELECT * FROM Items";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteItems($ide)
    {
        $sql = "DELETE FROM Items WHERE IdItems = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addItems($Items)
    {
        $sql = "INSERT INTO Items  
        VALUES (NULL, :nom,:description, :prix,:stock)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $Items->getNom(),
                'description' => $Items->getdescription(),
                'prix' => $Items->getprix(),
                'stock' => $Items->getstock(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showItems($id)
    {
        $sql = "SELECT * from Items where IdItems = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Items = $query->fetch();
            return $Items;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateItems($Items, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Items SET 
                    nom = :nom, 
                    description = :description, 
                    prix = :prix, 
                    stock = :stock
                WHERE IdItems= :IdItems'
            );
            
            $query->execute([
                'IdItems' => $id,
                'nom' => $Items->getNom(),
                'description' => $Items->getdescription(),
                'prix' => $Items->getprix(),
                'stock' => $Items->getstock(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
       // In your ItemsC class
       public function searchItemss($search)
       {
           // Implement your logic to search for Itemss based on the $search parameter
           // You can use SQL queries or any other method to filter the results
       
           // Example using prepared statement with PDO
           $sql = "SELECT * FROM Items WHERE nom LIKE :search";
           $db = config::getConnexion();
       
           // Prepare the statement
           $stmt = $db->prepare($sql);
       
           // Bind parameters
           $searchParam = "%$search%";
           $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
       
           // Execute the statement
           $stmt->execute();
       
           // Fetch the results into an associative array
           $Itemss = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
           // Close the statement
           $stmt->closeCursor();
       
           return $Itemss;
       }
       
}
