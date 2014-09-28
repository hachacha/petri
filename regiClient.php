<?php
include_once("UniversalConnect.php");
class RegiClient{
	public function __construct(){
		$this->tableMaster="users";
		$this->db=UniversalConnect::doConnect();
		if(!isset($_POST['email'])){
			printf("fucking die you idiot, you forgot the usr");
			exit();
		}
		elseif(!isset($_POST['pw'])){
			printf("fucking die you idiot, you forgot the pw");
			exit();
		}
		else{//finally
			$ins_sql = "INSERT INTO users (email, password, datetime) VALUES (:email, crypt(:pw,gen_salt('md5')) ,CURRENT_TIMESTAMP) RETURNING user_id;";//insert
			try{
				$q=$this->db->prepare($ins_sql);
				$q->execute(array(':email'=>$_POST['email'],':pw'=>$_POST['pw']));
				$row = $q->fetch();
				setcookie("user_id", $row['user_id'], time()+3600, "/"); //set cookie right in here to the user id from returning insert
				header("Location: profile.php");
			}
			catch(PDOException $e) {
	  			echo $e->getMessage();
	  			exit();
			}
			$this->db=null;//make null to close conn.
		}//else 
	}//construct function
}//loginproxy class
$worker=new RegiClient();
?>