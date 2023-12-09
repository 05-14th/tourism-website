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
  <title>Musna sa CamNorte | Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.2.0/ol.css">
  <script src="https://cdn.jsdelivr.net/npm/ol@v8.2.0/dist/ol.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
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
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 15px;
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

    #map {
      width: 50%;
      height: 400px; 
    }

    .map-container{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('<?php echo $bg1URL?>') center center/cover no-repeat;
      background-attachment: fixed;
      background-color: rgba(0, 0, 0, 0.1);
    }

    .map-shell{
      max-width: 25%;
      margin-right: 5%;
      max-height: 75%;
      overflow: auto;
      color: white;
      border-radius: 15px;
      padding: 10px;
    }

    .latest-container{
      height: 50vh;
    }
  </style>
</head>
<body>
  <div class="parallax">
    <div class="parallax-inner">
    <div class="navbar">
        <ul>
          <img class="logo" src="<?php echo $logoURL?>" alt="logo">
          <?php
          if(isset($_SESSION["userId"])){
            $userId = $_SESSION["userId"];

            $sqlquery = "SELECT * FROM user WHERE id ='$userId'";
            $confirm_result = $conn->query($sqlquery);
            if($confirm_result->num_rows > 0){
              $row = $confirm_result->fetch_assoc();
              echo "<li><a href=''>". $row['username']. "</a></li>";
            } else{
              echo "<li><a href='signin.php'>Login</a></li>";
            }
          } else{
            echo "<li><a href='signin.php'>Login</a></li>";
          }
          ?>
          <li><a href="">About Us</a></li>
          <li><a href="">Tourism Business</a></li>
          <li><a href="">Delicacies</a></li>
          <li><a href="destinations.php">Destinations</a></li>
          <li><a href="">Home</a></li>
        </ul>
      </div>
    </div>
  </div>
      <div class="parallax-content">
        <h1>Welcome to Musna sa CamNorte</h1>
        <p>A place for a golden vacation.</p>
      </div>
  <div class="parallax">
      <div class="parallax-1">
      <h3 style="text-align: center; color:white">In Collaboration With</h3>
        <img class="logo spaced" src="<?php echo $logoURL?>" alt="Go CamNorte Logo">
        <img class="logo spaced" src="<?php echo $cnURL?>" alt="CamNorte Logo">
        <img class="logo spaced" src="<?php echo $cnscURL?>" alt="CNSC Logo">
        <img class="logo spaced" src="<?php echo $icsURL?>" alt="ICS Logo">
      </div>
  </div>
  <div class="parallax">
    <div class="parallax-2">
      <div class="overlay">
        <div class="content">
          <video width="80%" height="80%" autoplay loop controls>
            <source src="<?php echo $video?>" type="video/mp4">
            <!-- Add other video sources (e.g., WebM, Ogg) for better browser compatibility -->
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>
  <div class="latest-container">
      <h3 style="text-align: center; color:white;">Latest Events</h3>
      <?php 
        $sql = "SELECT * FROM latest";
        $result = $conn->query($sql);
        if($result->num_rows >0){
          while($row = $result->fetch_assoc()){
            echo "<div class='features'>";
            echo "<img src='".$row['image']."' alt='Feature Photo'>";
            echo "<h4>". $row['title']. "</h4>";
            echo "<p>". $row['description']. "</p>";
            echo "<h6>". $row['date']. "</h6>";
            echo "</div>";
          }
        }else{
          echo "<h5 style='color:white'>No Latest Features</h5>";
        }
      ?>
  </div>
  <div>
    <div class="parallax">
      <div class="map-container" >
        <div class="overlay">
          <h2 style="text-align:center; color:white;">How to get there?</h2>
          <div class="content">
            <div class="map-shell">
              <h3><b>Camarines Norte</b></h3>
              <p style="text-align: justify">
                Camarines Norte, situated in the Bicol Region of the Philippines, offers multiple avenues for travelers to reach its scenic landscapes and cultural treasures. 
                Visitors can opt for air travel via Naga Airport, which serves as a gateway to the region, connecting with domestic flights from Manila and other major 
                Philippine cities. Alternatively, the province can be accessed by land through a network of roads, where bus services departing from Manila and neighboring 
                provinces provide a convenient means of transportation. For those with private vehicles, road travel offers flexibility, showcasing well-maintained highways 
                leading to various municipalities within Camarines Norte. Additionally, select sea vessels provide inter-island connections to specific ports, contributing to 
                the accessibility of this province rich in natural beauty and cultural heritage. Upon arrival, a diverse array of local transportation options awaits, including 
                tricycles, jeepneys, and buses, facilitating convenient exploration of Camarines Norte's distinct municipalities and attractions.
              </p>
            </div>
            <div id="map" class="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="parallax">

  </div>
  
  <div style="height: auto;"></div> <!-- To create scroll -->
  
  <script>
    window.addEventListener('scroll', function() {
          const parallax = document.querySelector('.parallax');
          let scrollPosition = window.pageYOffset;
          parallax.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
        });

    var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([122.6890, 14.1574]), // Centered on the Philippines
                zoom: 10 // Initial zoom level
            })
        });

        // Geolocation functionality
        var geolocation = new ol.Geolocation({
            trackingOptions: {
                enableHighAccuracy: true
            },
            projection: map.getView().getProjection()
        });

        geolocation.once('change:position', function() {
            var userCoordinates = geolocation.getPosition();
            if (userCoordinates) {
                // Show the user's location on the map
                var userMarker = new ol.Feature({
                    geometry: new ol.geom.Point(userCoordinates)
                });

                var userMarkerStyle = new ol.style.Style({
                    image: new ol.style.Icon({
                        src: 'source/location.png' // Change the icon source
                    })
                });

                userMarker.setStyle(userMarkerStyle);
                var userMarkerSource = new ol.source.Vector({
                    features: [userMarker]
                });

                var userMarkerLayer = new ol.layer.Vector({
                    source: userMarkerSource
                });

                map.addLayer(userMarkerLayer);

                // Show a simple route (straight line) from user's location to Camarines Norte
                var camarinesNorteCoordinates = ol.proj.fromLonLat([122.9600, 14.1674]); // Coordinates of Camarines Norte

                var routeLine = new ol.Feature({
                    geometry: new ol.geom.LineString([userCoordinates, camarinesNorteCoordinates])
                });

                var routeLineStyle = new ol.style.Style({
                    stroke: new ol.style.Stroke({
                        color: 'blue',
                        width: 4
                    })
                });

                routeLine.setStyle(routeLineStyle);
                var routeLineSource = new ol.source.Vector({
                    features: [routeLine]
                });

                var routeLineLayer = new ol.layer.Vector({
                    source: routeLineSource
                });

                map.addLayer(routeLineLayer);

                // Set the map's view to show both user's location and Camarines Norte
                var extent = ol.extent.boundingExtent([userCoordinates, camarinesNorteCoordinates]);
                map.getView().fit(extent, { padding: [50, 50, 50, 50] }); // Adjust padding as needed
            }
        });
  </script>
</body>
</html>
