<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj = new Users;

	$idUser = $_SESSION['idUser'];
	$password = sha1($_POST['current_password']);


	$Data = array(
		$idUser,
		$password
	); 

	echo $obj->checkPassword($Data);
 ?>



  	


