<?php
include '../../../Controller/recetteC.php';
$recetteC = new recetteC();
$recetteC->deleterecette($_GET["id"]);
header('Location:listrecettes.php');

?>