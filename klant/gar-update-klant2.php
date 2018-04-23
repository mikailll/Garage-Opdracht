<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Update-Klant2.PHP</title>
</head>
<body>
<h1>Garage Update Klant 2</h1>
<p>Dit formulier wordt gebruikt om klantgegevens te wijzigen in de tabel klant van de database garage.</p>

<?php
// Klantid uit het formulier halen --------------------------------------------------
$klantid = $_POST["klantidvak"];

// KlantGegevens uit de tabel halen ----------------------------------------------------
require_once "../Database/gar-connect.php";

$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant where klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

// KlantGegevens in een nieuw formulier laten zien -------------------
echo "<form action='gar-update-klant3.php' method='post'>";
foreach($klanten as $klant)
{
    // KlantID mag niet gewijzigd worden
    echo " klantid:" . $klant["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo " value=' " . $klant["klantid"] . " '> <br /> ";

    echo " klantnaam: <input type='text'";
    echo " name = 'klantnaamvak' ";
    echo " value = '" . $klant["klantnaam"] . "' ";
    echo "> <br />";

    echo " klantadres: <input type='text' ";
    echo "name = 'klantadresvak' ";
    echo "value = '" .$klant["klantadres"] . "' ";
    echo "> <br />";

    echo " klantpostcode: <input type='text' ";
    echo " name = 'klantpostcodevak' ";
    echo " value = '" . $klant["klantpostcode"] . "' ";
    echo "> <br />";

    echo " klantplaats: <input type='text' ";
    echo " name = 'klantplaatsvak' ";
    echo " value = '" . $klant["klantplaats"] . "' ";
    echo "> <br />";
}
echo "<input type='submit'>";
echo "</form>";

// Er moet eigenlijk nog gecontroleerd worden op een bestaand KlantID.
?>
</body>
</html>