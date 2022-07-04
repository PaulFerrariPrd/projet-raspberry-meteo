<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

 <style>
  header {color: white; font-size:20px; background-color:#0c0d29;padding:5px}
  header h1 {padding-left:30px; font-family:arial}
  li {display: inline;padding:10px}
  li a {color:white; font-family:arial}
  body {margin:0; padding:0}
  div {padding:20px}
  a:active { color: #5DBFD4; }
 </style>


</head>


<body>

 <header>
  <h1> Sonde Atmospherique </h1>
 <nav class="menu">                              
  <ul>                                           
    <li><a href="index.php">Accueil</a></li>
    <li><a href="telechargements.php">Telechargements</a></li>    
    <li><a href="parametrage.php">Parametrage Sonde</a></li>      
    <li><a href="consultation.php">Consultation Donnees</a></li>
  </ul>                                          
 </nav>                                          
 </header>


<div>

 <p> Cette interface web permet d'observer les temperatures et pressions max et min d'aujourd'hui en provenance de la sonde, <br>
   de telecharger les donnees enregistrees depuis le debut ou d'aujourd'hui et de parametrer l'intervalle de capture de la temperature et de pression. <br>
   <br> Valeurs d'aujourd'hui: <br>
 </p>

<?php
$db = new SQLite3("/data/mesures.db");
$res = $db->query("SELECT max(temperature) tmax, min(temperature) tmin, max(pression) pmax, min(pression) pmin FROM mesures where date>date('now')");

while ($row = $res->fetchArray()) {
    echo "Temperature maximum: {$row['tmax']} C<br>";
    echo "Temperature minimum: {$row['tmin']} C<br>";
    echo "Pression maximum: {$row['pmax']} kPa<br>"; 
    echo "Pression minimum: {$row['pmin']} kPa<br>";
}
?>


</div>
</body>
</html>  

