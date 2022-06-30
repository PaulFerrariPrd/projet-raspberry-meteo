<form method="post" action="">
   <div>
       <label for="pays">Quel intervalle entre mesure température?</label><br />
       <select name="period" id="period">
	   <option value="3">3sec</option>
	   <option value="6">6sec</option>
           <option value="30">30sec</option>
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
