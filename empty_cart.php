<?php
  session_start();
	//MAKE SURE THERE ARE NO DUPLICATE EMAILS
	require_once("DBQuery.php");
	$name = $_SESSION['name'];
	$query = "UPDATE `user` SET `cart`= NULL WHERE `name`=\"$name\"";
	$register = new DBQuery($query);
	$register->execute_query();
	header("Location: cart.php");
?>
