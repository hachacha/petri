<?php 
	include_once("UserChecker.php");
	include_once("RoomClient.php");
	$rc = new RoomClient();//automatically gets me my rooms and puts them in $rc->rooms   :p
?>
<html>
	<head>
		<title>map</title>
		<link href="styles/map.css" type="text/css" rel="stylesheet">
		<link rel='stylesheet' type='text/css' href='overArch.css'>
		<script src="lib/jquery.min.js"></script>
	</head>
	<body>
		<?php include_once("assets/misc_incl/header.php"); ?>
		<div id="toggleRooms">
			<!-- should be full of controls for changing what rooms are being displayed. -->
		</div>
		<div id="roomDisplay">
			<!-- contains the rooms that you wanna display :) -->
			<?php
				foreach ($rc->rooms as $room) {
					echo "<div id='col1'><a href='room.php?rID=".$room['room_id']."'>#".$room['room_id'] .
					"&mdash;&nbsp;".$room['t1']."&nbsp;&ndash;&nbsp;".$room['t2']."&nbsp;&ndash;&nbsp;".$room['t3']."</a></div>";
				}
			?>
		</div>
	</body>
</html>