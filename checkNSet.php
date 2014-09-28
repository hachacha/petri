<?php
if(isset($_COOKIE['user_id'])){
	$user_id = $_COOKIE['user_id'];
}
else{
	header("Location: index.php");
}

include_once("UniversalConnect.php");
class checkNSet{
	public function __construct($user_id){
		$this->user_id = $user_id;
	}
}

$worker = new checkNSet($user_id);
?>