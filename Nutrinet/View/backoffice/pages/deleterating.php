<?php
include '../../../Controller/ratingConx.php';
$ratingC = new ratingConx();
$ratingC->deleterating($_GET["id"]);
header('Location:listRatings.php');

?>