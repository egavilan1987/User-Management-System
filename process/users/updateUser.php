<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new Users;

	$idUser = "1";

	$userData=array(
			$_POST['idUser'],
			$idUser,
			$_POST['fullname'],
			$_POST['email'],
			$_POST['username'],
			$_POST['role']
				);  
	echo $obj->updateUser($userData);
	
 ?>