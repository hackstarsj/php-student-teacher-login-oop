<?php
include 'include/HelperController.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){

	//mysqli real escape prevent from sql injection which filter the user input
	$helper=new HelperController;
	$helper->checkLoginDetails($_REQUEST['email'],$_REQUEST['password']);
}
else{
	header("Location:index.php?error=Please Enter Email and Password");
}