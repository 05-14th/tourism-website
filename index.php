<?php
include 'config.php';
session_start();
$imageURL = "https://drive.google.com/uc?export=download&id=16Jtgp8XkDApFHc1CMbXZVjpCstSITb7r";
$logoURL = "https://drive.google.com/uc?export=download&id=1hxI83onCwtNpAfNi_D461A1YC61yS59s";
$cnURL = "https://drive.google.com/uc?export=download&id=1RyJR-v6gCKQdb3zIOvMicKzB_-CwM78D";
$cnscURL = "https://drive.google.com/uc?export=download&id=18kAW6l3d8Qd0uK4PYeaC1mbQkRKbG1s0";
$icsURL = "https://drive.google.com/uc?export=download&id=149SBbVL1YC2qJgzZaUsNhz67SmPcdzEx";
$bg2URL= "https://drive.google.com/uc?export=download&id=1jxo2335xC-vKseRpXy9b-riG_LX1LwTQ";
$video = "https://drive.google.com/uc?export=download&id=1fAvw2FfaA7zy1k6vssZxH2ysa-dSYFEm";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Parallax Effect with Navigation Bar</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
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
      background: url('<?php echo $imageURL?>') center center/cover no-repeat; /* Replace 'your_image.jpg' with your image URL */
    }

    .parallax-2 {
      position: relative;
      display: block;
      height: 100%;
      width: 100%;
      background: url('<?php echo $bg2URL?>') center center/cover no-repeat; /* Replace 'your_image.jpg' with your image URL */
      background-color: rgba(0, 0, 0, 0.1); /* Adjust the alpha (fourth) value to change the opacity */
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
      padding: 10px 20px;
      margin-right: 1%;
      border-radius: 15px;
      float: right;
    }

    li:hover{
      background-color: black;
    }

    .navbar ul li a {
      color: white;
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
  </style>
</head>
<body>
  <div class="parallax">
    <div class="parallax-inner">
      <div class="navbar">
        <ul>
          <img class="logo" src="<?php echo $logoURL?>" alt="logo">
          <li><a href="">Login</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Tourism Business</a></li>
          <li><a href="">Delicacies</a></li>
          <li><a href="">Destinations</a></li>
          <li><a href="">Home</a></li>
        </ul>
      </div>
      <div class="parallax-content">
        <h1>Welcome to Parallax Effect</h1>
        <p>Scroll down to see the effect</p>
      </div>
    </div>
  </div>
  <div style="text-align: center; padding: 3%;">
      <h3 style="text-align: center;">In Collaboration With</h3>
      <div>
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
  <div>
      <h3 style="text-align: center;">Latest Events</h3>
      
  </div>
  
  <div style="height: 2000px;"></div> <!-- To create scroll -->
  
  <script>
    window.addEventListener('scroll', function() {
      const parallax = document.querySelector('.parallax-inner');
      let scrollPosition = window.pageYOffset;
      parallax.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
    });
  </script>
</body>
</html>
