<?php
class SessionHandle{
	public $id;
	public $name;
	public $usertype;
	public $email;

	function __construct($data=null){
		if($data!=null){
			$_SESSION['user_data']=$data;
		}

		$this->id=$_SESSION['user_data']['id'];
		$this->name=$_SESSION['user_data']['name'];		
		$this->usertype=$_SESSION['user_data']['usertype'];
		$this->email=$_SESSION['user_data']['email'];		
	}

	public static function checkLoginExist(){
		if(isset($_SESSION['user_data'])){
			return true;
		}
		else{
			return false;
		}
	}
}