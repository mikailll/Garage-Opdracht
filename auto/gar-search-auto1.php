<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Gar-Zoek-Auto1.PHP</title>
</head>
<body>

<h1>Garage zoek op kenteken 1</h1>
<p>Dit formulier zoekt een kenteken op uit de tabel auto van database garage.</p>
<form action="gar-search-auto2.php" method="post">
    Welk kenteken zoekt u?
    <input type="text" name="autokentekenvak" required> <br />
    <input type="submit">
</form>

</body>
</html>