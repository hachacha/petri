<?php
$user_id = $_COOKIE['user_id'];
$room_id = $_GET['rID'];
include_once("GetPosts.php");
class PostClient{
	//for determining how to display posts
	public function __construct($user_id,$room_id){
		$this->user_id = $user_id;
		$this->room_id = $room_id;
		$this->posts = GetPosts::allPosts($this->user_id,$this->room_id);
	}
}

?>