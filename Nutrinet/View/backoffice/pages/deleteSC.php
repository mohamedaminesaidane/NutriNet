<?php
include '../../../Controller/SCC.php';

// Create an instance of the SCController class
$SCC = new SCC();

// Check if the "id" parameter is set in the URL
if (isset($_GET["id"])) {
    // Call the deleteSC method with the provided ID
    $SCC->deleteCoachingSession($_GET["id"]);

    // Redirect to the listSC.php page after deletion
    header('Location: listSC.php');
} else {
    // Handle the case where "id" is not set
    echo "ID of the SC to delete is not provided.";
}
?>