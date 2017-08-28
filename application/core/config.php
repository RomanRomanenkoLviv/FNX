<?php
/*
Глобальные конфигурации
*/

session_start();
// error_reporting(E_ALL); //0, E_ALL
date_default_timezone_set("Europe/Kiev");

// define("PATH", 'http://'.$_SERVER['SERVER_NAME'].'/');
define("PATH", 'http://localhost:8888/');

//exit
if(isset($_GET["do"]) && $_GET["do"] == "logout"){
	setcookie ("can_see", "", time() - 3600);
	setcookie ("auth_code", "", time() - 3600);
	$_SESSION['message'] = "Session ended!";
    header("Location: ".PATH);
    exit();
}
	
//Databases
define("HOST", "localhost");
define("USER", "root");
define("PASS", "root");
define("DB", "fnx");
?>