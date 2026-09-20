<?php

include '../../../Controller/ratingConx.php';
include '../../../Model/rating.php';

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
        !empty($_POST['comment'])&&
        !empty($_POST['fk'])
    ) {
        /* foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        } */
        $rating = new rating(
            null,
            $_POST['note'],
            $_POST['comment'],
            $_POST['fk']
        );
        var_dump($rating);
        
        $ratingC=$ratingC->updaterating($rating, $_GET['id']);
        header('Location:listRatings.php');


    }
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listratings.php">Back to list</a></button>
    <hr>

    

        <form action="" method="POST">
            <table>
            
                <tr>
                    <td><label for="note">renote :</label></td>
                    <td>
                        <input type="text" id="note" name="note"  />
                    </td>
                </tr>
                <tr>
                    <td><label for="comment">new comment :</label></td>
                    <td>
                        <input type="text" id="comment" name="comment" />
                    </td>
                </tr>
                <tr>
                    <td><label for="fk">new fk :</label></td>
                    <td>
                        <input type="text" id="fk" name="fk" />
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

