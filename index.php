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


<?php 
	$source = file_get_contents("weeks.json");
?>
<?php 
	$json = json_decode($source, TRUE);
?>
		

		
		<form action="./" method="POST">
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








