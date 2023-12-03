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
    <form method="POST" action="commit_edit.php" enctype="multipart/form-data">   
        <?php
            if(isset($_POST['place_id'])){
                $place_id = $_POST['place_id'];
                $sql = "SELECT * FROM touristSpot WHERE place_id='$place_id'";
                $placeResult = mysqli_query($conn, $sql);
                $placeRow = mysqli_fetch_assoc($placeResult);
                // Store placeRow data in the session
                $_SESSION['placeRow'] = $placeRow; 
        ?>
        <input type=hidden name="id-container" value="<?php echo $placeRow['place_id']; ?>">
        <div class="form-group">
            <label for="name">Name of Touris Spot: </label>
            <input id= "name" name="place_name" class="form-control" value="<?php echo $placeRow['place_name']; ?>">
        </div>
        <div class="form-group">
            <label for="location">Location: </label>
            <input id= "location" class="form-control" name="location" value="<?php echo $placeRow['location']; ?>">
        </div>
        <div class="form-group">
            <label for="activities">Activities: </label>
            <input id= "activities" class="form-control" name="activities" value="<?php echo $placeRow['activities']; ?>">
        </div>
        <div class="form-group">
            <label for="_description">Description: </label>
            <select id="_description"  name="description">
                <option value="Nature Tourism" <?php if($placeRow['description'] == 'Nature Tourism') echo 'selected'; ?>>Nature Tourism</option>
                <option value="Sand and Beach" <?php if($placeRow['description'] == 'Sand and Beach') echo 'selected'; ?>>Sand and Beach</option>
                <option value="Man Made Tourism" <?php if($placeRow['description'] == 'Man Made Tourism') echo 'selected'; ?>>Man Made Tourinsm</option>
                <option value="Farm Tourism" <?php if($placeRow['description'] == 'Farm Tourism') echo 'selected'; ?>>Farm Tourism</option>
                <option value="Cultural Tourism" <?php if($placeRow['description'] == 'Cultural Tourism') echo 'selected'; ?>>Cultural Tourism</option>
                <option value="Faith Tourism" <?php if($placeRow['description'] == 'Faith Tourism') echo 'selected'; ?>>Faith Tourism</option>
            </select>
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