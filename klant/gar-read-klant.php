<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Read-Klant.PHP</title>
</head>
<body>
<h1>Garage Read Klant</h1>
<p>Dit zijn alle gegevens uit de tabel klanten van de database garage.</p>

</body>
</html>
<?php
// Tabel uitlezen en netjes afrdukken ------------------------------------------

require_once "../Database/gar-connect.php";

$sql = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant");
$sql->execute();
echo"<table>";
foreach($sql as $rij)
{
    echo "<tr>";
    echo "<td>" . "<b>Klant ID: </b>" . $rij["klantid"] , "</td>";
    echo "<td>" . "<b>Naam: </b>" . $rij["klantnaam"] , "</td>";
    echo "<td>" . "<b>Adres: </b>" . $rij["klantadres"] , "</td>";
    echo "<td>" . "<b>Postcode: </b>" . $rij["klantpostcode"] , "</td>";
    echo "<td>" . "<b>Plaats: </b>" . $rij["klantplaats"] , "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='../gar-menu.php'> Terug naar het menu </a>";