<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
        margin: 0;
        padding:0;
    }

    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-signin {
        width: 50%;
        border-radius: 15px;
        border: 1px solid black;
        box-shadow: 5px 5px 10px 0px black;
        padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <form id="loginForm" class="form-signin" method="POST" action="verification.php">
      <h2 class="form-signin-heading">Login to Musna sa CamNorte</h2><br>
      <input type="text" name="email" class="form-control" placeholder="Email" required><br>
      <input type="password" name="password" class="form-control" placeholder="Password" required><br>
      <input class="btn btn-primary btn-block" type="submit" value="Login">
      <h6 style="text-align:center">OR</h6>
      <button class="btn btn-primary btn-block">Sign Up</button>
    </form>
  </div>
</body>
</html>
