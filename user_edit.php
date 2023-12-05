<?php 
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="commit_edit.php" enctype="multipart/form-data">   
    <?php
    if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
        $sql = "SELECT * FROM user WHERE id='$user_id'";
        $userResult = mysqli_query($conn, $sql);
        $userRow = mysqli_fetch_assoc($userResult);
        // Store userRow data in the session
        $_SESSION['userRow'] = $userRow; 
    ?>
    <input name="user_id" value="<?php echo $userRow['id']; ?>">
    <div class="form-group">
        <label for="fullname">Full Name: </label>
        <input id="fullname" name="fullname" class="form-control" value="<?php echo $userRow['fullname']; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username: </label>
        <input id="username" class="form-control" name="username" value="<?php echo $userRow['username']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email: </label>
        <input id="email" class="form-control" name="email" value="<?php echo $userRow['email']; ?>">
    </div>
    <div class="form-group">
        <label for="contact-num">Contact Number: </label>
        <input id="contact-num" class="form-control" name="contact-num" value="<?php echo $userRow['contact_number']; ?>">
    </div>
    <div class="form-group">
        <label for="date-created">Date: </label>
        <input id="date-created" class="form-control" value="<?php echo date("F j, Y"); ?>" name="date_created" readonly>
    </div>
    <div class="form-group">
        <label for="roles">Description: </label>
        <select id="roles" name="roles" readonly>
            <option value="Admin" <?php if($userRow['roles'] == 'Admin') echo 'selected'; ?>>Admin</option>
            <option value="User" <?php if($userRow['roles'] == 'User') echo 'selected'; ?>>User</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="save_user" value="Save Changes" >
    <?php
    } else {
        echo "No Available Data.";
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    </script>
</form>
</body>
</html>