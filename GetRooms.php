<?php
include_once("UniversalConnect.php");

class GetRooms{
	public function allRooms(){
		$this->db = UniversalConnect::doConnect();
		$rl_query = "SELECT room_id, t1,t2,t3 from rooms order by room_id asc;";
		try {
			$q=$this->db->prepare($rl_query);
			$q->execute();
			$row = $q->fetchAll(PDO::FETCH_ASSOC);
			$this->db = null;
		}
		catch (Exception $e) {
			echo $e->getMessage();
			$this->db=null;
			exit();
		}
		return $row;
	}
	public function recentActivity(){
		$this->db = UniversalConnect::doConnect();
		$rl_query = "SELECT distinct room_id from (select room_id, datetime from posts where datetime > now()::timestamp - interval '4 days' ) as doc order by room_id asc;";
		try{
			$q=$this->db->prepare($rl_query);
			$q->execute();
			$row = $q->fetchAll(PDO::FETCH_ASSOC);
			$this->db = null;
			return $row;
		}
		catch (Exception $e) {
			echo $e->getMessage();
			$this->db=null;
			exit();
		}
	}
}

?>