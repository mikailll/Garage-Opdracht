<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Create-Auto1.PHP</title>
</head>
<body>
<?php

require_once "../Database/gar-connect.php";

$sql = $conn->prepare("SELECT klantid, klantnaam from klant");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<h1>Garage Create Auto</h1>
<p>Dit formulier wordt gebruikt om autogegevens in te voeren.</p>

<form action="gar-create-auto2.php" method="post">
    Kenteken: <input type="text" name="autokentekenvak"> <br />
    Merk: <input type="text" name="automerkvak"> <br />
    Type: <input type="text" name="autotypevak"> <br />
    Kilometer Stand: <input type="text" name="autokmvak"> <br />
    Klant ID:<?php echo "<select name='id'>";
    foreach ($results as $result){
        echo '<option value="' . intval($result["klantid"]) . '">' . $result["klantnaam"] . '</option>';
    }
    echo "</select>";
    ?>

    <br />
    <input type="submit">
</form>

</body>
</html>