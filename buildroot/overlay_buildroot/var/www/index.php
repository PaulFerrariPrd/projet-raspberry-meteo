<form method="post" action="">
   <div>
       <label for="pays">Quel intervalle entre 2 mesures temperature+pression?</label><br />
       <select name="period" id="period">
           <option value="30" selected>30sec</option>
           <option value="60">1min</option>
           <option value="120">2min</option>
           <option value="240">4min</option>
           <option value="3600">1h</option>
           <option value="7200">2hs</option>
       </select>
   </div>
   <div>
        <button type="submit">Select</button>
   </div>
</form>

<?php
$fp = fopen('/data/config_c', 'w');
fwrite($fp, "PERIOD=" . $_POST['period'] . "\n");
fwrite($fp, "# intervalle entre chaque mesure en secondes\n");
fclose($fp);
?>


<form action="get_today_data_json.php" method="post">
	<input type="submit" name="submit" value="Download the measures of today in JSON" />
</form>

<form action="get_all_data_json.php" method="post">
	<input type="submit" name="submit" value="Download all the measures in JSON" />
</form>

<form action="get_today_data_csv.php" method="post">
	<input type="submit" name="submit" value="Download the measures of today in CSV" />
</form>

<from action="get_all_data_csv.php" method="post">
	<input type="submit" name="submit" value="Download all the measures in CSV" />
</form>


<?php 

