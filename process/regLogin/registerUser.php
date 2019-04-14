<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj = new Users();
  	
  	$idUser = "1";
  	$password = sha1($_POST['password']);
	$role = "Admin";
	//$idUser = $_SESSION['idUser'];

	$UserData = array(
			$idUser,
			$_POST['fullname'],
			$_POST['email'],
			$_POST['username'],
			$role,
			$password
				);
	echo $obj-> userRegister($UserData);
 ?>