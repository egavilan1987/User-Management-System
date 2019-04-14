<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new Users();
	$password = sha1($_POST['password']);

	$loginData=array(
		$_POST['username'],
		$password
	);

	
	//print_r($loginData);
	echo $obj->loginUser($loginData);
	//echo "1";
 ?>
