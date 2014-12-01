<?php
include_once("UniversalConnect.php");

class AllPosts{
	public function __construct($user_id,$room_id){
			$this->user_id = $user_id;
			$this->room_id = $room_id;
			
		}
	public function allOfThePosts(){
		$this->db=UniversalConnect::doConnect();
		$sql = "SELECT tp.content as tpc, fp.content as fpc, 
					ip.content as ipc, ip.filename as ipf, ip.thumb_filename as ipthumb, 
					ip.nsfw as iNSFW, sp.content as spc,lp.content as lpc, 
					p.post_id, p.reply, p.room_id, p.datetime, p.tag 
				FROM posts p 
					LEFT OUTER JOIN text_post tp ON (tp.text_post_id=p.post_id) 
					LEFT OUTER JOIN image_post ip ON (ip.image_post_id=p.post_id) 
					LEFT OUTER JOIN link_post lp ON (lp.link_post_id=p.post_id) 
					LEFT OUTER JOIN share_post sp ON (sp.share_post_id=p.post_id) 
					LEFT OUTER JOIN file_post fp ON(fp.file_post_id=p.post_id) 
				WHERE p.room_id = :room_id ORDER BY p.datetime DESC;";
		try{
			$q=$this->db->prepare($sql);
			$q->execute(array(':room_id'=>$this->room_id));
			$row = $q->fetchAll();
			}
		catch(PDOException $e) {
  			echo $e->getMessage();
  			$this->db=null;
  			exit();
		}
	}
}

$worker = new AllPosts($user_id,$room_id);
$worker->allOfThePosts();

?>