<?php
	if(isset($_COOKIE['user_id'])){ 
		echo 'You are currently logged in<br />'; 
		echo '<a href="logout.php">Log out</a><br />'; 
		echo 'click <a href="userProfile.php">Profile</a>';
	}  
?>

<html>
<head>
	<link rel='stylesheet' type='text/css' href='styles/register.css'>
	<link rel='stylesheet' type='text/css' href='styles/overArch.css'>
	<title>Register New User</title>
</head>
<body>
	</br>
	<center>
	<div id='container'>
		<div id="form">
			<h2>register here</h2>
			<form method="POST" action="regiClient.php">
				E-mail Address:<br><input name="email" required/><br>
				Password:<br> <input name="pw" type="password" required/><br>
				Re-Enter Password:<br> <input name="confirm" type="password" required/><br>
				<input id= 'button'name="Submit" type="submit" value="register"/>
			</form>
		</div>			
	</div>
	</center>
	</br>
	<div id="extra" class='inner'>
		<b>Privacy Information: &nbsp;&nbsp;<a href='pPolicy.php'>PRIVACY</a>	
			<br> 
			<br>
		General information:&nbsp;&nbsp;<a href='about.php'>ABOUT</a></b>
	</div>
</body>
</html>