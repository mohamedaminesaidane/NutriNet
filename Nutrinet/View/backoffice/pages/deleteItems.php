<?php
    include "../../../Controller/Items.php";
    $Items = new ItemsC();
    $Items->deleteItems($_GET["IdItems"]);
    header('Location:billing.php');

        