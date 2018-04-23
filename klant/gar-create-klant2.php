<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Create-Klant2.PHP</title>
</head>
<body>
<h1>Garage Create Klant 2</h1>
<p>Een klant toevoegen aan de tabel klant in de database garage.</p>
</body>
</html>
<?php
// Klantgegevens uit het formulier halen -------------------------------

$klantid = NULL;
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

// Klantgegevens invoeren in de tabel ----------------------------------

require_once "../Database/gar-connect.php";

$sql = $conn->prepare("INSERT INTO klant values(:klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");

// Manier 1 (of Manier 2 gebruiken) ------------------------------------

// $sql->bindParam(":klantid", $klantid);
// $sql->bindParam(":klantnaam", $klantnaam);
// $sql->bindParam(":klantadres", $klantadres);
// $sql->bindParam(":klantpostcode", $klantpostcode);
// $sql->bindParam(":klantplaats", $klantplaats);

// $sql->Execute();

// Manier 2 ------------------------------------------------------------

$sql->execute(["klantid" => $klantid, "klantnaam" => $klantnaam, "klantadres" => $klantadres, "klantpostcode" => $klantpostcode, "klantplaats" => $klantplaats]);

echo "De klant is toegevoegd <br />";
echo "<a href='../gar-menu.php'> Terug naar het menu </a>";