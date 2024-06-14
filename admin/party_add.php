<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        extract($_POST);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

        $sql = "INSERT INTO parties (partyId, partyName, dateCreated, description2, photo) VALUES (NULL, '$partyname', CURRENT_TIMESTAMP(), '$desc', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'party added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: parties.php');
?>