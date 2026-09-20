<?php
include '../../../Controller/CoachC.php';

// Create an instance of the ProduitC class
$coachC = new CoachC();

// Check if the "idProduit" parameter is set in the URL
if (isset($_GET["id"])) {
    // Call the deleteProduit method with the provided ID
    $coachC->deleteCoach($_GET["id"]);

    // Redirect to the listProduits.php page after deletion
    header('Location: listCoach.php');
} else {
    // Handle the case where "idProduit" is not set
    echo "ID of the produit to delete is not provided.";
}
?>