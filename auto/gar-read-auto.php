<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Read-Auto.PHP</title>
</head>
<body>
<h1>Garage Read Auto</h1>
<p>Dit zijn alle gegevens uit de tabel auto van de database garage.</p>
</body>
</html>

<?php
// Tabel uitlezen en netjes afrdukken ------------------------------------------

require_once "../Database/gar-connect.php";

$sql = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid from auto");
$sql->execute();

echo"<table>";
foreach($sql as $rij)
{
    echo "<tr>";
    echo "<td>" . "<b>Kenteken: </b>". $rij["autokenteken"] , "</td>";
    echo "<td>" . "<b>Merk: </b>" . $rij["automerk"] , "</td>";
    echo "<td>" . "<b>Type: </b>" . $rij["autotype"] , "</td>";
    echo "<td>" . "<b>Kilometer Stand: </b>" . $rij["autokmstand"] , "</td>";
    echo "<td>" . "<b>Klant ID: </b>" . $rij["klantid"] , "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='../gar-menu.php'> Terug naar het menu </a>";