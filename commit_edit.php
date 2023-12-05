<?php
require_once 'config.php';
session_start();




if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id-container'])){
    if ($_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $id = $_POST['id-container'];
        $name = $_POST['place_name'];
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

        $date = date('Y-m-d');
        
        $update_query = "UPDATE touristSpot SET place_name = '$name', location = '$location', activities = '$activities', description = '$description', picture='$escapedFileName', date_updated='$date' WHERE place_id='$id'";
        if ($conn->query($update_query) === TRUE) {
            header("Location: admin_control.php");
        } else {
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }
    } else {
        $id = $_POST['id-container'];
        $name = $_POST['place_name'];
        $location = $_POST['location'];
        $activities = $_POST['activities'];
        $description = $_POST['description'];
        $date = date('Y-m-d');
        
        $update_query = "UPDATE touristSpot SET place_name = '$name', location = '$location', activities = '$activities', description = '$description', date_updated='$date' WHERE place_id='$id'";
        if ($conn->query($update_query) === TRUE) {
            header("Location: admin_control.php");
        } else {
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    // Get form data
    $user_id = $_POST['user_id'];
    $user_fn = $_POST['fullname'];
    $user_un = $_POST['username'];
    $user_email = $_POST['email'];
    $user_contact = $_POST['contact-num'];
    $date_creation = $_POST['date_created'];
    $date = date('Y-m-d', strtotime($date_creation));
    $roles = $_POST['roles'];

    // Update user data in the database
    $update_query = "UPDATE user SET fullname='$user_fn', username='$user_un', email='$user_email', contact_number='$user_contact', date_created='$date', roles='$roles' WHERE id='$user_id'";

    if (mysqli_query($conn, $update_query)) {
        // Redirect to a success page or any other page after successful update
        header("Location: user_management.php");
        exit(); // Stop further execution
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

session_destroy();
?>