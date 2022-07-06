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
if (isset($_GET['limit'])){
 $_POST['limit'] = $_GET['limit'];
}

if (isset($_GET['type'])){
 $_POST['type'] = $_GET['type'];
}

if (isset($_GET['format'])){
 $_POST['format'] = $_GET['format'];
}

if (isset($_GET['date'])){
 $_POST['date'] = $_GET['date'];
}
?>

<form method="post" action="">
  Type de donnees: <select name="type" id="type">
   <option value="temperature, pression" selected>temperature + pression</option>
   <option value="temperature">temperature</option>
   <option value="pression">pression</option>
  </select>

  Limite: <input type="text" name="limit">
  
  Date (AAAA-MM-JJ): <input type="text" name="date">
 
  Format <select name="format" id="format">
   <option value="json">JSON</option>
   <option value="csv">CSV</option>
  </select><br>

  <button type="submit">Afficher</button>
 
 
</form>
<hr>


<?php
 echo "type: {$_POST['type']}<br>";  
 echo "limite: {$_POST['limit']}<br>";
 echo "date: {$_POST['date']} <br>";
 echo "format: {$_POST['format']} <br>";
?>

<hr>


<?php



$db = new SQLite3("/data/mesures.db");

$query = "SELECT id, " . $_POST['type'] . ", date FROM mesures";

if ($_POST['date'] != ""){
  $query .= " WHERE date LIKE '";
  $query .= $_POST['date'];
  $query .= "%' ";
}

if ($_POST['limit'] != ""){
  $query .=  " LIMIT ";
  $query .= $_POST['limit'];
}


$res = $db->query($query);


//verify date format to avoid error
if ($res->fetchArray(SQLITE3_ASSOC)){

 // put pointer on first line again
 $res->reset();

 // CSV format
 if ($_POST['format'] == "csv"){
   echo "ID, temperature, pression, date <br>";
   while ($row = $res->fetchArray(SQLITE3_ASSOC)) { 
     echo "{$row['id']}, {$row['temperature']}, {$row['pression']}, {$row['date']} <br>";
   }
 
 // JSON format
 } elseif ($_POST['format'] == "json"){
   while ($row = $res->fetchArray(SQLITE3_ASSOC)){
     $Array[] = $row;
   }
   $jsonArray = json_encode($Array, JSON_PRETTY_PRINT);
   echo "<pre>" . $jsonArray . "</pre>";
 }

} else {
 echo "Mauvais format de date ou date absente de la base de donnees";
}

?>


</div>
</body>
</html>  

