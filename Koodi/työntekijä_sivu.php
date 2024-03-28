<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    session_start();
    if(!isset($_SESSION["käyttäjäid"]))
    {
        header("location: kirjautumis_sivu.php");
    }
?>

    <h1> TYÖNTEKIJÄN SIVU </h1> <?php echo $_SESSION["käyttäjäid"]?>

    <a href="kirjaudu_ulos.php"> Kirjaudu ulos</a>
    <a href="rekisteröinti_lomake.php">Rekisteröinti lomake </a>
</body>
</html>