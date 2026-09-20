<?php
include "../../../Controller/produitc.php"; // Assurez-vous que le chemin est correct

$c = new ProduitC(); // Utilisez la classe ProduitC
$tab = $c->listProduits(); // Utilisez la méthode listProduits

?>

<center>
    <h1>List of Products</h1>
    <h2>
        <a href="ajoutprod.php">Add Product</a> <!-- Assurez-vous que le lien pointe vers le bon fichier -->
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Produit</th>
        <th>Nom</th>
        <th>Prix de Vente</th>
        <th>Prix d'Achat</th>
        <th>Description</th>
        <th>Nombre</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($tab as $produit) {
    ?>
        <tr>
            <td><?= $produit['idProduit']; ?></td>
            <td><?= $produit['nom']; ?></td>
            <td><?= $produit['prixVente']; ?></td>
            <td><?= $produit['prixAchat']; ?></td>
            <td><?= $produit['description']; ?></td>
            <td><?= $produit['nombre']; ?></td>
            <td>
                <a href="updateProduit.php?idProduit=<?php echo $produit['idProduit']; ?>">Update</a>
            </td>
            <td>
                <a href="deleteproduit.php?idProduit=<?php echo $produit['idProduit']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
