<?php 
include('yhteys.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="kirjautumis.css">
</head>
<body>
<div id="sivu">
<div id="lomake">
  <form action="kirjautumis_sivu.php" method="post">
      <h2 style="text-align:center">Kirjautumissivu</h2>
        <input type="text" name="username" placeholder="Käyttäjä ID" required>
        <input type="password" name="password" placeholder="Salasana" required>
        <input type="submit" value="Kirjaudu sisään">
</div>
</div>

  
</body>
</html>