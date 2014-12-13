<?php
include_once("GetRooms.php");
class RoomClient{
	public function __construct(){
		$this->rooms = GetRooms::allRooms();	
		echo json_encode($this->rooms);				
	}
}
$rc = new RoomClient();
?>