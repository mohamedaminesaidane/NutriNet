<?php
include '../../../Controller/categoriec.php';

// Create an instance of the ProduitC class
$catC = new CategorieC();

// Check if the "idProduit" parameter is set in the URL
if (isset($_GET["id_cat"])) {
    // Call the deleteProduit method with the provided ID
    $catC->deleteCategorie($_GET["id_cat"]);

    // Redirect to the listProduits.php page after deletion
    header('Location: categories.php');
} else {
    // Handle the case where "idProduit" is not set
    echo "ID of the produit to delete is not provided.";
}
?>