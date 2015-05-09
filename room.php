<?php
//room.php
include_once("UserChecker.php");
$user = new UserChecker($_COOKIE['email'], $_COOKIE['password']);
echo "level:" . $user->level;
include_once("PostClient.php");
$pc = new PostClient($user_id,$room_id);
?>

<head>
	<title> ROOM <?php echo $_GET['rID']; ?> </title>
	<link rel="stylesheet" type="text/css" href="styles/workStyle.css">
	<link rel="stylesheet" type="text/css" href="styles.convL.css">
	<link rel="stylesheet" type="text/css" href="styles/room.css">
	<link rel="stylesheet" type="text/css" href="styles/overArch.css">
	<script src="lib/jquery.min.js"></script>
</head>
<html>
	<?php 
		include_once("assets/misc_incl/header.php");
		// var_dump($pc->posts);
		echo "<br>";
	?>
	<div id="usrInput">
		<form name="poster" id="poster">
			<textarea name="tag" rows='1' cols='25' placeholder='enter tag here'></textarea>
			<br />
			<textarea name="content" rows='5' cols='80'></textarea>
			<br />
			<input type="checkbox" value="nsfw" name="nsfw"/>nsfw
			<input type="submit" value="commit"/>
		</form>
	</div>
	<div id="posts">
		<?php
			foreach ($pc->posts as $post) {
				$reply_class = ($post['reply']==NULL?'':"class='reply'");//either an empty string or w/class reply. 
																		 //replies can be found by getting the id and stripping the p
				echo "<div id='p".$post['post_id']."' ". $reply_class .">";
					echo "<div class='pdetails'>";
						echo "<<".date('j/m/y H:i:s ', $post['datetime']). " <button id='r".$post['post_id']."'>".$post['post_id']."</button>>>";//onclick reply to this post id stripping the p. 
					echo "</div>";
					echo "<div class='content'>";
						echo $post['ipc'];
						echo $post['tpc'];
						echo $post['fpc'];
						echo $post['lpc'];
					echo "</div>";
				echo "</div>";
		?>
				<br/>
				<?php

			}
		?>
	</div>
	
</body>
</html>