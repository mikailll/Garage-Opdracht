<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Delete-Klant2.PHP</title>
</head>
<body>
<h1>Garage Delete Klant 2</h1>
<p>Op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnen worden.</p>

<?php
// KlantID uit het formulier halen ------------------------
$klantid = $_POST["klantidvak"];

// KlantGegevens uit de tabel halen ------------------------
require_once "../Database/gar-connect.php";

$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

// KlantGegevens laten zien
echo "<table>";
foreach($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-klant3.php' method='post'>";
// KlantID mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value=$klantid>";
// Waarde 0 doorgegeven als er niet gecheckt wordt.
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant. <br />";
echo "<input type='submit'>";
echo "</form>";
?>

</body>
</html>