<?php
    include "../../Controller/panier.php";
    $panier = new PanierC();
    $panier->deletePanier($_GET["idPanier"]);
    header('Location:panier.php');

        