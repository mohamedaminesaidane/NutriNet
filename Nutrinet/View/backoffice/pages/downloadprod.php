<?php
include "../../../Controller/produitc.php";

$c = new ProduitC();
$catc = new CategorieC(); // Create an instance of the CategorieC class

// Fetch user data
$pro = $c->listProduits();
$tab = $pro->fetchAll(PDO::FETCH_ASSOC);

// Create a CSV file
$csvFileName = 'productlist.csv';
$csvFile = fopen($csvFileName, 'w');

// Add headers to the CSV file
$headers = array(
    'nom',
    'prixVente',
    'prixAchat',
    'description',
    'nombre',
    'image',
    'cat'
);
fputcsv($csvFile, $headers);

// Add user data to the CSV file
foreach ($tab as $produit) {
    // Fetch category name using category ID
    $categoryId = $produit['cat'];
    $cat = $catc->showCategorie($categoryId);

    // Add category name to the user data
    $produit['cat'] = $cat['nom'];

    // Write the modified user data to the CSV file
    fputcsv($csvFile, array_values($produit));
}

// Close the CSV file
fclose($csvFile);

// Set headers for file download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
header('Pragma: no-cache');
readfile($csvFileName);

// Remove the generated CSV file after download
unlink($csvFileName);
?>
