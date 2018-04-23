<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Update-Auto2.PHP</title>
</head>
<body>
<h1>Garage Update Auto 2</h1>
<p>Dit formulier wordt gebruikt om autogegevens te wijzigen in de tabel auto van de database garage.</p>
</body>
</html>

<?php
// autokenteken uit het formulier halen --------------------------------------------------
$autokenteken = $_POST["kentekenvak"];

// AutoGegevens uit de tabel halen ----------------------------------------------------
require_once "../Database/gar-connect.php";

$autos = $conn->prepare("SELECT * FROM auto where autokenteken = :autokenteken");
$autos->execute(["autokenteken" => $autokenteken]);

// KlantGegevens in een nieuw formulier laten zien -------------------
echo "<form action='gar-update-auto3.php' method='post'>";
foreach($autos as $auto)
{
    // KlantID mag niet gewijzigd worden
    echo " Autokenteken:" . $auto["autokenteken"];
    echo " <input type='hidden' name='autokentekenvak' ";
    echo " value=' " . $auto["autokenteken"] . " '> <br /> ";

    echo " Automerk: <input type='text'";
    echo " name = 'automerkvak' ";
    echo " value = '" . $auto["automerk"] . "' ";
    echo "> <br />";

    echo " Autotype: <input type='text' ";
    echo "name = 'autotypevak' ";
    echo "value = '" .$auto["autotype"] . "' ";
    echo "> <br />";

    echo " Autokmstand: <input type='text' ";
    echo " name = 'autokmstandvak' ";
    echo " value = '" . $auto["autokmstand"] . "' ";
    echo "> <br />";

    echo " Klantid:" . $auto["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo " value=' " . $auto["klantid"] . " '> <br /> ";
    echo " <br />";
}
echo "<input type='submit'>";
echo "</form>";

?>