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


<?php
$fp = fopen('/data/config_c', 'w');
fwrite($fp, "PERIOD=" . $_POST['period'] . "\n");
fwrite($fp, "# intervalle entre chaque mesure en secondes\n");
fclose($fp);
?>


<form action="get_today_data_json.php" method="post">
	<input type="submit" name="submit" value="Telecharger les donnees d'aujourd'hui en JSON" />
</form>

<form action="get_all_data_json.php" method="post">
	<input type="submit" name="submit" value="Telecharger toutes les donnees en JSON" />
</form>

<form action="get_today_data_csv.php" method="post">
	<input type="submit" name="submit" value="Telecharger les donnees d'aujourd'hui en CSV" />
</form>

<form action="get_all_data_csv.php" method="post">
	<input type="submit" name="submit" value="Telecharger toutes les donnees en CSV" />
</form>

</div>
</body>
</html>  

