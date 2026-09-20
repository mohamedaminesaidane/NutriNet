<?php

include '../../../controller/recetteC.php';
include '../../../model/recette.php';

// create recette
$recette = null;
// create an instance of the controller
$recetteC = new recetteC();



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h1, h2, p {
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 10px;
        }

        .ingredient-icon {
            font-size: 36px;
        }
    </style>
</head>

<body>
<?php
    if (isset($_GET['id'])) {
        $recette=$recetteC->showrecette($_GET['id']); 
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';   
?>
    <h2>Ingrédients</h2>
        <ul>
            <?php foreach ($recette->getingr() as $ingredient) : ?>
                <li>
                    <i class="fas fa-carrot ingredient-icon"></i>
                    <?= trim($ingredient) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        

    <?php
    }
    ?>
</body>

</html>