<?php
require_once 'config.php';
session_start();

function generateData($sql){
    global $conn;
    $dataResult = mysqli_query($conn, $sql);
    while ($userResult = mysqli_fetch_assoc($dataResult)){
        echo "<tr>";
        echo "<td>" . $userResult['id'] . "</td>";
        echo "<td>" . $userResult['fullname'] . "</td>";
        echo "<td>" . $userResult['username'] . "</td>";
        echo "<td>" . $userResult['email'] . "</td>";
        echo "<td>" . $userResult['contact_number'] . "</td>";
        echo "<td>" . $userResult['date_created'] . "</td>";
        echo "<td>" . $userResult['roles'] . "</td>";
        echo "<td>";
        echo "<button type='button' data-id='" . $userResult['id'] ."' class='btn btn-success tweak-button' onclick=''>Print</button><br>";
        echo "<button type='button' data-id='" . $userResult['id'] ."' class='btn btn-warning tweak-button' onclick='editModal(this)'>Edit</button><br>";
        echo "<button type='button' data-id='" . $userResult['id'] ."' class='btn btn-danger tweak-button' onclick='deleteModal(this)'>Delete</button><br>";
        echo "</td>";
        echo "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musna sa CamNorte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            margin: 5px;
        }

        .scroll{
            overflow: scroll;
        }

        .standard_size{
            width: 150px;
            height: 150px; 
        }

        .search-form{
            display: flex;
            justify-content: center;
        }

        .tweak-button{
            width: 10vw;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2 style="text-align: center;">User Management Control</h2>
            <div class="form-group">
                <input style="width: 30vw; height: 6vh;" placeholder="Search for User" name="search-input"><br>
                <input style="width: 6vw; height: 6vh;" type="submit" class="btn btn-primary" name="search-button" value="Search">    
            </div>
        </form>
    </div>
    <button type="button" data-id="" class="btn btn-success" onclick="addModal()">Add User</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Date Created</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search-button"])) {
                    if(strlen(trim($_POST['search-input'])) === 0) {
                        // Retrieve and sanitize the SQL query from the form
                        $sql_query = "SELECT * FROM user";  
                        generateData($sql_query);
                    }elseif(isset($_POST['search-input'])){
                        $search_result = $_POST['search-input'];
                        $sql_query = "SELECT * FROM user WHERE fullname='$search_result' OR username='$search_result'";  
                        generateData($sql_query);
                    }else {
                        $sql_query = "SELECT * FROM user";  
                        generateData($sql_query);    
                    }
                }else {
                    $sql_query = "SELECT * FROM user";  
                    generateData($sql_query);    
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS and jQuery if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Modal for adding -->
    <div class="modal scroll" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="closeModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="add_details.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input id= "fullname" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input id= "username" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input id= "email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-num">Contact Number: </label>
                            <input id= "contact-num" class="form-control" name="contact-num">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input id= "password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="date-created">Date: </label>
                            <input id= "date-created" class="form-control" value="<?php echo date("F j, Y"); ?>" name="date_created" readonly>
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles: </label>
                            <select id="roles" name="roles" required>
                                <option value="Default" disabled>Select Description</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success" name="add_user" value="Add">
                        <button type="button" class="btn btn-danger" name="cancel_user" onclick="closeModal()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing -->
    <div class="modal scroll" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="closeModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="userDetailsContent">
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for deleting -->
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Tourist Spot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="closeModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post"action="delete_details.php">
                        <input type="hidden" name="id-container" id="id-container">
                        <h5>This action will cause this data to be permanently deleted. Are you sure you want to proceed?</h5>
                        <input type="submit" value="Confirm" class="btn btn-danger" name="confirm_user">
                        <button type="button" class="btn btn-success" onclick="closeModal()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var add_modal = document.getElementById("addModal");
        var edit_modal = document.getElementById("editModal");
        var delete_modal = document.getElementById("deleteModal");

        function addModal(){
            add_modal.style.display = "block";
        }

        function editModal(button){
            sendEditRequest(button)
            edit_modal.style.display = "block";
        }

        function deleteModal(button){
            var placeId = button.getAttribute('data-id');
            document.getElementById('id-container').value = placeId;
            delete_modal.style.display = "block";
        }

        function closeModal(){
            add_modal.style.display = "none";
            edit_modal.style.display = "none";
            delete_modal.style.display = "none";
        }

        function sendEditRequest(button) {
                var userId = button.getAttribute('data-id'); // Get the place ID from data-id attribute

                // AJAX request to send data to PHP
                $.ajax({
                    type: 'POST',
                    url: 'user_edit.php', // Replace with your PHP file to retrieve place details
                    data: { user_id: userId }, // Replace 'your_place_id' with the actual place ID
                    success: function(response) {
                        // Inject the retrieved form content into the modal body
                        $('#userDetailsContent').html(response);
                    },
                    error: function() {
                        alert('Error occurred while fetching user details.');
                    }
                });
            }
    </script>
</body>
</html>