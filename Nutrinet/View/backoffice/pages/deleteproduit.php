<?php
include '../../../Controller/produitc.php';

// Create an instance of the ProduitC class
$produitC = new ProduitC();

// Check if the "idProduit" parameter is set in the URL
if (isset($_GET["idProduit"])) {
    // Call the deleteProduit method with the provided ID
    $produitC->deleteProduit($_GET["idProduit"]);

    // Redirect to the listProduits.php page after deletion
    header('Location: produit.php');
} else {
    // Handle the case where "idProduit" is not set
    echo "ID of the produit to delete is not provided.";
}
?>