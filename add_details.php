<?php
require_once 'config.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])){
    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $activities = $_POST['activities'];
        $description = $_POST['description'];
        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
    
        // Read file content
        $fileContent = file_get_contents($fileTmpName);
        $uploadDirectory = "uploads/"; // Directory to store uploaded files

        // Move uploaded file to the upload directory
        $destination = $uploadDirectory . $fileName;
        move_uploaded_file($fileTmpName, $destination);
    
        // Escape special characters to prevent SQL injection
        $escapedFileName = $conn->real_escape_string($fileName);
        $escapedFileContent = $conn->real_escape_string($fileContent);

        $dateString = $_POST['date'];
        $date = date('Y-m-d',strtotime($dateString));
        
        $insert_query = "INSERT INTO touristSpot (place_name, location, activities, description, picture, date_posted) VALUES ('$name',' $location','$activities', '$description', '$escapedFileName', '$date')";
        if ($conn->query($insert_query) === TRUE) {
            header("Location: admin_control.php");
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullname'])){
    $user_fn= $_POST['fullname'];
    $user_un= $_POST['username'];
    $user_email = $_POST['email'];
    $user_contact = $_POST['contact-num'];
    $user_pass = $_POST['password'];
    $date_creation = $_POST['date_created'];
    $date = date('Y-m-d',strtotime($date_creation));
    $roles = $_POST['roles'];

    $insert_user = "INSERT INTO user (fullname, username, email, password, contact_number, date_created, roles) VALUES ('$user_fn', '$user_un', '$user_email', '$user_pass', '$user_contact', '$date', '$roles')";
    if ($conn->query($insert_user) === TRUE) {
        header("Location: user_management.php");
    } else {
        echo "Error: " . $insert_user . "<br>" . $conn->error;
    }
}

?>