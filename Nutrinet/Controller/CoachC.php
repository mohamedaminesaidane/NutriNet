<?php

include __DIR__."/../config.php";

class CoachC
{

    public function listCoaches()
    {
        $sql = "SELECT * FROM coach";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCoach($id)
    {
        $sql = "DELETE FROM coach WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addCoach($coach)
    {
        $sql = "INSERT INTO coach  
        VALUES (:id, :nom, :prenom, :sexe, :specialite, :diplome, :motdepasse)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([

                'id' => $coach->getid(),
                'nom' => $coach->getNom(),
                'prenom' => $coach->getPrenom(),
                'sexe' => $coach->getSexe(),
                'specialite' => $coach->getSpecialite(),
                'diplome' => $coach->getDiplome(),
                'motdepasse' => $coach->getMotdepasse(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showCoach($id)
    {
        $sql = "SELECT * from coach where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $coach = $query->fetch();
            return $coach;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCoach($coach, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE coach SET 
                    nom= :nom, 
                    prenom= :prenom, 
                    sexe= :sexe, 
                    specialite= :specialite,
                    diplome= :diplome,
                    motdepasse= :motdepasse
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom' => $coach->getNom(),
                'prenom' => $coach->getPrenom(),
                'sexe' => $coach->getSexe(),
                'specialite' => $coach->getSpecialite(),
                'diplome' => $coach->getDiplome(),
                'motdepasse' => $coach->getMotDePasse(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCoachByNomPrenom($nom, $prenom) {
        $db = config::getConnexion();
        try {
            $query = $db->prepare("SELECT * FROM coach WHERE nom = :nom AND prenom = :prenom");
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->execute();
            $coach = $query->fetch(PDO::FETCH_ASSOC);
            return $coach;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getCoachById($id) {
        $db = config::getConnexion();
        try {
            $query = $db->prepare("SELECT * FROM coach WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
            $coach = $query->fetch(PDO::FETCH_ASSOC);
            return $coach;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




}
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




class roomC
{

    public function getAvailableRoom()
    {
        $sql = "SELECT * FROM room WHERE availability = 'yes' LIMIT 1";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $room = $query->fetch();
            return $room;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function updateRoomAvailability($idS, $availability)
    {
        $sql = "UPDATE room SET availability = :availability WHERE idS = :idS";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'availability' => $availability,
                'idS' => $idS,
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    public function getRoomById($idS)
    {
        $sql = "SELECT * FROM room WHERE idS = :idS";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idS' => $idS]);
            $room = $query->fetch();
            return $room;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}