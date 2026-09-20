<?php
require 'config.php';

class ResponseController
{
    public function listResponses()
    {
        $sql = "SELECT * FROM response";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteResponse($id)
    {
        $sqlDelete = "DELETE FROM response WHERE ID_Response = :id";
        $db = config::getConnexion();

        try {
            $reqDelete = $db->prepare($sqlDelete);
            $reqDelete->bindValue(':id', $id);
            $reqDelete->execute();
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
                    title = :title, 
                    mail = :mail, 
                    message = :message, 
                    date = :date,
                    nom = :nom,
                    id_reclam = :id_reclam
                WHERE ID_Response = :id'
            );

            $query->execute([
                'id' => $id,
                'title' => $response->getTitle(),
                'mail' => $response->getMail(),
                'message' => $response->getMessage(),
                'date' => $response->getDate(),
                'nom' => $response->getNom(),
                'id_reclam' => $response->getIdReclam()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>