<?php

include '../../../Controller/recetteC.php';
include '../../../Model/recette.php';

// create recette
$recette = null;

// create an instance of the controller
$recetteC = new recetteC();
if (
    isset($_POST["description"]) &&
    isset($_POST["url"])&&
    isset($_POST["vid"])&&
    isset($_POST["ing"])
) {
    if (
        !empty($_POST['description']) &&
        !empty($_POST["url"]) &&
        !empty($_POST["vid"])  &&
        !empty($_POST["ing"]) 
    ) {
        $recette = new recette(
            null,
            $_POST['description'],
            $_POST['url'],
            $_POST['vid'],
            $_POST['ing']
        );
        $recetteC->addrecette($recette);
        header('Location:listrecettes.php');
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recette </title>
</head>

<body>
    <a href="listrecettes.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                </td>
            </tr>
            <tr>
                <td><label for="url">url :</label></td>
                <td>
                    <input type="text" id="url" name="url" />
                </td>
            </tr>
           
            <tr>
                <td><label for="vid">lien :</label></td>
                <td>
                    <input type="text" id="vid" name="vid" />
                </td>
            </tr>
            <tr>
                <td><label for="ingrédients">les ingredients :</label></td>
                <td>
                    <input type="text" id="ing" name="ing" />
                </td>
            </tr>
            <td>
                <input type="submit" onclick="return verifierSaisie()" value="save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    <script>
        function verifierSaisie() {
            // Récupérer la saisie de l'url
            var saisieUrl = document.getElementById("url").value;

            // Vérifier si la saisie se trouve dans la liste
            if (saisieUrl === "") {
                alert("La valeur est autorisée.");
            }
        }
    </script>
</body>

</html>