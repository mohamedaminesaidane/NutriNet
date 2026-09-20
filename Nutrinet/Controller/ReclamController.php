<?php
require 'config.php';

class ReclamController
{
    public function listReclams()
    {
        $sql = "SELECT * FROM reclam";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReclam($id)
    {
        $sqlDelete = "DELETE FROM reclam WHERE id_reclam = :id";
        $sqlMaxId = "SELECT MAX(id_reclam) FROM reclam";
        $sqlAlter = "ALTER TABLE reclam AUTO_INCREMENT = :max_id";
        $db = config::getConnexion();
    
        try {
            $reqDelete = $db->prepare($sqlDelete);
            $reqDelete->bindValue(':id', $id);
            $reqDelete->execute();
    
            $maxId = (int) $db->query($sqlMaxId)->fetchColumn();

            $reqAlter = $db->prepare($sqlAlter);
            $reqAlter->bindValue(':max_id', $maxId,PDO::PARAM_INT);
            $reqAlter->execute();

        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }

        $sqlMaxId = "SELECT MAX(ID_Response) FROM response";
        $sqlAlter = "ALTER TABLE response AUTO_INCREMENT = :max_id";
        $db = config::getConnexion();

        try {

            $maxId = (int) $db->query($sqlMaxId)->fetchColumn();

            $reqAlter = $db->prepare($sqlAlter);
            $reqAlter->bindValue(':max_id', $maxId,PDO::PARAM_INT);
            $reqAlter->execute();

        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclam($reclam) 
    {
        $sql = "INSERT INTO reclam  
        VALUES (NULL, :nom, :title, :description, :email, :category, :date_response, :status)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclam->getNom(),
                'title' => $reclam->getTitle(),
                'description' => $reclam->getDescription(),
                'email' => $reclam->getEmail(),
                'category' => $reclam->getCategory(),
                'date_response' => $reclam->getDateResponse(),
                'status' => $reclam->getStatus()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showReclam($id)
    {
        $sql = "SELECT * from reclam where id_reclam = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclam = $query->fetch();
            return $reclam;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReclam($reclam, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclam SET 
                    nom = :nom, 
                    title = :title, 
                    description = :description, 
                    mail = :mail,
                    category = :category,
                    date = :date,
                    status = :status
                WHERE id_reclam = :id_reclam'
            );
            
            $query->execute([
                'id_reclam' => $id,
                'nom' => $reclam->getNom(),
                'title' => $reclam->getTitle(),
                'description' => $reclam->getDescription(),
                'mail' => $reclam->getEmail(),
                'category' => $reclam->getCategory(),
                'date' => $reclam->getDateResponse(),
                'status' => $reclam->getStatus()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




}
class ResponseController
{
    public function listResponses()
    {
        $sql = "SELECT * FROM response";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteResponse($id)
    {
        $sqlDelete = "DELETE FROM response WHERE ID_Response = :id";
        $sqlMaxId = "SELECT MAX(ID_Response) FROM response";
        $sqlAlter = "ALTER TABLE response AUTO_INCREMENT = :max_id";
        $db = config::getConnexion();

        try {
            $reqDelete = $db->prepare($sqlDelete);
            $reqDelete->bindValue(':id', $id);
            $reqDelete->execute();

            
            $maxId = (int) $db->query($sqlMaxId)->fetchColumn();

            $reqAlter = $db->prepare($sqlAlter);
            $reqAlter->bindValue(':max_id', $maxId,PDO::PARAM_INT);
            $reqAlter->execute();

        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addResponse($response)
    {
        $sql = "INSERT INTO response  
        VALUES (NULL, :title, :mail, :message, :date, :nom, :id_reclam)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $response->getTitle(),
                'mail' => $response->getMail(),
                'message' => $response->getMessage(),
                'date' => $response->getDate(),
                'nom' => $response->getNom(),
                'id_reclam' => $response->getIdReclam()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showResponse($id)
    {
        $sql = "SELECT * FROM response WHERE ID_Response = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $response = $query->fetch();
            return $response;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateResponse($response, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE response SET 
                    Title = :Title, 
                    Mail = :Mail, 
                    Message = :Message, 
                    Date = :Date,
                    Nom = :Nom,
                    ID_reclam = :ID_reclam
                WHERE ID_Response = :ID_Response'
            );

            $query->execute([
                'ID_Response' => $id,
                'Title' => $response->getTitle(),
                'Mail' => $response->getMail(),
                'Message' => $response->getMessage(),
                'Date' => $response->getDate(),
                'Nom' => $response->getNom(),
                'ID_reclam' => $response->getIdReclam()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function getResponsesByReclamId($id)
    {
        $sql = "SELECT * FROM response WHERE ID_reclam = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $responses = $query->fetchAll();
            return $responses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



}
?>
<!---------------------------M1------------------------------------------->

<?php
 function encryptId($id)
 {
     $encryptionKey = ($id * 3598) + 4386; 
 
     $id = $encryptionKey;
     $idString = strval($id);
 
     $cipherMap = [
         '0' => 'L', '1' => 'X', '2' => 'J', '3' => 'R', '4' => 'N',
         '5' => 'Y', '6' => 'P', '7' => 'W', '8' => 'A', '9' => 'M'
     ];
 
     $reversedId = strrev($idString);
 
     $encryptedId = strtr($reversedId, $cipherMap);
 
     $cipherMap2 = [
         'A' => '7', 'B' => 'r', 'C' => '5', 'D' => 'K', 'E' => 'x',
         'F' => '9', 'G' => 'b', 'H' => '3', 'I' => '2', 'J' => 'D',
         'K' => 'm', 'L' => 'Q', 'M' => 'f', 'N' => 'n', 'O' => 't',
         'P' => '8', 'Q' => '1', 'R' => 'a', 'S' => 'u', 'T' => 'V',
         'U' => 'j', 'V' => 'y', 'W' => 'o', 'X' => '6', 'Y' => 'A',
         'Z' => 'c'
     ];
     $encryptedId = strtr($encryptedId, $cipherMap2);
 
     return $encryptedId;
 }
 
 function decryptId($encryptedId)
 {
     $reverseCipherMap = array_flip([
         '0' => 'L', '1' => 'X', '2' => 'J', '3' => 'R', '4' => 'N',
         '5' => 'Y', '6' => 'P', '7' => 'W', '8' => 'A', '9' => 'M'
     ]);
 
     $reverseCipherMap2 = array_flip([
        'A' => '7', 'B' => 'r', 'C' => '5', 'D' => 'K', 'E' => 'x',
        'F' => '9', 'G' => 'b', 'H' => '3', 'I' => '2', 'J' => 'D',
        'K' => 'm', 'L' => 'Q', 'M' => 'f', 'N' => 'n', 'O' => 't',
        'P' => '8', 'Q' => '1', 'R' => 'a', 'S' => 'u', 'T' => 'V',
        'U' => 'j', 'V' => 'y', 'W' => 'o', 'X' => '6', 'Y' => 'A',
        'Z' => 'c'
     ]);
 
     $decryptedId = strtr($encryptedId, $reverseCipherMap2);
 
     $decryptedId = strtr($decryptedId, $reverseCipherMap);

     $decryptedId = strrev($decryptedId);
     
     $decryptedId = intval($decryptedId);
 
     $decryptedId -= 4386;
     $decryptedId /= 3598;
 
     return $decryptedId;
 }


?>
<!---------------------------M2------------------------------------------->

<?php

function getSortingOrder() {
    return isset($_GET['order']) && $_GET['order'] === 'desc' ? 'asc' : 'desc';
}

function generateR($column, $tab) {
    $order = getSortingOrder();
    
    $queryParams = $_GET;
    
    $queryParams['order'] = $order;
    $queryParams['sort'] = $column;
    $queryParams['tab'] = $tab;

    return '?' . http_build_query($queryParams);
}


function sortR($selectedReclamResponses, $tab) {
    if (isset($_GET['sort']) && isset($_GET['tab']) && $_GET['tab'] == $tab) {
        $orderBy = getSortingOrder();
        $sortColumn = $_GET['sort'];

        if (!empty($sortColumn) && !empty($selectedReclamResponses)) {
            usort($selectedReclamResponses, function ($a, $b) use ($sortColumn, $orderBy) {
                return $orderBy === 'asc' ? strcmp($b[$sortColumn], $a[$sortColumn]) : strcmp($a[$sortColumn], $b[$sortColumn]);
            });
        }
    }

    return $selectedReclamResponses;
}

?>
<!---------------------------M3------------------------------------------->


<?php

class CaptchaController
{
    public function listCaptchas()
    {
        $sql = "SELECT * FROM captcha";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
?>

<?php

function getRandomCaptcha($captchas)
{
    $randomIndex = mt_rand(1, count($captchas)) - 1;
    return $captchas[$randomIndex];
}

?>







