<?php
#tu0100241pc1 to tu0100241pc75 PW: 67995618
error_reporting(E_ALL); 
ini_set( 'display_errors','1');

$STEAM_BASE_ID = "tu0100241pc";
$IP = $_SERVER['REMOTE_ADDR'];
$STEAM_DATA = "steam.json";
$PASSWORD = "67995618";

if(isset($_GET['reset']) && $_GET['reset'] == "iugaofficer"){
	$file = fopen($STEAM_DATA,'w+');
	fwrite($file, "[]");
	fclose($file);
	$reset = true;
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>IUGA Game Night</title>
    	<meta charset="UTF-8">
    	<!-- Bootstrap --><link href="bootstrap.min.css" rel="stylesheet">
    	<link href="style.css" rel="stylesheet">
  	</head>
	<body>
		<div class="container">
		
				<div id="head" class="oneup">
					<audio src="1up.mp3" preload="auto"></audio>
					<img src="head.png">
				</div>
			<div class="centered">
				<div id="countdown">
				<h1>IUGA Game Night</h1>
				<h5>Using IP: <?=$IP ?></h5>
			  		<div class="message">
			  			<?php
			  			if(isset($reset) && $reset){
			  				echo '<h2 class="alert alert-danger">Data Reset</h2>';
			  			}
					if(isset($_GET['newid'])){
						//Check for stored IP
						//Output new ID if it doesn't exist or old id if it does
						$json_data = file_get_contents($STEAM_DATA);
						$json = json_decode($json_data, true);
						$uid = getSteamID($json, $IP);

						if(!$uid){
							//Create a new ID
							$uid = array_push($json, $IP);
							$file = fopen($STEAM_DATA,'w+');
							fwrite($file, json_encode($json));
							fclose($file);
						}
						$steamid = $STEAM_BASE_ID . $uid;
						?>
						<p><strong>Steam ID:</strong> <?= $steamid ?><br>
						<strong>Steam Pass:</strong> <?= $PASSWORD ?></p>
						<!-- -login %u %p -->
						<a class="well" href='steam://nav/games'>Launch Steam!</a>
						<?php
					}else{
						?>
					<p>Welcome! Let's play some games!<a></p>
		  				<!-- Inserts links to social pages here -->
		  				<a class="well" href="?newid">Get Steam ID</a>
		  				<a class="well" href="http://ischool.uw.edu/academics/informatics" target="_blank">Learn about Informatics</a>
					<?php } ?>
	  				</div> 		
			  	</div>
			</div>
	    	<div id="games">
	    		<img src="games.png">
	    	</div>
		   <div class="navbar navbar-fixed-bottom">
			<div class="navbar-inner container">
			<a class="brand" href="/">IUGA</a>
			<ul class="nav pull-right">
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Feedback</a>
					<ul class="dropdown-menu">
						<li><a href="https://www.facebook.com/events/547472931959478/558842620822509" target="_blank">Facebook Event</a></li>
						<li><a href="https://www.facebook.com/groups/informatics.uw/" target="_blank">Informatics Group</a></li>
						<li class="divider"></li>
						<li class="disabled"><a href="#"><strong>Evan Cohen</strong></a></li>
						<li><a href="mailto:evanc3@uw.edu">evanc3@uw.edu</a></li>
						<li>
							<a href="tel:15108624733">1 (510) 862-4733</a>
						</li>
					</ul>
				</li>
			</ul>
			</div>
		</div> 
	    </div><!-- /.container -->

	    <script src="jquery-1.8.1.min.js"></script>
    	<script src="bootstrap.min.js"></script>
    <script type="text/javascript">
		$(function(){
		    var oneup     = $('.oneup');
	        var oneupaudio = oneup.find('audio')[0];
		    oneup.hover(function(){
		       oneupaudio.play();
		    }, function(){
		       oneupaudio.stop();
		    });
		});
    </script>
  </body>
</html>

<?php
function getSteamID($json, $ipAddress){
	$idIndex = array_search($ipAddress, $json);

	for ($i=0; $i < count($json); $i++) { 
		if($json[$i] == $ipAddress){
			return $i + 1;
		}
	}
	return false;
}
?>
