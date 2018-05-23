<?php
$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName="Blog";
$dbConnect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

if (!$dbConnect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
