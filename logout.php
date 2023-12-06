<?php
include 'config.php';
session_start();

$_SESSION["userId"] = null;

header("Location: index.php");
?>