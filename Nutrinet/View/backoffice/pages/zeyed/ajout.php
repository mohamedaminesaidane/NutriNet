<?php

include '../../../Controller/ProduitC.php';
include '../../../Model/Produit.php';

// create product
$produit = null;

// create an instance of the controller
$produitC = new ProduitC();
if (
    isset($_POST["prixVente"]) &&
    isset($_POST["prixAchat"]) &&
    isset($_POST["description"]) &&
    isset($_POST["nombre"]) &&
    isset($_POST["nom"])
) {
    if (
        !empty($_POST["prixVente"]) &&
        !empty($_POST["prixAchat"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["nombre"]) &&
        !empty($_POST["nom"])
    ) {
        $produit = new Produit(
            null,$_POST["prixVente"],
            $_POST["prixAchat"],
            $_POST["description"],
            $_POST["nombre"],
            $_POST["nom"]
            
        );
        $produitC->addProduit($produit);
        header('Location: listProduits.php');
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>
    <a href="listProduits.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="prixVente">Prix de Vente :</label></td>
                <td>
                    <input type="text" id="prixVente" name="prixVente" />
                </td>
            </tr>
            <tr>
                <td><label for="prixAchat">Prix d'Achat :</label></td>
                <td>
                    <input type="text" id="prixAchat" name="prixAchat" />
                </td>
            </tr>
            <tr>
                <td><label for="description">Description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                </td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre :</label></td>
                <td>
                    <input type="text" id="nombre" name="nombre" />
                </td>
            </tr>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                </td>
            </tr>

            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
    </form>
</body>

</html>
