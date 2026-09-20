<?php
include 'ReclamController.php';

$ResponseController = new ResponseController();

$Response_id =decryptId( $_GET["ID_Response"]);

if (isset($Response_id)) {

    $ResponseController->deleteResponse($Response_id);

    header('Location: ../View/backoffice/pages/Reponce.php?order=asc&sort=ID_reclam&tab=tab1');
    exit(); 
}
?>
