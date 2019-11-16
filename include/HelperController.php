<?php
session_start();
include 'DB.php';
include 'Constant.php';
include 'SessionHandler.php';

class HelperController extends DB{

	public function checkLoginDetails($email,$password){

		//accessing parent class function by inheritance
		$data=$this->getSingleRow(USER_TABLE," email='".$email."' and password='".md5($password)."'");

		if($data){
			$session=new SessionHandle($data);
			if($session->usertype==1){
				header("Location:teacher_home.php");
			}
			else{
				header("Location:student_home.php");
			}
		}
		else{
			header("Location:index.php?Invalid Login Details");
		}

	}

	//so now login part working using oop concept let's do more optimizie code

	public function checkAuthLogin(){
		if(!SessionHandle::checkLoginExist()){
			header("Location:index.php?error=UnAuthorized Access");
		}
	}

	public function checkIsTeacher(){
		$session=new SessionHandle;
		if($session->usertype==1){
			header("Location:teacher_home.php");
		}
	}

	public function checkIsStudent(){
		$session=new SessionHandle;
		if($session->usertype==2){
			header("Location:student_home.php");
		}
	}

	public function fetchResult(){
		$session=new SessionHandle;
		$data=$this->getSingleRow(RESULTS_TABLE," student_id='".$session->id."'");
		return $data;
	}

	public function fetch_result_data($id){
		$data=$this->getRawQuerydata("select result_data.*,subjects.subject_name from result_data,subjects where subjects.id=result_data.subject_id and result_data.result_id='".$id."'");

		return $data;
	}

	public function fetchStudents(){
		$data=$this->getMultiRow(USER_TABLE," usertype='2'");
		return $data;
	}

}