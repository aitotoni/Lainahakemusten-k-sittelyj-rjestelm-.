<div id="nav">

<?php

    if(!isset($_SESSION["käyttäjäid"]))
    {
        header("location: kirjautumis_sivu.php");
    }
?> 
    <div id="linkit">
        <a> <?php echo $_SESSION["käyttäjäid"]?> </a> 
         <a href="admin.php"> Käyttäjäpaneeli</a> 
         <a href="kirjaudu_ulos.php"> Kirjaudu ulos</a> 
    </div>

</div>