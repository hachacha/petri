<?php
include_once("UniversalConnect.php");
class LoginClient{
	public function __construct(){
		$this->tableMaster="users";
		$this->db=UniversalConnect::doConnect();
		if(!isset($_POST['email'])){
			echo "fucking die you idiot, you forgot the usr";
			exit();
		}
		elseif(!isset($_POST['pw'])){
			echo "fucking die you idiot, you forgot the pw";
			exit();
		}
		else{//finally
			$sql = "SELECT user_id, email, password = crypt(:pw, password) as log from users where email = :email;";//grab pw to verify and user_id
			try{
				$q=$this->db->prepare($sql);
				$q->execute(array(':email'=>$_POST['email'],':pw'=>$_POST['pw']));
				$row = $q->fetch();
				if($row['email']===null){
					echo "no such email!";
					exit();
				}
				if($row['log']===true){
					setcookie("email", $email, time()+3600, "/"); 
					setcookie("password", $password, time()+3600, "/"); 
					setcookie("user_id", $row['user_id'], time()+3600, "/");//set user id
					echo "1";
					exit();
				}
				else{
					echo "you entered in an incorrect pw for that email address";
					exit();
				}
			}
			catch(PDOException $e) {
	  			echo $e->getMessage();
	  			exit();
			}
			$this->db=null;//make null to close conn.
		}//else 
	}//construct function
}//loginproxy class
$worker=new LoginClient();
?>