<?php //$yep = file_get_contents("http://www.pbs.org/wgbh/pages/frontline/js/data/concussions/weeks.json?cachebust=96")
		$source = file_get_contents("weeks.json");
		?>
<?php $json = json_decode($source, TRUE); ?>

<?php 
function calcDatStuff($input_val, $search, $iteration){
	$theThingy = array();

	foreach(array_keys($input_val) as $keynext => $value){
		if(strpos($value, $search)){
			$theThingy[$value] = $input_val[$value];
		}
	}
	// ksort($theThingy,SORT_NATURAL);
		foreach($theThingy as $playkey => $playvalue){
			// echo str_replace('_played', '', str_replace('week', 'Week ',$playkey)). " ";
			// echo $playvalue . "<br>";
			if($playvalue == "Yes"){
				$playcount +=1;
			}
		}
	echo "Weeks " . $iteration . ": " . $playcount . "<br>";
}
		$name = $_GET["player"];
		$pieces = explode(' ', $name);
		?>
		<form action="./" method="GET">
			<select  name="player" onchange="this.form.submit();">
				<option>Choose a Player</option>
		<?php
		foreach($json as $key => $val){
		?>
				<option><?php echo $val['player_first'] . ' ' . $val['player_last']; ?></option>
			<?php }	?> 
						</select>
		</form>

		<?php
		foreach($json as $key => $val){
			$playcount = 0;
			$injurycount = 0;
			if($val['player_first'] == $pieces[0] && $val['player_last'] == $pieces[1]){
				echo "<h1>" . $val['player_first'] . " ";
				echo $val['player_last'] . "</h1> ";
				echo "<h2>" . $val['team'] . "</h2> ";
				echo $val[''];
				calcDatStuff($val, "played", "Played");
				calcDatStuff($val, "report", "Injured");
				echo "<a href='$val[url]' target='_blank'>" . "Player Profile" . "</a>" . "<br>"; 
			}
		}
		
		?>






