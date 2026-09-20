<?php
include 'ReclamController.php';

$reclamController = new ReclamController();
$reclam_id = decryptId($_GET["ID_reclam"]);

if (isset($reclam_id)) {
    
    $reclamController->deleteReclam($reclam_id);

    header('Location: ../View/backoffice/pages/Reponce.php?order=asc&sort=ID_reclam&tab=tab1');
    exit(); 
}
?>
