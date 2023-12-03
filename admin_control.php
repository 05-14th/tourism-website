<?php
require_once 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musna Sa CamNorte</title>
    >
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
    </style>
</head>
<body>
    <button class="btn btn-primary">Back</button>
    <form action="" method="post">
        <h2>Tourist Attration Control</h2>
        <div class="form-group">
            <input placeholder="Search for Tourist Spot" name="search-input">
            <input type="submit" class="btn btn-primary" value="Search">    
        </div>
    </form>
    <button type="button" data-id="" class="btn btn-success" onclick="addModal()">Add Tourist Site</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name of Tourism Site</th>
                    <th>Location</th>
                    <th>Activities</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Ratings</th>
                    <th>Date Posted</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM touristSpot";       
                       
                    $dataResult = mysqli_query($conn, $sql);
                    while ($placeResult = mysqli_fetch_assoc($dataResult)){
                        echo "<tr>";
                        echo "<td>" . $placeResult['place_name'] . "</td>";
                        echo "<td>" . $placeResult['location'] . "</td>";
                        echo "<td>" . $placeResult['activities'] . "</td>";
                        echo "<td>" . $placeResult['description'] . "</td>";
                        echo "<td><img src='uploads/". $placeResult['picture'] ."' alt='tourist spot' class='standard_size'></td>";
                        echo "<td>" . $placeResult['ratings'] . "</td>";
                        echo "<td>" . $placeResult['date_posted'] . "</td>";
                        echo "<td>" . $placeResult['date_updated'] . "</td>";
                        echo "<td>";
                        echo "<button type='button' data-id='" . $placeResult['place_id'] ."' class='btn btn-success' onclick=''>Print</button>";
                        echo "<button type='button' data-id='" . $placeResult['place_id'] ."' class='btn btn-warning' onclick='editModal(this)'>Edit</button>";
                        echo "<button type='button' data-id='" . $placeResult['place_id'] ."' class='btn btn-danger' onclick='deleteModal(this)'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
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
                    <h5 class="modal-title" id="addModalLabel">Add Tourist Site</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="closeModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="add_details.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name of Tourist Spot: </label>
                            <input id= "name" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location: </label>
                            <input id= "location" class="form-control" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="activities">Activities: </label>
                            <input id= "activities" class="form-control" name="activities" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <select id="_description" name="description" required>
                                <option value="Default">Select Description</option>
                                <option value="Nature Tourism">Nature Tourism</option>
                                <option value="Sand and Beach">Sand and Beach</option>
                                <option value="Man Made Tourism">Man Made Tourinsm</option>
                                <option value="Farm Tourism">Farm Tourism</option>
                                <option value="Cultural Tourism">Cultural Tourism</option>
                                <option value="Faith Tourism">Faith Tourism</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture: </label>
                            <input type="file" id= "picture" name="picture" required>
                        </div>
                        <div class="form-group">
                            <label for="date_posted">Date: </label>
                            <input id= "date_posted" class="form-control" value="<?php echo date("F j, Y"); ?>" name="date" readonly>
                        </div>
                        <input type="submit" class="btn btn-success" name="add_site" value="Post">
                        <button type="button" class="btn btn-danger" name="cancel_add" onclick="closeModal()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing -->
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="closeModal()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="destinationDetailsContent">
                       
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
                        <input type="submit" value="Confirm" class="btn btn-danger" name="confirm">
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
                var placeId = button.getAttribute('data-id'); // Get the place ID from data-id attribute

                // AJAX request to send data to PHP
                $.ajax({
                    type: 'POST',
                    url: 'edit_details.php', // Replace with your PHP file to retrieve place details
                    data: { place_id: placeId }, // Replace 'your_place_id' with the actual place ID
                    success: function(response) {
                        // Inject the retrieved form content into the modal body
                        $('#destinationDetailsContent').html(response);
                    },
                    error: function() {
                        alert('Error occurred while fetching place details.');
                    }
                });
            }
    </script>
</body>
</html>