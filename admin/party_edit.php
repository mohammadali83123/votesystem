<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$partyname = $_POST['partyname'];
		$description = $_POST['description'];

		$sql = "UPDATE parties SET description2 = '$description', partyName = '$partyname' WHERE partyId = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Party updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: parties.php');

?>