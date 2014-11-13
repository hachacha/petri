<?php
include_once("CheckCreds.php");

class UserChecker{
	public function __construct($email, $password){
		if(!isset($password) || !isset($email)){
			include_once('logout.php');
		}
		$this->can_connect = CheckCreds::checkEm($email,$password);
		if($this->can_connect==false){
			include_once('logout.php');
		}
	}
}

$cns = new UserChecker($_COOKIE['email'], $_COOKIE['password']);

?>