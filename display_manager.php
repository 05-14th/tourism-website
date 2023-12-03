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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        form{
            margin: 5%;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Display Manager</h2>
    <form>
        <div class="form-group">
            <label for="title">Title:</label>
            <input id="title" name="title" class="form-control" placeholder="Title" value="Musna sa CamNorte" required><br>
        </div>
        <div class="form-group">
            <label for="tagline">Tagline:</label>
            <input id="tagline" name="tagline" class="form-control" placeholder="Tagline" value="A place for your Golden Vacation" required><br>
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input id="logo" type="file" name="logo" required><br>
        </div>
        <div class="form-group">
            <label for="background">Background:</label>
            <input id="background" type="file" name="background" required><br>
        </div>
        <div class="form-group">
            <label for="video">Video Advertisement:</label>
            <input id="video" type="file" name="video" accept="video/*">
        </div>
        <input type="submit" class="btn btn-primary" value="Save Changes"><br>
    </form>
</body>
</html>