<?php                                                                                                 
header('Content-Disposition: attachment; filename="all_data.json"');                                                                                                     
header('Content-type: application/json');


$db = new SQLite3("/data/mesures.db");                             
$res = $db->query("SELECT id, temperature, pression, date FROM mesures");
                                                                                                      
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {                                                      
   // echo "{$row['id']} {$row['temperature']} {$row['pression']} {$row['date']} <br>";               
   $jsonArray[] = $row;                                     
}
                                                                               
$json = json_encode($jsonArray);                                                                      
        
echo $json;                                                                                              
?>    
