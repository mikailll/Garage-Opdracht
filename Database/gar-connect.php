<?php
//Maakt een connectie met de database Garage.

$servername = "localhost";
$dbname = "garage";
$username = "root";
$password = "";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connectie mislukt: " . $e->getMessage();
}