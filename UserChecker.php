<?php
include_once("CheckCreds.php");

class UserChecker{
	public function __construct($email, $password){
		if(!isset($password) || !isset($email)){
			include_once('logout.php');
		}
		$this->level = CheckCreds::checkEm($email,$password);
		if($this->level==0){
			include_once('logout.php');
		}
	}//construct
}

?>