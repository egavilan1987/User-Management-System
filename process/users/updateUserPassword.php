<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new Users;

	$idUser = $_SESSION['idUser'];
	$password = sha1($_POST['password']);

	$userData = array(
			$_POST['idUser'],
			$idUser,
			$password
				);  
	echo $obj->updateUserPassword($userData);
 ?>



  	


