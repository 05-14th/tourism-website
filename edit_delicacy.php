<?php 
require_once 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function toggleFileInput() {
            var checkbox = document.getElementById('enableCheckbox');
            var fileInput = document.getElementById('_picture');
            
            // Check if the checkbox is checked
            if (checkbox.checked) {
                fileInput.disabled = false; // Enable file input
            } else {
                fileInput.disabled = true; // Disable file input
            }
        }
  </script>
</head>
<body>
    <form method="POST" action="commit_edit_delicacy.php" enctype="multipart/form-data">   
        <?php
            if(isset($_POST['delicacy_id'])){
                $delicacy_id = $_POST['delicacy_id'];
                $sql = "SELECT * FROM delicacy WHERE delicacy_id='$delicacy_id'";
                $placeResult = mysqli_query($conn, $sql);
                $placeRow = mysqli_fetch_assoc($placeResult);
                // Store placeRow data in the session
                $_SESSION['placeRow'] = $placeRow; 
        ?>
        <input type=hidden name="id-container" value="<?php echo $placeRow['delicacy_id']; ?>">
        <div class="form-group">
            <label for="name">Name of Delicacy </label>
            <input id= "name" name="name" class="form-control" value="<?php echo $placeRow['delicacy_name']; ?>">
        </div>
        <div class="form-group">
            <label for="location">Description: </label>
            <input id= "location" class="form-control" name="location" value="<?php echo $placeRow['description']; ?>">
        </div>
        <div class="form-group">
            <input type="checkbox" id="enableCheckbox" onchange="toggleFileInput()">
            <label for="enableCheckbox">Change Picture</label>
            <br>
            <input type="file" id= "_picture" name="picture" disabled>
        </div>
        <input type="submit" class="btn btn-primary" name="save_changes" value="Save Changes">
    </form>
    <?php
        } else{
            echo "No Available Data.";
        }
    ?>
</body>
</html>