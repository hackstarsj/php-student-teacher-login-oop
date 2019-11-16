<?php
class DB{
	public $con;
	function __construct(){
		$this->con=mysqli_connect("localhost","student_project","student_project","student_project");
	}

	public function getSingleRow($table,$condtion=null){
		$where="";
		if($condtion!=null){
			$where=" where ".$condtion;
		}

		$query=mysqli_query($this->con,"select * from ".$table." ".$where);
		if(mysqli_num_rows($query)>0){
			$data=mysqli_fetch_assoc($query);
			return $data;
		}
		else{
			return false;
		}
	}

	public function getMultiRow($table,$condtion=null){
		$where="";
		$array=array();
		if($condtion!=null){
			$where=" where ".$condtion;
		}

		$query=mysqli_query($this->con,"select * from ".$table." ".$where);
		if(mysqli_num_rows($query)>0){
			while($data=mysqli_fetch_assoc($query)){
				array_push($array,$data);
			}
			return $array;
		}
		else{
			return false;
		}
	}

	public function getRawQuerydata($sql){
		$array=array();

		$query=mysqli_query($this->con,$sql);
		if(mysqli_num_rows($query)>0){
			while($data=mysqli_fetch_assoc($query)){
				array_push($array,$data);
			}
			return $array;
		}
		else{
			return false;
		}
	}
}