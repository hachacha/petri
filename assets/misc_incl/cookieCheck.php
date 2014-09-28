<?php

if(isset($_COOKIE['user_id'])){ 
	echo 'You are already logged in<br />'; 
	echo '<a href="/logout.php">log out</a> <br />'; 
	echo ' <a href="userProfile.php">profile</a>';
}
?>