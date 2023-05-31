<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_account') {
	$username = $_POST['username'];
	$c = 0;

	$query = "SELECT * FROM user_accounts WHERE username LIKE '$username%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$role = $j['role'];
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#edit_account" onclick="get_account_details(&quot;'.$j['id'].'~!~'.$j['username'].'~!~'.$j['password'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['username'].'</td>';
				if($role == 'hr'){
					echo '<td>Human Resources</td>';
				}elseif ($role == 'hd') {
					echo '<td>Head Deparment</td>';
				}elseif ($role == 'tm') {
					echo '<td>Top Management</td>';
				}elseif ($role == 'admin') {
					echo '<td>Admin</td>';
				}else{
					echo '<td>Employee</td>';
				}
				
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center; color:red;" colspan="3">No Result !!!</td>';
		echo '</tr>';
	}
}else if ($method == 'add_account') {
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = "SELECT id FROM user_accounts WHERE username = '$username'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'duplicate';
	}else{
		$stmt = NULL;
		$query = "INSERT INTO user_accounts(`full_name`, `username`, `password`) VALUES ('$fullname','$username','$password')";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
			$stmt = NULL;
		}else{
			echo 'error';
			$stmt = NULL;
		}
	}
}else if ($method == 'update_account') {
	$id = $_POST['id'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = "SELECT id FROM user_accounts WHERE username = '$username' AND full_name = '$fullname' AND password = '$password'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'duplicate';
	}else{
		$stmt = NULL;
		$query = "UPDATE user_accounts SET full_name = '$fullname', username = '$username', password = '$password' WHERE id = '$id'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
			$stmt = NULL;
		}else{
			echo 'error';
			$stmt = NULL;
		}
	}
}else if ($method == 'delete_account') {
	$id = $_POST['id'];

	$query = "DELETE FROM user_accounts WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
		$stmt = NULL;
	}else{
		echo 'error';
		$stmt = NULL;
	}
}
$conn = NULL;
?>