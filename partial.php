<?php 
	$source = file_get_contents("weeks.json");
?>

<?php
	$json = json_decode($source, TRUE);

		$guysname = $_GET['player'];
		$pieces = explode(' ', $guysname);

function calcDatStuff($input_val, $search, $iteration){
	$theThingy = array();

	foreach(array_keys($input_val) as $keynext => $value){
		if(strpos($value, $search)){
			$theThingy[$value] = $input_val[$value];
		}
	}
		foreach($theThingy as $playkey => $playvalue){
			if($playvalue == "Yes"){
				$playcount +=1;
			}
		}
	echo "Weeks " . $iteration . ": " . $playcount . "<br>";
}
?>


		
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
				break; 
			}
		}
		
		?>