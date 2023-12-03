<?php
$mysqli = new mysqli('localhost', 'root', '', 'camNorte');
?>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'camNorte';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
