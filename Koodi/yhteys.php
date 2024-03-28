<?php 
  $palvelin = "localhost";
  $kayttaja = "root";
  $salasana = "";
  $tietokanta = "aj_lainahakemus";
  
  session_start();

  $yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
  
  if ($yhteys->connect_error) {
     die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
  }
  $yhteys->set_charset("utf8");  

  if($_SERVER["REQUEST_METHOD"] =="POST" && isset($_POST["username"]) && isset($_POST["password"]))
  {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $sql="SELECT * FROM käyttäjät WHERE käyttäjäid ='".$username."' AND salasana ='".$password."'";
      
      $result = mysqli_query($yhteys, $sql);

      $row = mysqli_fetch_array($result);
    
    if($row) { 

      $_SESSION["käyttäjäid"] = $username;
      $_SESSION["tyyppi"] = $row["tyyppi"];

      if($row["tyyppi"]=="0")
      { $_SESSION["käyttäjäid"] = $username;
        header("location:lainahakemus.php");
      }


      elseif($row["tyyppi"]=="1")
      {
        { $_SESSION["käyttäjäid"] = $username;
        header("location:register.php");
      } }

      elseif($row["tyyppi"]=="2")
      {
        { $_SESSION["käyttäjäid"] = $username;
        header("location:admin.php");
      } }
    }
      else 
      {
        echo "Syöttämäsi käyttäjä ID tai salasana on virheellinen.";
      }
  }

?>