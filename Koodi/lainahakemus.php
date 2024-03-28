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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lainahakemus</title>
    <link rel="stylesheet" type="text/css" href="asiakastyyli.css">
</head>
<body>
<div id="sivu">
<div id="lomake">
    <h1> LAINAHAKEMUS </h1>

    <form action="lainahakemus.php" method="post">
        <input type="number" name="Maara" placeholder="Määrä" required><br>
        <br>
        <input type="submit" name="submit" value="Lähetä">
        <br>
    </form>

    <?php
    if(isset($_POST["submit"])) {

        $id = $_SESSION["käyttäjäid"];

        $hakusql = "SELECT * FROM käyttäjät WHERE käyttäjäID='$id'";
        $tulokset = $yhteys->query($hakusql);

        $url = 'maksuhäiriöt.json';
        $json_data = file_get_contents($url);

        $asiakas = json_decode($json_data, true);

        $maksuhäiriöt_löydetty = false; 
        
        if (isset($asiakas['asiakas'])) {
            foreach ($asiakas['asiakas'] as $asiakasData) {
                if (isset($asiakasData['maksuhäiriöt']) && $asiakasData['maksuhäiriöt'] == 1) {
                    $maksuhäiriöt_löydetty = true; 
                    break; 
                }
            }
        }
        
        if (!$maksuhäiriöt_löydetty) {
            echo " <br> ";
            echo "Sinulla on maksuhäiriöitä, minkä vuoksi et voi hakea lainaa.";
        }
            
            if ($maksuhäiriöt_löydetty && $tulokset->num_rows > 0) {
                while($rivi = $tulokset->fetch_assoc()) {
                    $kolmen = $rivi['vuosipalkka'] * 3;
                    $summa = $_POST['Maara'];

                    if ($kolmen < $summa) {
                        echo " <br> ";
                        echo "Hae pienempää lainaa, koska tämä ylittää kolmen vuoden palkan.";
                    } else {

                        $lainahaku = "SELECT SUM(summa) FROM lainat WHERE käyttäjäID='$id'";
                        $lainatulos = $yhteys->query($lainahaku);
                        $lainasumma = 0;

                        if ($lainatulos->num_rows > 0) {
                            $lainarivi = $lainatulos->fetch_assoc();
                            $lainasumma = $lainarivi['SUM(summa)'];
                        }

                        if ($lainasumma + $summa > $kolmen) {
                            echo " <br> ";
                            echo "Sinulla on jo niin paljon lainoja, että ne ylittävät kolmen vuoden palkkasi. Olisi parasta hakea lainaa uudelleen vasta kun olet maksanut ne pois.";
                        } else {
                            $pvm = date("Y/m/d");
                            $lisayssql = "INSERT INTO lainat (summa, pvm, käyttäjäID) VALUES ('$summa', '$pvm', '$id')";
                            $tulos = $yhteys->query($lisayssql);

                            if ($tulos === TRUE) {
                                echo " <br> ";
                                echo "Lainahakemuksenne on hyväksytty.";
                            } else {
                                echo " <br> ";
                                echo "Virhe: " . $lisayssql . "<br>" . $yhteys->error;
                            }
                        }
                    }
                }
            }
        }
    ?>
</div>
</div>
</body>
</html>
