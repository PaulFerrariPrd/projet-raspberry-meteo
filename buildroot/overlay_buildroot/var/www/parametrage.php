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

<form method="post" action="">
   
       <label for="pays">Quel intervalle entre 2 mesures temperature+pression?</label><br><br>
       <select name="period" id="period">
           <option value="30" selected>30sec</option>
           <option value="60">1min</option>
           <option value="120">2min</option>
           <option value="3000">5min</option>
           <option value="3600">1h</option>
           <option value="7200">2h</option>
       </select>

       <button type="submit">Selectionner</button>

</form>

<?php
$fp = fopen('/data/config_c', 'w');
fwrite($fp, "PERIOD=" . $_POST['period'] . "\n");
fwrite($fp, "# intervalle entre chaque mesure en secondes\n");
fclose($fp);
?>


</div>
</body>
</html>  

