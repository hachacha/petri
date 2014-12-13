<?php
$user_id = $_COOKIE['user_id'];
$room_id = $_GET['rID'];
include_once("GetPosts.php");
class PostClient{
	public function __construct($user_id,$room_id){
		$this->user_id = $user_id;
		$this->room_id = $room_id;		
		$this->posts = GetPosts::allPosts($this->user_id,$this->room_id);
	}
	public function getPosts(){
		return $this->user_id;
		// return 	
	}
}

$rc = new PostClient($user_id,$room_id);
echo json_encode($rc->posts);

?>