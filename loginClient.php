<?php
include_once("CheckCreds.php");
class LoginClient{
	public function __construct(){
		if(!isset($_POST['email'])){
			echo "fucking die you idiot, you forgot the usr";
			exit();
		}
		elseif(!isset($_POST['password'])){
			echo "fucking die you idiot, you forgot the pw";
			exit();
		}
		else{
			$can_connect = CheckCreds::checkEm($_POST['email'],$_POST['password']);
				if($can_connect > 0){
					setcookie("email", $_POST['email'], time()+3600, "/"); 
					setcookie("password", $_POST['password'], time()+3600, "/"); 
					echo "1";
				}
				else{
					echo "you entered in an incorrect pw for that email address";
					exit();
				}
		}//else 
	}//construct function
}//loginproxy class
$worker=new LoginClient();
?>