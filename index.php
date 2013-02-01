<head>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/d3/3.0.1/d3.v3.min.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script type="text/javascript">
	   var doIt = function(playername){   
	   		guysname = $("#player").val();
	        $.ajax({
                type: "POST",
                url: "partial.php?player=" + guysname,  // your PHP generating ONLY the inner DIV code
                success: function(html){
                    $("#partial").html(html);
                }
        	});
        }
	</script>

</head>


<?php //$yep = file_get_contents("http://www.pbs.org/wgbh/pages/frontline/js/data/concussions/weeks.json?cachebust=96")
	$source = file_get_contents("weeks.json");
	$partial = file_get_contents("partial.php");
?>
<?php 
	$json = json_decode($source, TRUE);
?>
		

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
		$name = $_POST["player"];
		$pieces = explode(' ', $name);
		?><?php echo $name; ?>
		
		<form action="./" method="POST">

		<!--	<select  name="player" onchange="this.form.submit();"> -->
			<select id="player" name="player" onchange="doIt();">
				<option>Choose a Player</option>
		<?php
		foreach($json as $key => $val){
		?>
				<option><?php echo $val['player_first'] . ' ' . $val['player_last']; ?></option>
			<?php }	?> 
			</select>
		</form>


<div id="partial"></div>








