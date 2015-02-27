<?php
	//ADDS A BOOK TO THE wishlist
	include '../DBQuery.php';
	session_start();
	$query = "SELECT `wishlist` from `user` WHERE `email` = '".$_SESSION['email']."';";
	$fetch = new DBQuery($query);
	$fetch->execute_query();
	$result1 = $fetch->get_result();
	$row = $result1->fetch_assoc();
	$wishlist = $row['wishlist'];
	if(is_null($wishlist)||$wishlist==''){
		$wishlist=$_POST['newbook'].",";
	}
	else{
		$wishlist.=$_POST['newbook'].",";
	}
	$query = "UPDATE `user` SET `wishlist`= '".$wishlist."' WHERE `email`= '".$_SESSION['email']."';";
	$fetch->set_query($query);
	$fetch->execute_query();	
?>