<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lainahakemus</title>
    <link rel="stylesheet" type="text/css" href="asiakastyyli.css">
</head>
<body>

<?php 
include 'yhteys.php';

if(isset($_SESSION['tyyppi'])) {
    if($_SESSION['tyyppi'] == 1) {
        include_once('työntekijäNav.php');
    } elseif($_SESSION['tyyppi'] == 0) {
        include_once('asiakkaanNav.php');
    }   elseif($_SESSION['tyyppi'] == 2) {
        include_once('adminNav.php');
    }
} else {
    header('Location: kirjautumis_sivu.php');
}
?>
<div id="sivu">
<div id="lomake">
<h1> PROFIILI </h1> <br>

<h2> HENKILÖTIEDOT </h2>
<?php


        $id = $_SESSION["käyttäjäid"];
        $hakusql = "SELECT * FROM käyttäjät WHERE käyttäjäID='$id'";

        $tulokset = $yhteys->query($hakusql);

        if ($tulokset->num_rows > 0) {
        while($rivi = $tulokset->fetch_assoc()) {

            ?>
            <br>
            KäyttäjäID: <?php echo "$id" ?> <br>
            Etunimi: <?php echo $rivi["etunimi"] ?> <br>
            Sukunimi: <?php echo $rivi["sukunimi"] ?> <br>
            Salasana: <?php echo $rivi["salasana"] ?> <br>
            Käyttäjätunnus: <?php echo $rivi["käyttäjätunnus"] ?> <br>
            Vuosipalkka: <?php echo $rivi["vuosipalkka"] ?> <br>

            <?php

    }
    } else {
    echo "Ei tuloksia.";
    }
    ?>
    
<br> <h2> LAINAT </h2> <br>

<?php

$yhteensa = 0;

$id = $_SESSION["käyttäjäid"];
$hakusql = "SELECT * FROM lainat WHERE käyttäjäID='$id'";
$tulokset = $yhteys->query($hakusql);


if ($tulokset->num_rows > 0) {
   while($rivi = $tulokset->fetch_assoc()) {
      echo "Summa: " . $rivi["summa"] . "<br>";
      echo "Päivämäärä: " . $rivi["pvm"] . "<br>";
      echo " <br>";
      $yhteensa += $rivi["summa"];
   } 
   echo "<br>";
   echo "Yhteensä: " . $yhteensa;
   echo "<br>";
} else {
   echo "Ei tuloksia";
}
?>


</body>
</div>
</div>