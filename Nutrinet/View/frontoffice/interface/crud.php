
<?php

if (
    isset($_GET['APP_ID']) &&
    isset($_GET['TOKEN']) &&
    isset($_GET['CHANNEL'])
) {
    $APP_ID = $_GET['APP_ID'];
    $TOKEN = $_GET['TOKEN'];
    $CHANNEL = $_GET['CHANNEL'];

    // Your code logic goes here

    // Example: Output the values to verify
    echo "APP_ID: $APP_ID, TOKEN: $TOKEN, CHANNEL: $CHANNEL";
} else {

    echo "One or more parameters are missing.";
}


header("Location: index.php");


?>