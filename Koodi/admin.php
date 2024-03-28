<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admintyyli.css">
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
<h1> KÄYTTÄJÄPANEELI </h1>

    <form action="admin.php" method="post">
        <input type="number" name="kayttajaID" placeholder="käyttäjäID" required><br>
        <br>
        <input type="submit" name="submit" value="Hae">
        <br>
    </form>
    <?php
        if(isset($_POST["submit"])) {

        $id = $_POST['kayttajaID'];
        $hakusql = "SELECT * FROM käyttäjät WHERE käyttäjäID='$id'";

        $tulokset = $yhteys->query($hakusql);

        if ($tulokset->num_rows > 0) {
        while($rivi = $tulokset->fetch_assoc()) {

            ?>
            <br>
            <form action="admin.php" method="post">
                KäyttäjäID: <input type="text" name="käyttäjäID" value="<?php echo $rivi["käyttäjäID"]?>"> <br>
                Etunimi: <input type="text" name="etunimi" value="<?php echo $rivi["etunimi"]?>"> <br>
                Sukunimi: <input type="text" name="sukunimi" value="<?php echo $rivi["sukunimi"]?>"> <br>
                Salasana: <input type="text" name="salasana" value="<?php echo $rivi["salasana"]?>"> <br>
                Käyttäjätunnus: <input type="number" name="käyttäjätunnus" value="<?php echo $rivi["käyttäjätunnus"]?>"> <br>
                Vuosipalkka: <input type="number" name="vuosipalkka" value="<?php echo $rivi["vuosipalkka"]?>"> <br>
                Tyyppi: <input type="number" name="tyyppi" value="<?php echo $rivi["tyyppi"]?>"> <br> <br>
                <input type="submit" name="update" value="Päivitä"> <br>
                <br>

            <?php

        }
        } else {
        echo "Ei tuloksia.";
        }
        }
    ?>

    <?php 

    if(isset($_POST["update"])) {
        
        $id = $_POST['käyttäjäID'];
        $enimi = $_POST['etunimi'];
        $snimi = $_POST['sukunimi'];
        $ssana = $_POST['salasana'];
        $ktunnus = $_POST['käyttäjätunnus'];
        $palkka = $_POST['vuosipalkka'];

        $lisayssql = "UPDATE käyttäjät SET etunimi='$enimi', sukunimi='$snimi', salasana='$ssana', käyttäjätunnus='$ktunnus', vuosipalkka='$palkka' WHERE käyttäjäID='$id'";
        $tulos = $yhteys->query($lisayssql);

        if ($tulos === TRUE) { 
        echo "Muunsimme käyttäjän tietoja.";
        } else {
        echo "Virhe: " . $lisayssql . "<br>" . $yhteys->error;
        }
    }
    ?>
</div>
</div>

</body>
</html>