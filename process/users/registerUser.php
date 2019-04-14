<?php

session_start(); 
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";
  
	$obj = new Users();
  	
  	$password = sha1($_POST['password']);
	$idUser = $_SESSION['idUser'];

	$UserData = array(
			$idUser,
			$_POST['fullname'],
			$_POST['email'],
			$_POST['username'],
			$_POST['role'],
			$password
				);
	echo $obj-> userRegister($UserData);
 ?>

