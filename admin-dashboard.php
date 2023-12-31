<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>
        .admin-dashboard{
            display: flex;
        }

        .touristSite{
            width:100%;
            height: 100vh;
            border: 1px solid #ccc; /* Optional: Add a border for visualization */
            display: flex; /* Use flexbox for easier centering */
            justify-content: center; /* Horizontally center the child elements */
            align-items: center; /* Vertically center the child elements */
        }

        iframe{
            width: 100%;
            height: 100%;
        }

        .control-button{
            width: 15vw;
            margin: 5px;
        }
    </style>
    <body>
        <div class="admin-dashboard">
            <nav>
                <h3 style="text-align:center">Musna sa CamNorte</h3>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="latest.php">Latest Event Monitoring</span><br>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="delicacy_monitoring.php">Delicacy Monitoring</span><br>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="business_monitoring.php">Business Monitoring</span><br>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="admin_control.php">Tourist Site Monitoring</span><br>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="activity_monitoring.php">Activity Monitoring</span><br>
                <span class="btn btn-primary control-button" onclick= "togglePage(this)" data-link="user_management.php">User Management</span><br>
                <span class="btn btn-primary control-button" onclick= "window.location.href='logout.php'">Logout</span><br>
            </nav>
            <div id="touristSiteContent" class="touristSite">
                <iframe src="latest.php" id="touristFrame" frameborder="0"></iframe>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            var touristFrame = document.getElementById("touristFrame");

            function togglePage(button) {
                var link = button.getAttribute("data-link");
                touristFrame.src = link;
            }
        </script>
    </body>
</html>