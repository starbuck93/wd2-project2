<?php
	//ADDS A BOOK TO THE CART
	include '../DBQuery.php';
	session_start();
	$query = "SELECT `cart` from `user` WHERE `email` = '".$_SESSION['email']."';";
	$fetch = new DBQuery($query);
	$fetch->execute_query();
	$result1 = $fetch->get_result();
	$row = $result1->fetch_assoc();
	$cart = $row['cart'];
	if(is_null($cart)||$cart==''){
		$cart=$_POST['newbook'].",";
	}
	else{
		$cart.=$_POST['newbook'].",";
	}
	$query = "UPDATE `user` SET `cart`= '".$cart."' WHERE `email`= '".$_SESSION['email']."';";
	$fetch->set_query($query);
	$fetch->execute_query();	
?>