<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Delete-Klant3.PHP</title>
</head>
<body>
<h1>Garage Delete Klant 3</h1>
<p>Op KlantID gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnen worden.</p>

<?php
// Gegevens uit het formulier halen ----------------------------------------
$klantid = $_POST["klantidvak"];
$verwijderen = $_POST["verwijdervak"];
// Klantgegevens verwijderen ---------------------------------------------------
if($verwijderen)
{
    require_once "../Database/gar-connect.php";

    $sql = $conn->prepare("DELETE from klant WHERE klantid = :klantid");
    $sql->execute(["klantid" => $klantid]);
    echo "De gegevens zijn verwijderd. <br />";
}
else
{
    echo "De gegevens zijn niet verwijderd. <br />";
}
echo "<a href='../gar-menu.php'>Terug naar het menu. </a>";

?>

</body>
</html>