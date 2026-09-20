

<?php

include '../../Controller/roomC.php';
include '../../Model/room.php';
include 'crud.php';

$roomC = new roomC();
$roomC->updateRoomAvailability($idS, 'no');


header("Location: seance/index.php" );



?>









