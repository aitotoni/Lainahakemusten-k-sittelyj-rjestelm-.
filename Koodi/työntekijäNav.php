<div id="nav">

<?php

    if(!isset($_SESSION["käyttäjäid"]))
    {
        header("location: kirjautumis_sivu.php");
    }
?> 
    <div id="linkit">
        <a> <?php echo $_SESSION["käyttäjäid"]?> </a> 
         <a href="register.php">Rekisteröinti lomake </a> 
         <a href="asiakaspaneeli.php"> Asiakaspaneeli</a> 
         <a href="kirjaudu_ulos.php"> Kirjaudu ulos</a> 
    </div>

</div>