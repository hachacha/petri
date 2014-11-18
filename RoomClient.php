<?php
include_once("GetRooms.php");
class RoomClient{
	public function __construct(){
		$this->rooms = GetRooms::allRooms();
		// $this->makeHTML($this->rooms);
		// header('Content-Type: application/json');
		echo json_encode($this->rooms);
	}
	public function makeHTML($rooms){
		$roomCount = count($rooms);
		$x=0;
		echo "<br><br><br>";
		while($x<$roomCount){
			echo "<div id='col1'> <a href =room.php?rID=".$rooms[$x]['room_id']."> room# ".$rooms[$x]['room_id'];
			echo ":     ".$rooms[$x]['t1'].",   ".$rooms[$x]['t2'].",   ".$rooms[$x]['t3']."</a></div>";	
			$x++;
		}
	}
}
$rc = new RoomClient();
?>