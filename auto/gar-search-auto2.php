<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Zoek-Auto2.PHP</title>
</head>
<body>
<h1>Garage zoek op Kenteken 2</h1>
<p>Op kenteken gegevens zoeken uit de tabel auto van de database garage.
    <?php

        // KlantID uit het formulier halen ---------------------------------------
        $kenteken = $_POST["autokentekenvak"];
    if ($kenteken !== "") {

        // KlantGegevens uit het tabel halen --------------------------------------
        require_once "../Database/gar-connect.php";
        $sql = $conn->prepare("SELECT * from auto WHERE autokenteken LIKE '%$kenteken%'");
        // SQL Query om de resultaten in cijfers terug te krijgen zodat er een bericht verschijnt als er niks verschenen is.
        $countsql = $conn->prepare("SELECT COUNT(*) from auto WHERE autokenteken LIKE '%$kenteken%'");
        $countsql->execute();
        $count = $countsql->fetch();
        //////////////////////////////////////////////////////////////
        $sql->execute(["kenteken" => $kenteken]);

        $results = $sql->fetchAll(PDO::FETCH_ASSOC);

//    var_dump($test2);

        if ($count[0] == 0) {
            echo "<br><b>Resultaat: </b> Er zijn geen resultaten gevonden!";
        } else {

            echo "<table>";

            foreach ($results as $rij) {
                echo "<tr>";
                echo "<td>" . "<b>Kenteken: </b>" . $rij["autokenteken"], "</td>";
                echo "<td>" . "<b>Merk: </b>" . $rij["automerk"], "</td>";
                echo "<td>" . "<b>Type: </b>" . $rij["autotype"], "</td>";
                echo "<td>" . "<b>Kilometer Stand: </b>" . $rij["autokmstand"], "</td>";
                echo "<td>" . "<b>Klant ID: </b>" . $rij["klantid"], "</td>";
                echo "</tr>";
            }
            echo "</table> <br />";
            echo "<a href='../gar-menu.php'> Terug naar het menu </a>";

        }
    }else{
        echo "<br><b>Vul een kenteken in!</b>";
    }
    ?>



</body>
</html>