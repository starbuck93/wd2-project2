<?php
	session_start();
	require_once('DBQuery.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$role = $_POST['role'];
	$query = "SELECT * FROM user WHERE `email`= '".$email."' AND `password`= '".$password."';";
	$valid = new DBQuery($query);
	$valid->execute_query();
	$result = $valid->get_result();
	$num_results = $result->num_rows;
	$valid->close();
	//EMAIL AND PASSWORD VALIDATION
	if($num_results != 1){
		$_SESSION['invalid'] = 'Incorrect e-mail or password';
		//?
		//header("Location: index.php");
	}
	else{
		//USERNAME AND PASSWORD CONFIRMED
		$row = $result->fetch_assoc();
		$_SESSION['email']=$row['email'];
		echo "SUCCESS!!";
		//header("Location: main.php");
			
	}
?>