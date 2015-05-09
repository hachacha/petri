<?php
	$user_id = $_COOKIE['user_id'];
	$room_id = $_GET['rID'];
	class CommentClient{
		public function __construct($user_id,$room_id){
			$this->user_id = $user_id;
			$this->room_id = $room_id;
			include_once("UniversalConnect.php");
			
			if(in_array("reg", $_POST)){
				//regular text post.

			}
			// elseif
			// else
		}
		public function reg(){
			
		}
	}

?>