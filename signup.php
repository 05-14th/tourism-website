<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #eee;
    }

    .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
    margin-bottom: 10px;
    }

    .form-signin input[type="text"],
    .form-signin input[type="password"] {
    margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <form id="loginForm" class="form-signin">
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" id="email" class="form-control" placeholder="Email" required>
      <input type="password" id="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
