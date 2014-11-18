<?php 
//this is the login page/splash page
//if there's already a cookie. use that cookie.
if(isset($_COOKIE['user_id'])){ 
	$user_id = $_COOKIE['user_id'];
	header("location: profile.php");//take them to the profile page
}
?>
<html>
<head>
<title>Petri</title>
	<link rel='stylesheet' type='text/css' href='styles/splash.css'>
	<link rel='stylesheet' type='text/css' href='styles/overArch.css'>
	<script type="text/javascript" src="lib/jquery.min.js"></script>

</head>
<body>
<div id="container">
	<div id="response">
	</div>
	<div>
		<center><b>Login</b></center>
		<form id="logForm" method="post" action="">
			E-mail Address:<input name='email' required/><br />
			Password: <input name='password' type='password' required/><br>
			<p>
			<button>submit</button>
		</form>
	</div>
	<div >
		<b>Join here: &nbsp;&nbsp;<a href='registerUser.php'>REGISTER</a>	
			<br> 
			<br>
			More information:&nbsp;&nbsp;<a href='about.php'>ABOUT</a></b>
	</div>
</div>

<script type="text/javascript">
	$("#logForm").on('submit',function(e){
		e.stopImmediatePropagation();
		e.preventDefault();
			$.ajax({
				type:"post",
				url:"loginClient.php",
				data: $("#logForm").serialize(),
				success: function(data){
					if(data=="1"){
						window.location.href= 'profile.php';
					}
					else{
						$("#response").html(data);
						$("#logForm")[0].reset();
					}
				}
			});
			return false;
		});
</script>

</body>

</html>
