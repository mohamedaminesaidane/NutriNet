<?php

require 'config.php';

class recetteC
{

    public function listrecettes()
    {
        $sql = "SELECT * FROM recette";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleterecette($id)
    {
        $sql = "DELETE FROM recette WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function addrecette($recette)
    {
        $sql = "INSERT INTO recette  
        VALUES (NULL, :description,:url,:video_id, :ingredients)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'description' => $recette->getdescription(),
                'url' => $recette->geturl(),
                'video_id' => $recette->getvid(),
                'ingredients' => $recette->getingr()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


   


    public function showrecette($id)
    {
        $sql = "SELECT * FROM recette WHERE id = :id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            
            $recette = $query->fetch(PDO::FETCH_ASSOC);
            
            // Assuming you have a method geting() in your Recette class
        
            $ingredients = explode('-', $recette['ingredients']);
            $recette['ingredients'] = $ingredients;

            return $recette;
        } catch (PDOException $e) {
            // Handle the exception (log it, display an error message, etc.)
            die('Error: ' . $e->getMessage());
        }
    }


    public function updaterecette($recette, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE recette SET 
                    description = :description, 
                    url = :url,
                    video_id = :video_id,
                    ingredients = :ingredients

                    
                WHERE id= :id"
            );
            
            $query->execute([
                'id' => $id,
                'description' => $recette->getdescription(),
                'url' => $recette->geturl(),
                'video_id' => $recette->getvid(),
                'ingredients' => $recette->getingr()
            ]);
            
            $recette=$query->rowCount(); //. " records UPDATED successfully <br>";
            return $recette;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function recherche($descrip) {
        try {
            $sql = "SELECT * FROM recette WHERE description = :descrip";
            $db = config::getConnexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR); // Use $descrip instead of $description
            $stmt->execute();
    
            // Récupérer les résultats sous forme de tableau associatif
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } catch (PDOException $e) {
            // Gérer les erreurs de la manière qui convient à votre application
            // Par exemple, vous pourriez logger l'erreur et renvoyer une valeur par défaut
            error_log('Erreur lors de la recherche d\'évaluations : ' . $e->getMessage());
            return array();
        }
    }
}
