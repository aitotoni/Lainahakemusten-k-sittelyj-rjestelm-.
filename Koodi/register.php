<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="työntekijätyyli.css">
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
    <h1> REKISTERÖINTI LOMAKE </h1>
    <br>
    <form action="register.php" method="post">
    <input type="number" placeholder="Kayttajatunnus"name ="kayttajatunnus" required><br>
    <input type="text" placeholder="Etunimi" name="etunimi" required><br>
    <input type="text" placeholder="Sukunimi" name="sukunimi" required><br>
    <input type="password" placeholder="Salasana" name="salasana" required><br>
    <input type="number" placeholder="Vuosipalkka"name ="vuosipalkka" required><br> <br>        
    <input type="submit" name="Lähetä" value="Lähetä"> 
    </form>
    <br>

    <?php
    if( isset($_POST["Lähetä"]) ) { 

        $ktunnus = $_POST['kayttajatunnus']; 
            $enimi = $_POST['etunimi'];
            $snimi = $_POST['sukunimi'];
            $ssana = $_POST['salasana'];
            $palkka = $_POST['vuosipalkka'];
            $tyypii = 0;
        
        $hakusql = "SELECT * FROM käyttäjät WHERE käyttäjätunnus='$ktunnus'";

        // suorita kysely ja sijoita palautetut rivit $tulokset-muuttujaan
        $tulokset = $yhteys->query($hakusql);

        // jos tulosrivejä löytyi
        if ($tulokset->num_rows > 0) {
        // hae joka silmukan kierroksella uusi rivi - silmukka päättyy, kun rivit loppuvat
        while($rivi = $tulokset->fetch_assoc()) {
            // taulukon avaimet (hakasuluissa olevat nimet) ovat TIETOKANNAN KENTTIÄ (sarakkeita)
            echo "Valitsemasi käyttäjätunnus on jo otettu. <br>";
        }
        } 
        
        else {
    
            $lisayssql = "INSERT INTO käyttäjät (etunimi, sukunimi, salasana, käyttäjätunnus, vuosipalkka, tyyppi) VALUES ('$enimi', '$snimi', '$ssana', '$ktunnus', '$palkka', '$tyypii')";
            $tulos = $yhteys->query($lisayssql);
        
            if ($tulos === TRUE) {
            echo "Käyttäjä lisätty.";
            } else {
            echo "Virhe: " . $lisayssql . "<br>" . $yhteys->error;
            }
            } 
        }   
       ?>
       </div>
    </div>
</body>
</html>