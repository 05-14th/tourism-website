<?php
require_once 'config.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])){
    $placeId = $_POST["id-container"];

    $delete_query = "DELETE FROM touristSpot WHERE place_id='$placeId'";
    if ($conn->query($delete_query) === TRUE) {
        header("Location: admin_control.php");
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}

?>