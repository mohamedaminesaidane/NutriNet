<?php

include "../../../Controller/ratingConx.php";
include "../../../Model/rating.php";

// create client
$rating = null;

// create an instance of the controller
$ratingC = new ratingConx();
if (
    isset($_POST["note"]) &&
    isset($_POST["comment"]) &&
    isset($_POST["fk"])
) {
    if (
        !empty($_POST['note']) &&
        !empty($_POST["comment"]) &&
        !empty($_POST["fk"]) 
    ) {
        $rating = new rating(
            null,
            $_POST['note'],
            $_POST['comment'],
            $_POST['fk']
        );
        $ratingC->addrating($rating);
        header('Location:listRatings.php');
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
    <a href="listRatings.php">Back to list </a>
    <hr>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="note">description :</label></td>
                <td>
                    <input type="text" id="note" name="note" />
                </td>
            </tr>
            <tr>
                <td><label for="comment">commentaire :</label></td>
                <td>
                    <input type="text" id="comment" name="comment" />
                </td>
            </tr>
            <tr>
                <td><label for="fk"> foreign key :</label></td>
                <td>
                    <input type="text" id="fk" name="fk" />
                </td>
            </tr>


            <td>
                <input type="submit"  value="save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    
</body>

</html>