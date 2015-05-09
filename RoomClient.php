<?php
include_once("GetRooms.php");
class RoomClient{
	public function __construct(){
		$this->rooms = GetRooms::allRooms();
	}
	public function userDefRooms($params){
		if(!isset($params)){
			return "you have no params";
		}
		else{
			$this->rooms = GetRooms::userRooms($params);
		}
	}
}
?>