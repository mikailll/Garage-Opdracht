<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Zoek-Klant2.PHP</title>
</head>
<body>
<h1>Garage zoek op klantid 2</h1>
<p>Op klantid gegevens zoeken uit de tabel klanten van de database garage.
    <?php
    // KlantID uit het formulier halen ---------------------------------------
    $klantid = $_POST["klantidvak"];

    // KlantGegevens uit het tabel halen --------------------------------------
    require_once "../Database/gar-connect.php";
    $sql = $conn->prepare("SELECT * from klant WHERE klantid = :klantid");
    $sql->execute(["klantid" => $klantid]);

    $countsql = $conn->prepare("SELECT COUNT(*) from klant WHERE klantid = :klantid");
    $countsql->execute(["klantid" => $klantid]);
    $count = $countsql->fetch();

    $results = $sql->fetchAll(PDO::FETCH_ASSOC);


    // KlantGegevens laten zien --------------------------------------

    if ($count[0] == 0) {
        echo "<br><b>Resultaat: </b> Er zijn geen resultaten gevonden!";
    }
    else
    {

    echo "<table>";
    foreach($results as $rij)
    {
        echo "<tr>";
        echo "<td>" . "<b>Klant ID: </b>" . $rij["klantid"] . "</td>";
        echo "<td>" . "<b>Naam: </b>" . $rij["klantnaam"] . "</td>";
        echo "<td>" . "<b>Adres: </b>" . $rij["klantadres"] . "</td>";
        echo "<td>" . "<b>Postcode: </b>" . $rij["klantpostcode"] . "</td>";
        echo "<td>" . "<b>Plaats: </b>" . $rij["klantplaats"] . "</td>";
        echo "</tr>";
    }

    }
    echo "</table> <br />";
    echo "<a href='../gar-menu.php'> Terug naar het menu </a>";
    ?>
</body>
</html>