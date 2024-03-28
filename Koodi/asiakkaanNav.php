<div id="nav">
    
    <?php

    if(!isset($_SESSION["käyttäjäid"]))
    {
        header("location: kirjautumis_sivu.php");
    }
?> 
    <div id="linkit">
        <a> <?php echo $_SESSION["käyttäjäid"]?> </a>
        <a href="lainahakemus.php">Lainahakemus </a> 
        <a href="profiili.php">Profiili </a> 
        <a href="kirjaudu_ulos.php"> Kirjaudu ulos</a>
    </div>
    <br>

</div>