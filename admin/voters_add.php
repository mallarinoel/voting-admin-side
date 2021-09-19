<?php
/** add 

-Create Registration side for voters (ilabas mo yung registration reg.php)
-Alisin yung randomize User ID - palitan ng input type text
-Lagyan voters ID manual
-Lagyan ng Party List
-Lagyan ng Division sa Registration Drop down menu (voters db - ad details sa voters):
			HOPSD
			NURSING DIV
			MEDICAL DIV
			FINANCE DIV.



*/



	include 'includes/session.php';

	if(isset($_POST['add'])){
		$voters_id =$_POST['voters_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$division=$_POST['division'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		/**
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);

		*/
//edit datas here
		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo) VALUES ('$voter', '$password', '$firstname', '$lastname', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>