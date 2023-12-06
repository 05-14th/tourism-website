<?php
session_start();
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $confirm_sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $confirm_result = $conn->query($confirm_sql);
    if($confirm_result->num_rows > 0){
        $row = $confirm_result->fetch_assoc();
        $roles = $row["roles"];
        $_SESSION["userId"] = $row['id'];
        if ($roles == "Admin"){
            echo "<script>window.location.href = 'admin-dashboard.php'</script>";
        } else{
            echo "<script>window.location.href = 'index.php'</script>";
        }
    } else{
        echo "No Data Found";
    }
}
?>
