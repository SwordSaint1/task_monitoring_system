<?php
include 'login.php';

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$query = "SELECT * FROM user_accounts WHERE username = '$username'";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			foreach($stmt->fetchALL() as $i){
				$role = $i['role'];
				$user_name = $i['username'];
			}
		}else{
			session_unset();
			session_destroy();
			header('location: ../../index.php');
		}
	}else{
		session_unset();
		session_destroy();
		header('location: ../../index.php');
	}
?>