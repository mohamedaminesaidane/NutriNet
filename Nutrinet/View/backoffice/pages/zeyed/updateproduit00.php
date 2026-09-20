<?php
include '../../../Controller/produitc.php';
include '../../../Model/produit.php';

// create product
$produit = null;

// create an instance of the controller
$produitC = new ProduitC();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prixVente"]) &&
    isset($_POST["prixAchat"]) &&
    isset($_POST["description"]) &&
    isset($_POST["nombre"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prixVente"]) &&
        !empty($_POST["prixAchat"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["nombre"])
    ) {
        $produit = new Produit(
            null,
            $_POST['nom'],
            $_POST['prixVente'],
            $_POST['prixAchat'],
            $_POST['description'],
            $_POST['nombre']
        );

        // Assuming you have an updateProduit method in your ProduitC class
        $produitC->updateProduit($produit, $_GET['idProduit']);

        header('Location:produit.php');
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
</head>

<body>
    <button><a href="produit.php">Back to list</a></button>
    <hr>

    <?php
    if (isset($_GET['idProduit'])) {
        $oldProduit = $produitC->showProduit($_GET['idProduit']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">IdProduit :</label></td>
                    <td>
                        <input type="text" id="idProduit" name="idProduit" value="<?php echo $_GET['idProduit'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $oldProduit['nom'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prixVente">Prix de Vente :</label></td>
                    <td>
                        <input type="text" id="prixVente" name="prixVente" value="<?php echo $oldProduit['prixVente'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="prixAchat">Prix d'Achat :</label></td>
                    <td>
                        <input type="text" id="prixAchat" name="prixAchat" value="<?php echo $oldProduit['prixAchat'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="description">Description :</label></td>
                    <td>
                        <textarea id="description" name="description" rows="5" cols="30"><?php echo $oldProduit['description'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre :</label></td>
                    <td>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $oldProduit['nombre'] ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
