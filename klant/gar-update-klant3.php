<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Update-Klant3.PHP</title>
</head>
<body>
<h1>Garage update klant 3</h1>
<p>Klantgegevens wijzigen in de tabel klant van de database garage.</p>

<?php
// Klantgegevens uit het formulier halen -------------------------------------
$klantid = $_POST["klantidvak"];
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

// Updaten KlantGegevens -----------------------------------------
require_once "../Database/gar-connect.php";

$sql = $conn->prepare("UPDATE klant SET klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantplaats = :klantplaats WHERE klantid = :klantid");
$sql->execute(["klantid" => $klantid, "klantnaam" => $klantnaam, "klantadres" => $klantadres, "klantpostcode" => $klantpostcode, "klantplaats" => $klantplaats]);

echo "De klant is gewijzigd. <br />";
echo "<a href='../gar-menu.php'> Terug naar het menu </a>";

?>
</body>
</html>