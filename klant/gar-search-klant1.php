<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Zoek-Klant1.PHP</title>
</head>
<body>

<h1>Garage zoek op klantid 1</h1>
<p>Dit formulier zoekt een klant op uit de tabel klanten van database garage.</p>
<form action="gar-search-klant2.php" method="post">
    Welk klantid zoekt u?
    <input type="text" name="klantidvak" required> <br />
    <input type="submit">
</form>

</body>
</html>