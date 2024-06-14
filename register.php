<?php
    session_start();
    include 'includes/conn.php';

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);

        $sql = "INSERT INTO voters (voters_id, password, name, email, photo) VALUES ('$voter', '$password', '$name', '$email', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
            echo '<script>alert("Voter successfully registered!");</script>'; // JavaScript alert
            header('location: index.php'); // Redirect to the sign-in page
            exit(); // Stop further execution
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
    }
?>
