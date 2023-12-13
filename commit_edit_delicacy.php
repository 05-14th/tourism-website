<?php
require_once 'config.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id-container'])){
    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $id = $_POST['id-container'];
        $name = $_POST['name'];
        $location = $_POST['location'];
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
        
        $update_query = "UPDATE delicacy SET delicacy_name = '$name',  description = '$location', image='$escapedFileName' WHERE delicacy_id='$id'";
        if ($conn->query($update_query) === TRUE) {
            header("Location: delicacy_monitoring.php");
        } else {
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }
    } else {
        $id = $_POST['id-container'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        
        $update_query = "UPDATE delicacy SET delicacy_name = '$name', description = '$location' WHERE delicacy_id='$id'";
        if ($conn->query($update_query) === TRUE) {
            header("Location: delicacy_monitoring.php");
        } else {
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }
    }
}

session_destroy();
?>