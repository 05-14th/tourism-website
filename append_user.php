<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $currentDate = date("Y-m-d");
    $defaultRole = "User";

    $sql = "SELECT COUNT(*) as count FROM user WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];

        if ($count > 0) {
            echo "<script>window.location.href='signin.php'</script>";
        } else {
            if($cpassword == $password){
                $sql = "INSERT INTO user (username, fullname, email, password, contact_number, date_created, roles) VALUES ('$username', '$name', '$email', '$password', '$contact', '$currentDate', '$defaultRole')";
                if($conn->query($sql) == TRUE){
                    $getSql = "SELECT id FROM user WHERE username='$username'";
                    $getResult = $conn->query($getSql);
                    if ($getResult->num_rows > 0) {
                        while ($row = $getResult->fetch_assoc()) {
                            $_SESSION["userId"] = $row["id"];
                            break;
                        }
                        header("Location: index.php");
                    }
                } 
            } else {
                echo "<script>";
                echo "alert('Password do not match.')";
                echo "</script>";
            }
        }
    }
}
?>