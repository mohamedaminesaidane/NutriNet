<?php

require 'conx.php';
class ratingConx
{

    public function Ratings() //tableau ratings de crud
    {
        $sql = "SELECT * FROM rating";
        $db = configuration::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function deleteRating($id)//m tableau crud rating
    {
        $sql = "DELETE FROM rating WHERE idRating = :id";
        $db = configuration::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    /*public function addrating($rating) //baad ma nekho note wel comment
    {
        $sql = "INSERT INTO rating  
        VALUES (NULL, :note,:commentaire,:fk)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'note' => $rating->getnote(),
                'commentaire' => $rating->getcomment(),
                'fk'=>$rating->getfk()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }*/
public function addrating($rating)
{
    $comment = $rating->getComment();
    $note = $rating->getnote();
    $fk = $rating->getfk();
    $db = configuration::getConnexion();

    
    $stmt = $db->prepare("INSERT INTO rating (commentaire, note, fkIdRecette) VALUES (:comment, :note, :fk)");

    // Liaison des paramètres
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':note', $note, PDO::PARAM_INT); 
    $stmt->bindParam(':fk', $fk, PDO::PARAM_INT); 

    // Exécution de la requête préparée
    $result = $stmt->execute();

    // Vous pouvez ajouter une logique supplémentaire ou des vérifications ici si nécessaire
    if (!$result) {
        $errorInfo = $stmt->errorInfo();
        var_dump($errorInfo);
        // Vous pouvez également logger l'erreur ou renvoyer une erreur appropriée
        return false;
    }

    // Retournez true ou quelque chose pour indiquer le succès de l'opération
    return true;
}
 


    public function showrating($id)//return note et comment
    {
        $sql = "SELECT * from rating where idRating = $id";
        $db = configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $rating = $query->fetch();
            return $rating;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updaterating($rating, $id)
    {
        $db = configuration::getConnexion();   
        try {
            
            $query = $db->prepare(
                'UPDATE rating SET 
                    note = :note, 
                    commentaire = :commentaire,
                    fkIdRecette = :fk
                    
                WHERE idRating= :id'
            );
            
            $query->execute([
                'id' => $id, // Changement ici pour correspondre à 'idRating' dans la requête
                'note' => $rating->getnote(),
                'commentaire' => $rating->getcomment(),
                'fk' => $rating->getfk()
            ]);
            
            $rating=$query->rowCount(); //. " records UPDATED successfully <br>";
            return $rating;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function recherche($idRecette) {
        try {
            $sql = "SELECT * FROM rating WHERE fkIdRecette = :idRecette";
            $db = configuration::getConnexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':idRecette', $idRecette, PDO::PARAM_INT);
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
    public function MoyRecette($id)
    {
        $sql = "SELECT AVG(note) as moyenne FROM rating WHERE fkIdRecette = :id";
        $db = configuration::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
    
            // Return the average rating
            return $result['moyenne'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

}



?>

