<?php
//this page has to be created with viewability in mind. If someone is not "advanced" enough
//then certain elements should be hidden.
include_once("UserChecker.php");
?>

<html>
<head>
		<title>
		        profile
		</title>
		<link rel="stylesheet" type="text/css" href="styles/profile.css">
		<link rel='stylesheet' type='text/css' href='styles/overArch.css'>
</head>

<body>

	<?php
	include_once("assets/misc_incl/header.php");
	?>

	<div id ="visited" class="recent">
			<i class="recentHead">last visited</i>
			<div id="visit_roll">
			</div>
	</div>

	<div id="replies">
		<i class="recentHead">recent responses</i>
		<div id="reply_roll"></div>
	</div>

	<div id="stats">
		<i class="recentHead">Your Stats</i>
		<div id="stat_roll"></div>
	</div>

	<div id="healthBar">
		<p>hi i'm yr health bar</p>
		<p>[####.....] </p>
		<p>
		<a href="userStats.php">click to view more of your stats</a>
	</div>
</body>

</html>
