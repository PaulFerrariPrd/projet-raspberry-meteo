<?php                                                                                                 
header('Content-Disposition: attachment; filename="all_data.csv"'); 
header('Content-type: application/csv');


$db = new SQLite3("/data/mesures.db");                             
$res = $db->query("SELECT id, temperature, pression, date FROM mesures");
echo "ID,temperature,pression,date\n";                                                                                                       
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {                                                      
   echo "{$row['id']},{$row['temperature']},{$row['pression']},{$row['date']}\n";               
}

?>    
