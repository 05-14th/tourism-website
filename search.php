
<?php
include 'config.php';
session_start();
$imageURL = "https://drive.google.com/uc?export=download&id=16Jtgp8XkDApFHc1CMbXZVjpCstSITb7r";
$logoURL = "https://drive.google.com/uc?export=download&id=1hxI83onCwtNpAfNi_D461A1YC61yS59s";
$cnURL = "https://drive.google.com/uc?export=download&id=13hwNy8r7VbrXwjoZChwRAPVZNCldZH5E";
$cnscURL = "https://drive.google.com/uc?export=download&id=18kAW6l3d8Qd0uK4PYeaC1mbQkRKbG1s0";
$icsURL = "https://drive.google.com/uc?export=download&id=149SBbVL1YC2qJgzZaUsNhz67SmPcdzEx";
$bg2URL= "https://drive.google.com/uc?export=download&id=1jxo2335xC-vKseRpXy9b-riG_LX1LwTQ";
$video = "https://drive.google.com/uc?export=download&id=1fAvw2FfaA7zy1k6vssZxH2ysa-dSYFEm";
$bg1URL = "https://drive.google.com/uc?export=download&id=1q0VfCdaNs0337OVm08CyX52I1dEXq9ZL";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.2.0/ol.css">
    <style>
    body {
      margin: 0;
      padding: 0;
      font-family: serif;
      background: url('<?php echo $imageURL?>') center center/cover no-repeat; /* Replace 'your_image.jpg' with your image URL */
      background-attachment: fixed;
    }

    .parallax {
      overflow: hidden;
      height: 100vh;
      position: relative;
    }

    .parallax-inner {
      position: relative;
      display: block;
      height: 100%;
      width: 100%;
    }

    .parallax-content h1{
      /* Adding a shadow with a blur effect */
      color: aliceblue;
      font-size: 100%;
      /* Simulating text-stroke with text-shadow */
      text-shadow: -1px -1px 0 #000;
      font-family: serif;
    }

    .parallax-2 {
      position: relative;
      display: block;
      height: 100%;
      width: 100%;
      background: url('<?php echo $bg2URL?>') center center/cover no-repeat; /* Replace 'your_image.jpg' with your image URL */
      background-color: rgba(0, 0, 0, 0.1); /* Adjust the alpha (fourth) value to change the opacity */
      background-attachment: fixed;
    }

    .parallax-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
      font-size: 3em;
    }

    .overlay {
      position: relative;
      background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha (fourth) value to change the opacity */
      width: 100%;
      height: 100%;
    }

    .content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .navbar {
      border-radius: 5px;
      padding: 1px 20px;
    }

    li{
      list-style-type: none;
      display: inline;
      float: right;
      margin-right: 1%;
    }

    a:hover{
      background-color: black;
      text-decoration: none;
    }

    a{
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 15px;
      text-decoration: none;
    }

    .logo{
      width: 13%;
      height: 13%;
    }

    .spaced{
      padding-left: 5%;
      padding-right: 5%;
      text-align: center;
    }

    .img{
      border-radius: 100%;
      width: 5vh;
      height: 5vh;
    }

    h1,p{
      font-size: 80%;
    }

    .features{
      border: 1px solid black;
    }

    .destination-content{
        background-color: lightgray;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        border-radius: 15px;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        padding:20px;
    }

    .destination-content img{
        border-radius: 15px;
        margin: 3%;
        width: 25%;
        height: 25%;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
    }

    p{
      font-family: sans-serif;
      text-align: center;
      font-size: 95%;
    }

    .bruh-container img{
      width: 100%;
    }

    h2, h3{
      font-family: serif;
      
    }

    p{
      font-family: sans-serif;
    }

    .horizontal{
      display:flex;
      border-radius: 15px;
    }

    .horizontal input{
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="parallax">
        <div class="parallax-inner">
            <div>
                <ul>
                    <li><a href="destinations.php">Back</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="parallax-content">
        <h1 style="font-size: 150%">Search Result</h1>
    </div>
    <div class="centralize">
        <h2 style="text-align:center; color: black;">Destinations in Camarines Norte</h2>
        <center>
    <?php 
    if(isset($_POST["search"])){
        $search = $_POST["search"];
        $tourist_select = "SELECT * FROM touristSpot WHERE place_name LIKE '%".$search."%' OR location LIKE'%".$search."%'";
        $result = $conn->query($tourist_select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='destination-content'>";
                echo "<center>";
                echo "<div class='bruh-container'>";
                echo "<img src='uploads/" . $row['picture'] . "' alt='" . $row['place_name'] . "'>";
                echo "<div style='text-align: left; width: 100%;'>";
                echo "<h3 style='text-align: center'>" . $row['place_name'] . "</h3>";
                echo "<p>This place is located at " . $row['location'] . " where you can do activities like " . $row['activities'] . ". <b>Check it out!</b></p>";
                echo "<h4 style='text-align: center'>Category: " . $row['description'] . "</h4>";
                echo "<h5>Date Posted: " . $row['date_posted'] . "</h5>";
                echo "</div>";
                echo "</div>";
                echo "<form action='submit_rating.php' method='post'>";
                echo "<p>Please rate this item:</p>";
                echo "<div class='rating'>";
                echo "<input type='radio' id='star5' name='rating' value='5'>";
                echo "<label for='star5'>5 stars</label>";
                echo "<input type='radio' id='star4' name='rating' value='4'>";
                echo "<label for='star4'>4 stars</label>";
                echo "<input type='radio' id='star3' name='rating' value='3'>";
                echo "<label for='star3'>3 stars</label>";
                echo "<input type='radio' id='star2' name='rating' value='2'>";
                echo "<label for='star2'>2 stars</label>";
                echo "<input type='radio' id='star1' name='rating' value='1'>";
                echo "<label for='star1'>1 star</label>";
                echo "</div>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";
                echo "</center>";
                echo "</div><br>";
            }
        } else {
            echo "$search not found";
        }
    }
         ?>
        </center>
    </div>
    <div style="height: auto;"></div> <!-- To create scroll -->
  
    <script>
        window.addEventListener('scroll', function() {
            const parallax = document.querySelector('.parallax');
            let scrollPosition = window.pageYOffset;
            parallax.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
            });
    </script>
</body>
</html>