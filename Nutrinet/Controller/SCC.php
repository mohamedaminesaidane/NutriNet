<?php

include __DIR__."/../config.php";

class SCC
{

    public function listCoachingSessions()
    {
        $sql = "SELECT * FROM coaching_session";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCoachingSession($idSC)
    {
        $sql = "DELETE FROM coaching_session WHERE idSC = :idSC";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idSC', $idSC);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addCoachingSession($coachingSession, $coachId)
    {
        $idSC = $coachId; // Assign the coach's ID to the idSC attribute
    
        $sql = "INSERT INTO coaching_session (idSC, duree, acces, sujet, code)  
        VALUES (:idSC, :duree, :acces, :sujet, :code)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idSC' => $idSC,
                'duree' => $coachingSession->getDuree(),
                'acces' => $coachingSession->getAcces(),
                'sujet' => $coachingSession->getSujet(),
                'code' => $coachingSession->getCode(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showCoachingSession($idSC)
    {
        $sql = "SELECT * from coaching_session where idSC = :idSC";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idSC', $idSC);
            $query->execute();
            $coachingSession = $query->fetch();
            return $coachingSession;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCoachingSession($coachingSession, $idSC)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE coaching_session SET 
                    duree = :duree, 
                    acces = :acces, 
                    sujet = :sujet, 
                    code = :code
                WHERE idSC = :idSC'
            );
            
            $query->execute([
                'idSC' => $idSC,
                'duree' => $coachingSession->getDuree(),
                'acces' => $coachingSession->getAcces(),
                'sujet' => $coachingSession->getSujet(),
                'code' => $coachingSession->getCode(),
            ]);
            
            echo $query->rowCount() . " records updated successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}