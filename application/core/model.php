<?php

class Model
{

	public function get_all(){
		$result = get_data(false, $this->$bd_name, false, false,false, false, true);
		return $result;
	}

	public static function connect_db(){
	    $mysqli = new mysqli(HOST,USER,PASS,DB);
	    
	    if($mysqli->connect_error)
	        die("An error occurred with the database!".$mysqli->connect_error);
	    $mysqli->set_charset("utf8");
	    
	    return $mysqli;
	}
}
?>