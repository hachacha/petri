<?php
//CheckCreds.php
include_once("UniversalConnect.php");

class CheckCreds{
	#class to be implemented in order to check credentials and see if the user is who they say they is.
	#and if he wasn't then why would they say they is?
	public function __construct($email,$password){
		// $this->db=UniversalConnect::doConnect();
	}
	public function checkEm($email,$password){
		$this->db=UniversalConnect::doConnect();
			$sql = "SELECT user_id, email, level, password = crypt(:pw, password) as log from users where email = :email;";//grab pw to verify and user_id
			try{
				$q=$this->db->prepare($sql);
				$q->execute(array(':email'=>$email,':pw'=>$password));
				$row = $q->fetch();
				if($row['email']==null){
					$this->db=null;//make null to close conn.
					return 0;
				}
				if($row['log']==1){					
					setcookie("user_id", $row['user_id'], time()+3600, "/");//set user id
					$this->db=null;
					return $row['level'];
				}
				else{
					echo "the pw and email address do not match";
					exit();
				}
			}
			catch(PDOException $e) {
	  			echo $e->getMessage();
	  			$this->db=null;
	  			exit();
			}
	}
}

?>